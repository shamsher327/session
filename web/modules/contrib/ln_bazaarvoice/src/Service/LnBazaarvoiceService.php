<?php

namespace Drupal\ln_bazaarvoice\Service;

use Drupal;
use Drupal\Core\Database\Driver\mysql\Connection;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Language\LanguageManagerInterface;

/**
 * Class LnBazaarvoiceService.
 *
 * @package Drupal\ln_bazaarvoice\Service
 */
class LnBazaarvoiceService implements LnBazaarvoiceServiceInterface {

  /**
   * Configuration state Drupal Site.
   *
   * @var object
   */

  protected $config;

  /**
   * Configuration state Drupal Site.
   *
   * @var object
   */

  protected $database;

  /**
   * Configuration state Drupal Site.
   *
   * @var object
   */

  protected $langaugeManager;

  /**
   * LnBazaarvoiceService constructor.
   *
   * @param object $config
   *   Config object.
   * @param \Drupal\Core\Database\Driver\mysql\Connection $database
   *   Database object.
   * @param \Drupal\Core\Language\LanguageManagerInterface $languageManager
   *   LanguageManager object.
   */
  public function __construct($config, Connection $database, LanguageManagerInterface $languageManager) {
    $this->config = $config->get('ln_bazaarvoice.settings');
    $this->languageConfig = $config->get('ln_bazaarvoice.locales');
    $this->database = $database;
    $this->languageManager = $languageManager;
  }

  /**
   * Get local entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   Entity object.
   *
   * @return bool|mixed|string|string[]|null
   *   return mixed.
   */
  public function getEntityLocale(EntityInterface $entity) {
    $langcode = method_exists($entity, 'language') ? $entity->language()
      ->getId() : $this->langaugeManager->getCurrentLanguage()->getId();

    return $this->getBazaarvoiceLocaleCode($langcode);
  }

  /**
   * Get bazaarvoice local code.
   *
   * @param string $langcode
   *   Language code.
   *
   * @return bool|mixed|string|string[]|null
   *   return mixed.
   */
  public function getBazaarvoiceLocaleCode($langcode) {
    $locale_code = $langcode;
    // Do some basic transformation.
    $locale_code = preg_replace('/[^a-zA-Z]+/', '_', trim($locale_code));

    if (!$this->isValidLocaleCode($locale_code)) {
      if ($code = $this->getLocaleCode($locale_code)) {
        $locale_code = $code;
      }
      else {
        $locale_code = $this->findDefaultLocale($locale_code);
      }
    }

    return $locale_code;
  }

  /**
   * Check valid local code.
   *
   * @param string $locale_code
   *   Local language code.
   *
   * @return false|int
   *   return false.
   */
  public function isValidLocaleCode($locale_code) {
    return preg_match('/[a-z]{2}_[A-Z]{2}/', $locale_code);
  }

  /**
   * Get local code.
   *
   * @param string $langcode
   *   Language code string.
   *
   * @return bool
   *   return boolen
   */
  private function getLocaleCode($langcode) {
    $locale_code = FALSE;
    if ($locale_codes = $this->getLocaleCodes()) {
      if (isset($locale_codes[$langcode])) {
        $locale_code = $locale_codes[$langcode];
      }
    }

    return $locale_code;
  }

  /**
   * Get local codes.
   *
   * @return mixed
   *   return mixed.
   */
  public function getLocaleCodes() {
    $result = $this->languageConfig->get('map');

    return $result;
  }

  /**
   * Find default local code.
   *
   * @param string $locale
   *   Local code string.
   *
   * @return bool|mixed
   *   return mixed.
   */
  private function findDefaultLocale($locale) {
    $locale_codes = $this->defaultLocaleCodes();

    return isset($locale_codes[$locale]) ? $locale_codes[$locale] : FALSE;
  }

