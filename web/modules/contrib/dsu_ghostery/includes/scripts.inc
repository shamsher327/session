<?php

/**
 * @file
 * Module file for DSU Security module.
 */

/**
 * JS snippets.
 *
 * @return array
 *   return array.
 */
function dsu_ghostery_snippets() {
  $snippets = [
    'script' => _set_scripts_variable(),
  ];
  \Drupal::moduleHandler()->alter('dsu_ghostery_snippets', $snippets);
  return $snippets;
}

/**
 * Create snippet in require format.
 *
 * @return string
 *   return string.
 */
function _set_scripts_variable() {
  $config = \Drupal::config('dsu_ghostery.settings');
  $priorConsentAction = $config->get('priorConsentAction');

  $priorConsentActionCheck = '';
  $blockedTrackerUrlsString = $config->get('blocked_tracker_urls');

  $addGhosteryScriptLines = "";
  if (!empty($blockedTrackerUrlsString)) {
    $blockedTrackerUrls = preg_split("/\r\n|\n|\r/", $blockedTrackerUrlsString);
    foreach ($blockedTrackerUrls as $value) {
      $addGhosteryScriptLines .= "ghosteryAddScript('" . $value . "');";
    }
  }
  if (!empty($priorConsentAction)) {
    foreach ($priorConsentAction as $value) {
      if ($value != '0') {
        $priorConsentActionCheck .= $value;
      }
    }
  }

  $ghosteryScript = <<<EOS
if(__ncp_ghostery!=null&&typeof(__ncp_ghostery)!='undefined')
{
(function(id,cid,cb){
  var d=document,s=d.createElement('script'),ts=d.getElementsByTagName('script')[0];
  s.type='text/javascript';s.async=true;
  s.setAttribute('data-ev-noticeid',id);
  s.setAttribute('data-ev-coid',cid);
  s.setAttribute('data-ev-consent-callback',cb);
  s.setAttribute('data-ev-consent-type','$priorConsentActionCheck');
  s.src='//c.betrad.com/pub/gdprnotice.js';
  ts.parentNode.insertBefore(s,ts);

  if(d.getElementById('_bapw-link')){
      var ev=d.createElement('script'),st=d.getElementsByTagName('script')[0];
      ev.type='text/javascript';
      ev.async=true;ev.setAttribute('data-ev-tag-pid',id);
      ev.setAttribute('data-ev-tag-ocid',cid);
      ev.src='//c.betrad.com/pub/tag.js';
      st.parentNode.insertBefore(ev,st);}
})

(__ncp_ghostery.nid,__ncp_ghostery.cid,'g_consentGiven');

function gtm(w,d,s,l,i){w[l]=w[l]||[];w[l].push({
  'gtm.start':new Date().getTime(),event:'gtm.js'
});

var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;
f.parentNode.insertBefore(j,f);
};

function ghosteryAddScript(u,cb){
 
  var d=document,sn='script',f=d.getElementsByTagName(sn)[0]||d.head,s=d.createElement(sn);
  s.async=true;s.src=u;
  console.log(u);
  if(cb){s.onload=function(){cb();
  }}f.parentNode.insertBefore(s,f);}
  
  function g_consentGiven(){
  if(__ncp_gtm!=null&&typeof(__ncp_gtm)!='undefined'){
      gtm(window,document,'script','dataLayer',__ncp_gtm.id);
  }

  
  }
}
  $addGhosteryScriptLines



EOS;

  $ghosteryScript = <<<EOS

<!-- Ghostery Script -->
$ghosteryScript
<!-- End Ghostery Script -->
EOS;

  return $ghosteryScript;
}