  /**
   * Set language custom code.
   *
   * @return array
   *   return array.
   */
  private function defaultLocaleCodes() {
    return [
      'af'    => 'af_NA',
      'ak'    => 'ak_GH',
      'sq'    => 'sq_AL',
      'am'    => 'am_ET',
      'ar'    => 'ar_DZ',
      'hy'    => 'hy_AM',
      'as'    => 'as_IN',
      'az'    => 'az_AZ',
      'eu'    => 'eu_ES',
      'be'    => 'be_BY',
      'bn'    => 'bn_BD',
      'bs'    => 'bs_BA',
      'br'    => 'br_FR',
      'bg'    => 'bg_BG',
      'my'    => 'my_MM',
      'ca'    => 'ca_AD',
      'zh'    => 'zh_CN',
      'kw'    => 'kw_GB',
      'hr'    => 'hr_HR',
      'cs'    => 'cs_CZ',
      'da'    => 'da_DK',
      'nl'    => 'nl_NL',
      'dz'    => 'dz_BT',
      'en'    => 'en_US',
      'eo'    => 'eo_EO',
      'et'    => 'et_EE',
      'ee'    => 'ee_GH',
      'fo'    => 'fo_FO',
      'fi'    => 'fi_FI',
      'fr'    => 'fr_FR',
      'ff'    => 'ff_CM',
      'gl'    => 'gl_ES',
      'lg'    => 'lg_UG',
      'ka'    => 'ka_GE',
      'de'    => 'de_DE',
      'el'    => 'el_GR',
      'gu'    => 'gu_IN',
      'ha'    => 'ha_GH',
      'he'    => 'he_IL',
      'hi'    => 'hi_IN',
      'hu'    => 'hu_HU',
      'is'    => 'is_IS',
      'ig'    => 'ig_NG',
      'id'    => 'id_ID',
      'ga'    => 'ga_IE',
      'it'    => 'it_IT',
      'ja'    => 'ja_JP',
      'kl'    => 'kl_GL',
      'kn'    => 'kn_IN',
      'ks'    => 'ks_IN',
      'kk'    => 'kk_KZ',
      'km'    => 'km_KH',
      'ki'    => 'ki_KE',
      'rw'    => 'rw_RW',
      'ko'    => 'ko_KR',
      'ky'    => 'ky_KG',
      'lo'    => 'lo_LA',
      'lv'    => 'lv_LV',
      'ln'    => 'ln_AO',
      'lt'    => 'lt_LT',
      'lu'    => 'lu_CD',
      'lb'    => 'lb_LU',
      'mk'    => 'mk_MK',
      'mg'    => 'mg_MG',
      'ms'    => 'ms_BN',
      'ml'    => 'my_IN',
      'mt'    => 'mt_MT',
      'gv'    => 'gv_IM',
      'mr'    => 'mr_IN',
      'mn'    => 'mn_MN',
      'ne'    => 'ne_IN',
      'nd'    => 'nd_ZW',
      'se'    => 'se_SE',
      'no'    => 'no_NO',
      'nb'    => 'nb_NO',
      'nn'    => 'nn_NO',
      'or'    => 'or_IN',
      'om'    => 'om_ET',
      'os'    => 'os_GE',
      'ps'    => 'ps_AF',
      'fa'    => 'fa_AF',
      'pl'    => 'pl_PL',
      'pt'    => 'pt_PT',
      'pa'    => 'pa_PK',
      'qu'    => 'qa_BO',
      'ro'    => 'ro_RO',
      'rm'    => 'rm_CH',
      'rn'    => 'rn_BI',
      'ru'    => 'ru_RU',
      'sg'    => 'sg_CF',
      'gd'    => 'gd_GB',
      'sr'    => 'sr_RS',
      'sh'    => 'sh_BA',
      'sn'    => 'sn_ZW',
      'ii'    => 'ii_CN',
      'si'    => 'si_LK',
      'sk'    => 'sk_SK',
      'sl'    => 'sl_SI',
      'so'    => 'so_SO',
      'es'    => 'es_ES',
      'sw'    => 'sw_KE',
      'sv'    => 'sw_SE',
      'tl'    => 'tl_PH',
      'ta'    => 'ta_IN',
      'te'    => 'te_IN',
      'th'    => 'th_TH',
      'bo'    => 'bo_CN',
      'ti'    => 'ti_ER',
      'to'    => 'to_TO',
      'tr'    => 'tr_TR',
      'uk'    => 'uk_UA',
      'ur'    => 'ur_IN',
      'ug'    => 'ug_CN',
      'uz'    => 'uz_UZ',
      'vi'    => 'vi_VN',
      'cy'    => 'cy_GB',
      'fy'    => 'fy_NL',
      'yi'    => 'yi_YI',
      'yo'    => 'yo_BJ',
      'zu'    => 'zu_ZA',
      'en_gb' => 'en_GB',
      'en_us' => 'en_US',
    ];
  }

  /**
   * Set language local code.
   *
   * @param string $langcode
   *   Language code.
   * @param string $locale_code
   *   Language local code.
   */
  public function setLocaleCode($langcode, $locale_code) {
    $this->setLocaleCodes($locale_code);
  }

  /**
   * Set language local coded.
   *
   * @param string $locales
   *   Language local code.
   */
  public function setLocaleCodes($locales) {
    // @todo: dependency injection.
    Drupal::configFactory()
      ->getEditable('ln_bazaarvoice.locales')
      ->set('map', $locales)
      ->save();
  }

  /**
   * Buiud JS path dynamically.
   *
   * @param string $locale_code
   *   Language local code.
   *
   * @return string
   *   return string
   */
  public function buildHostedJsPath($locale_code = NULL) {
    $mode = '';
    if ($this->config->get('mode') == 'stg') {
      $mode = 'bvstaging/';
    }

    $client_name = $this->config->get('hosted.client_name');
    $site_id = $this->config->get('hosted.site_id');

    if (!$locale_code || !$this->isValidLocaleCode($locale_code)) {
      $language = Drupal::languageManager()->getCurrentLanguage()->getId();
      $locale_code = Drupal::service('ln_bazaarvoice')
        ->getBazaarvoiceLocaleCode($language);
    }

    $js_path = '//display.ugc.bazaarvoice.com/' . $mode . 'static/' . $client_name . '/' . $site_id . '/' . $locale_code . '/bvapi.js';

    return $js_path;
  }

  /**
   * Build host JS path.
   *
   * @param string $locale_code
   *   Local code string.
   *
   * @return string
   *   return string.
   */
  public function buildHostedBazaarvoiceJsPath($locale_code = NULL) {
    $mode = '';
    if ($this->config->get('mode') == 'stg') {
      $mode = 'staging/';
    }
    elseif ($this->config->get('mode') == 'prod') {
      $mode = 'production/';
    }

    $client_name = $this->config->get('hosted.client_name');
    $site_id = $this->config->get('hosted.site_id');

    if (!$locale_code || !$this->isValidLocaleCode($locale_code)) {
      $language = Drupal::languageManager()->getCurrentLanguage()->getId();
      $locale_code = Drupal::service('ln_bazaarvoice')
        ->getBazaarvoiceLocaleCode($language);
    }

    $js_path = 'https://apps.bazaarvoice.com/deployments/' . $client_name . '/' . $site_id . '/' . $mode . $locale_code . '/bv.js';

    return $js_path;
  }

  /**
   * Get bazaarvoice language code.
   *
   * @return string
   *   return string.
   */
  public function getBazaarvoiceLangCode() {
    return Drupal::languageManager()->getCurrentLanguage()->getId();
  }

  /**
   * Get configuration values od ln_bazaarvoice.
   *
   * @return mixed
   *   Config objects.
   */
  public function getConfig() {
    return $this->config;
  }

}
