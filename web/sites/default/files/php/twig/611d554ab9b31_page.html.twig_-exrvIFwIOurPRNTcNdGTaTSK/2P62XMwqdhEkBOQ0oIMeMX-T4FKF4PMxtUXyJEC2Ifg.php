<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/indegenetheme/templates/layout/page.html.twig */
class __TwigTemplate_e1fec772185014cd3b423447007ad5aa7e3e538da7502b67e02a93c2f6816cd8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 60];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "

";
        // line 47
        echo "<div class=\"page\">
   <div class=\"nd-region\">
      <div class=\"container-fluid\">
         <div id=\"Content-Bottom-Full-Width\" class=\"row\">
            <div id=\"top\" class=\"col-md-12\">
               <div class=\"region region-top\">
                  <div id=\"block-block-68\" class=\"block block-block\">
                     <div class=\"block-content clearfix\">
                        <!-- Navigation panel -->
                        <nav class=\"main-nav white js-stick\" style=\"\">
                           <div class=\"full-wrapper relative clearfix\">
                                <!-- Logo ( * your text or image into link tag *) -->
                                <div class=\"nav-logo-wrap local-scroll\">
                                    ";
        // line 60
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "logo_region", [])), "html", null, true);
        echo "
                                </div>
                                <div class=\"mobile-nav\" style=\"height: 75px; line-height: 75px; width: 75px;\">
                                    <i class=\"fa fa-bars\"></i>
                                </div>
                                <!-- Main Menu -->
                                <div class=\"inner-nav desktop-nav\">
                                    ";
        // line 67
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "navigation", [])), "html", null, true);
        echo "
                                </div>
                                <!-- End Main Menu -->
                           </div>
                        </nav>
                     </div>
                  </div>
                  <!-- /.block -->
                  <div id=\"block-block-95\" class=\"block block-block\">
                     <div class=\"block-content clearfix\">
                        <style>
                           .node-type-events .border-box-2 {
                           min-height: 200px;
                           }
                           .node-type-events .team-grid .views-field-field-picture-1 {
                           width: 90%;
                           margin-bottom: 0;
                           }
                           .node-type-events .team-grid .views-field-field-picture {
                           width: 100%;
                           margin: 20px 0;
                           }
                           .node-type-events .team-grid .views-field-field-picture .team_name {
                           font-size: 17px;
                           color: #333;
                           font-weight: 600;
                           line-height: normal;
                           }
                        </style>
                     </div>
                  </div>
                  <!-- /.block -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class=\"nd-region\">
      <div class=\"container-fluid\">
         <div id=\"Content-Bottom-Full-Width\" class=\"row\">
            <div id=\"content\" class=\"col-md-12\">
               <div class=\"container\">
                  <div class=\"row\">
                     <div class=\"col-md-8 col-md-offset-2\"></div>
                  </div>
               </div>
               <div class=\"region region-content\">
                  <div id=\"block-system-main\" class=\"block block-system\">
                     <div class=\"block-content clearfix\">
                        <div id=\"node-269\" class=\"node node-landing-pages clearfix\">
                           <div class=\"content\">
                              <div class=\"field field-name-body field-type-text-with-summary field-label-hidden\">

                                 <section class=\"bg-gray-lighter page-section bg-scroll home-slider page-\" style=\"background-color: #0a4ca4; height: auto; padding-top: 0px; padding-bottom: 0px;\">
                                    <div class=\"row\">

                                       <div class=\"col-md-5 slider_leftsection\">
                                          <h2 class=\"align-left font-alt white hs-line-14 mb-30 fw-800 blue desktop-only\" style=\"margin-top: 0px;\">";
        // line 124
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_title"] ?? null)), "html", null, true);
        echo "</h2>
                                          <p></p>
                                       </div>
                                       <div class=\"col-sm-7 desktop-only home-image\">
                                            ";
        // line 128
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "page_slider", [])), "html", null, true);
        echo "
                                          ";
        // line 132
        echo "                                       </div>
                                    </div>
                                 </section>
                                 <div class=\"container mt-100 mob-mt-20\">
                                    <section class=\"page-section bg-scroll pl-50 pr-50 mob-p-20\" style=\"background-color: #f9f9f9;\">
                                       <div class=\"row icons_container\">
                                          <div class=\"col-md-6\">
                                             <span class=\"image-align text-align-left\" align=\"left\"><img style=\"\" src=\"web/sites/default/files/Purpose%40svg.svg\" alt=\"\" title=\"\" /></span>
                                             <h3 class=\"align-left font-alt black\" style=\"margin-top: 10px; margin-bottom: 10px;\">Our Purpose</h3>
                                             <p>To enable healthcare organizations be future ready</p>
                                          </div>
                                          <div class=\"col-md-6\">
                                             <span class=\"image-align text-align-left\" align=\"left\"><img style=\"\" src=\"web/sites/default/files/Vision%40svg.svg\" alt=\"\" title=\"\" /></span>
                                             <h3 class=\"align-left font-alt black\" style=\"margin-top: 10px; margin-bottom: 10px;\">Vision</h3>
                                             <p>To be the trusted partner to healthcare organizations for improved health outcomes</p>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                                 <div class=\"fadeInUp container wow mt-100 mb-100 aboutus_div\" id=\"aboutus_div\">
                                 ";
        // line 152
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
                                    ";
        // line 212
        echo "                                 </div>
                                 <section class=\"page-section bg-scroll pi-text-center\" style=\"background-color: #0a4ca4; text-align: center;\">
                                    <div class=\"container\">
                                       <div class=\"row counter-section\">
                                          <div class=\"col-sm-4 col-md-4\">
                                             <div>
                                                <div class=\"count-number\">4,500</div>
                                                <div class=\"count-descr font-alt\">
                                                   <span class=\"count-title\">Passionate Indegeons</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class=\"col-sm-4 col-md-4\">
                                             <div class=\"dollar\">
                                                <div class=\"count-number\">2,000,000</div>
                                                <div class=\"count-descr font-alt\">
                                                   <span class=\"count-title\">Revenue under management</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class=\"col-sm-4 col-md-4\">
                                             <div>
                                                <div class=\"count-number\">1,750,000</div>
                                                <div class=\"count-descr font-alt\">
                                                   <span class=\"count-title\">Medical and commercial assets created</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </section>
                                 <section class=\"page-section bg-scroll leadership_featured_3 mt-100 text-black\" style=\"background-color: #ffffff; padding-top: 0px; padding-bottom: 0px;\">
                                    <div class=\"fadeInUp container wow\">
                                       <div class=\"leadership_div\">
                                          <div class=\"view view-custom-leadership-team view-id-custom_leadership_team view-display-id-block_6 leadership-featured view-dom-id-7179f8ed69d69a199f39395117af540e\">
                                             <div class=\"clearfix\"></div>
                                             <div class=\"view-content\">
                                                <div class=\"views-row views-row-1 views-row-odd views-row-first views-row-last\">
                                                   <div class=\"views-field views-field-field-picture-1\">
                                                      <div class=\"field-content\"><img src=\"web/sites/default/files/manish-gupta_0.jpg\" width=\"800\" height=\"800\" alt=\"Manish Gupta\" title=\"Manish Gupta\" /></div>
                                                   </div>
                                                   <div class=\"views-field views-field-field-home-tile-text\">
                                                      <div class=\"field-content\">
                                                         <div class=\"team_name\">Manish Gupta</div>
                                                         <div class=\"team_role\">Cofounder and CEO</div>
                                                         <div class=\"team_text\">
                                                            <p>“From our founding days, we focused on building an organization dedicated to healthcare and one that modernizes its operating practices.”</p>
                                                         </div>
                                                         <a class=\"btn btn-mod btn-medium btn-round\" href=\"about-us/leadership.html\">Leadership</a>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </section>
                                 <section class=\"page-section bg-scroll leadership_featured_3 mt-100 text-black\" style=\"background-color: #ffffff; padding-top: 0px; padding-bottom: 0px;\">
                                    <div class=\"fadeInUp container wow\">
                                       <h3 class=\"align-center font-alt black\" style=\"margin-top: 0px; margin-bottom: 30px;\">News and Events</h3>
                                       <div>
                                          <div class=\"view view-custom-resources-grid view-id-custom_resources_grid view-display-id-attachment_2 grid-view view-dom-id-6e016a5f27ab343cb29765efa9a494c9\">
                                             <div class=\"clearfix\"></div>
                                             <div class=\"view-content\">
                                                <div id=\"views-bootstrap-grid-1\" class=\"views-bootstrap-grid-plugin-style\">
                                                   <div class=\"row\">
                                                      <div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\">
                                                         <div class=\"views-field views-field-nothing\"><span class=\"field-content\"></span></div>
                                                         <div class=\"views-field views-field-field-document-link\">
                                                            <div class=\"field-content\">
                                                               <div class=\"image\">
                                                                  <a href=\"insights/news/carlyle-and-brighton-park-agree-invest-us-200-million-indegene.html\">
                                                                  <img
                                                                     src=\"web/sites/default/files/styles/portfolio_653x368/public/brighton-and-carlye7378.jpg?itok=Q0xqAplq\"
                                                                     width=\"653\"
                                                                     height=\"368\"
                                                                     alt=\"Carlyle and Brighton Park agree to invest US \$200 million in Indegene\"
                                                                     title=\"Carlyle and Brighton Park agree to invest US \$200 million in Indegene\"
                                                                     />
                                                                  </a>
                                                               </div>
                                                               <br />
                                                               <div class=\"detail\">
                                                                  <span class=\"news-meta blue-meta\"><span class=\"date-display-single\">Feb 2021</span></span> •
                                                                  <span class=\"news-meta blue-meta\"><a href=\"insights/news.html\">news</a></span><br />
                                                                  <h3 class=\"font-alt black fw-700 mt-10 mb-20\">
                                                                     <a href=\"insights/news/carlyle-and-brighton-park-agree-invest-us-200-million-indegene.html\">
                                                                     Carlyle and Brighton Park agree to invest US \$200 million in Indegene
                                                                     </a>
                                                                  </h3>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\">
                                                         <div class=\"views-field views-field-nothing\"><span class=\"field-content\"></span></div>
                                                         <div class=\"views-field views-field-field-document-link\">
                                                            <div class=\"field-content\">
                                                               <div class=\"image\">
                                                                  <a target=\"new\" href=\"https://indegenerep.s3.ap-south-1.amazonaws.com/the-healthcare-customer-experience-playbook.pdf\">
                                                                  <img
                                                                     src=\"web/sites/default/files/styles/portfolio_653x368/public/15_CX-playbook8939.jpg?itok=pcFwVJTK\"
                                                                     width=\"653\"
                                                                     height=\"368\"
                                                                     alt=\"The Healthcare Customer Experience Playbook\"
                                                                     title=\"The Healthcare Customer Experience Playbook\"
                                                                     />
                                                                  </a>
                                                               </div>
                                                               <br />
                                                               <div class=\"detail\">
                                                                  <span class=\"article-meta blue-meta\"><span class=\"date-display-single\">Feb 2021</span></span> •
                                                                  <span class=\"article-meta blue-meta\"><a href=\"insights/article.html\">article</a></span><br />
                                                                  <h3 class=\"font-alt black fw-700 mt-10 mb-20\">
                                                                     <a target=\"new\" href=\"https://indegenerep.s3.ap-south-1.amazonaws.com/the-healthcare-customer-experience-playbook.pdf\">
                                                                     The Healthcare Customer Experience Playbook
                                                                     </a>
                                                                  </h3>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\">
                                                         <div class=\"views-field views-field-nothing\"><span class=\"field-content\"></span></div>
                                                         <div class=\"views-field views-field-field-document-link\">
                                                            <div class=\"field-content\">
                                                               <div class=\"image\">
                                                                  <a href=\"insights/video/indegene-digital-summit-2020-highlights.html\">
                                                                  <img
                                                                     src=\"web/sites/default/files/styles/portfolio_653x368/public/thumb30b6e7.jpg?itok=aZtX88aO\"
                                                                     width=\"653\"
                                                                     height=\"368\"
                                                                     alt=\"Indegene Digital Summit 2020 Highlights\"
                                                                     title=\"Indegene Digital Summit 2020 Highlights\"
                                                                     />
                                                                  </a>
                                                               </div>
                                                               <br />
                                                               <div class=\"detail\">
                                                                  <span class=\"video-meta blue-meta\"><span class=\"date-display-single\">Jul 2020</span></span> •
                                                                  <span class=\"video-meta blue-meta\"><a href=\"insights/video.html\">video</a></span><br />
                                                                  <h3 class=\"font-alt black fw-700 mt-10 mb-20\">
                                                                     <a href=\"insights/video/indegene-digital-summit-2020-highlights.html\">Indegene Digital Summit 2020 Highlights</a>
                                                                  </h3>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class=\"clearfix visible-sm-block\"></div>
                                                      <div class=\"clearfix visible-md-block\"></div>
                                                      <div class=\"clearfix visible-lg-block\"></div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </section>
                                 <section class=\"page-section bg-scroll mt-100 text-black\" style=\"background-color: #ffffff; padding-top: 0px; padding-bottom: 0px;\">
                                    <div class=\"container\">
                                       <h3 class=\"fadeInUp align-center font-alt black wow fw-700\">Recognition</h3>
                                       <div>
                                          <div class=\"view view-custom-awards-carousel view-id-custom_awards_carousel view-display-id-attachment_1 view-dom-id-c30a7245bf6104e8d1492314e9d0c0d7\">
                                             <div class=\"clearfix\"></div>
                                             <div class=\"view-content\">
                                                <div class=\"owl-carousel-attachment_175\">
                                                   <div class=\"item-0 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/unnamed_0.jpg\"
                                                                  width=\"155\"
                                                                  height=\"103\"
                                                                  alt=\"India’s Best Workplaces in Health &amp; Wellness 2020\"
                                                                  title=\"India’s Best Workplaces in Health &amp; Wellness 2020\"
                                                                  />
                                                            </div>
                                                            <h3>India’s Best Workplaces in Health &amp; Wellness 2020</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-1 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/BCWI-100-Best-2020.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"2020 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  title=\"2020 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  />
                                                            </div>
                                                            <h3>2020 Working Mother &amp; Avtar 100 Best Companies for Women in India</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-2 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/GPTW-Women.png\"
                                                                  width=\"119\"
                                                                  height=\"120\"
                                                                  alt=\"India&#039;s Best Workplaces for Women 2020\"
                                                                  title=\"India&#039;s Best Workplaces for Women 2020\"
                                                                  />
                                                            </div>
                                                            <h3>India's Best Workplaces for Women 2020</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-3 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/Professional-Services-Logo.png\"
                                                                  width=\"118\"
                                                                  height=\"120\"
                                                                  alt=\"India&#039;s Best Workplaces in Professional Services 2020\"
                                                                  title=\"India&#039;s Best Workplaces in Professional Services 2020\"
                                                                  />
                                                            </div>
                                                            <h3>India's Best Workplaces in Professional Services 2020</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-4 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/GPTW-2020.png\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"India’s Best Companies to Work For 2020\"
                                                                  title=\"India’s Best Companies to Work For 2020\"
                                                                  />
                                                            </div>
                                                            <h3>India’s Best Companies to Work For 2020</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-5 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/Arogya-2019.png\"
                                                                  width=\"134\"
                                                                  height=\"120\"
                                                                  alt=\"Arogya World’s 2019 Platinum Healthy Workplaces\"
                                                                  title=\"Arogya World’s 2019 Platinum Healthy Workplaces\"
                                                                  />
                                                            </div>
                                                            <h3>Arogya World’s 2019 Platinum Healthy Workplaces</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-6 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/BCWI%202019.png\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"2019 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  title=\"2019 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  />
                                                            </div>
                                                            <h3>2019 Working Mother &amp; Avtar 100 Best Companies for Women in India</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-7 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/100-best-companies-for-women-2018.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"2018 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  title=\"2018 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  />
                                                            </div>
                                                            <h3>2018 Working Mother &amp; Avtar 100 Best Companies for Women in India</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-8 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/arogya-world-healthy-workplace-conference-and-awards-2017.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"Arogya World Healthy Workplace Conference and Awards 2017\"
                                                                  title=\"Arogya World Healthy Workplace Conference and Awards 2017\"
                                                                  />
                                                            </div>
                                                            <h3>Arogya World Healthy Workplace Conference and Awards 2017</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-9 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/100-best-companies-for-women-2018_0.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"2017 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  title=\"2017 Working Mother &amp; Avtar 100 Best Companies for Women in India\"
                                                                  />
                                                            </div>
                                                            <h3>2017 Working Mother &amp; Avtar 100 Best Companies for Women in India</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-10 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/hr-excellence-awards-2016.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"2016 Human Resources HR Excellence Awards\"
                                                                  title=\"2016 Human Resources HR Excellence Awards\"
                                                                  />
                                                            </div>
                                                            <h3>2016 Human Resources HR Excellence Awards</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-11 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/the-goldenlobe-tigers-award-2016.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"2016 The Golden Globe Tigers Award\"
                                                                  title=\"2016 The Golden Globe Tigers Award\"
                                                                  />
                                                            </div>
                                                            <h3>2016 The Golden Globe Tigers Award</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-12 item-odd\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/hr-tech-conference-awards.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"HR Tech Conference Awards\"
                                                                  title=\"HR Tech Conference Awards\"
                                                                  />
                                                            </div>
                                                            <h3>HR Tech Conference Awards</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class=\"item-13 item-even\">
                                                      <div class=\"views-field views-field-field-award-logos\">
                                                         <div class=\"field-content\">
                                                            <div class=\"image\">
                                                               <img
                                                                  src=\"web/sites/default/files/talent-acquisition-league.jpg\"
                                                                  width=\"200\"
                                                                  height=\"109\"
                                                                  alt=\"People Matters Talent Acquisition League Annual Conference\"
                                                                  title=\"People Matters Talent Acquisition League Annual Conference\"
                                                                  />
                                                            </div>
                                                            <h3>People Matters Talent Acquisition League Annual Conference</h3>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </section>
                                 <div class=\"fadeInUp container wow mt-100 mb-100\">
                                    <section class=\"page-section bg-scroll\" style=\"background-color: #f9f9f9; padding-top: 0px; padding-bottom: 0px;\">
                                       <div class=\"container\">
                                          <div class=\"row givingback_div\">
                                             <div class=\"col-md-6 small-section-3 f-right\">
                                                <h3 class=\"align-left font-alt black\" style=\"margin-top: 0px; margin-bottom: 15px;\">Giving Back</h3>
                                                <p>As much as we emphasize improving outcomes, we’re also about giving back to the community.</p>
                                                <a class=\"btn btn-mod btn-small btn-round\" style=\"margin-top: 10px;\" href=\"about-us/indegene-giving-back.html\">Learn more</a>
                                             </div>
                                             <div class=\"col-md-6 hwd_img_2\" style=\"background-image: url('https://www.indegene.com/sites/default/files/Giving%20Back.jpeg');\"></div>
                                          </div>
                                       </div>
                                    </section>
                                    <section class=\"page-section bg-scroll\" style=\"background-color: #f9f9f9; padding-top: 0px; padding-bottom: 0px;\">
                                       <div class=\"container\">
                                          <div class=\"row aboutgiving_div\">
                                             <div class=\"col-md-6 small-section-3\">
                                                <h3 class=\"align-left font-alt black\" style=\"margin-top: 0px; margin-bottom: 15px;\">Global Presence</h3>
                                                <p>
                                                   Our customers operate around the world and so do we. Through local teams in the US, UK, Europe, China, Japan and India, we understand the nuances of each market and deliver
                                                   outcomes customized to them.
                                                </p>
                                                <a class=\"btn btn-mod btn-small btn-round\" style=\"margin-top: 10px; float: left;\" href=\"contact-us.html#locations\"><i class=\"fa fa-angle-right\"></i> Our Locations</a>
                                                <a class=\"btn btn-mod btn-gray btn-small btn-round\" style=\"margin-top: 20px; clear: both; float: left;\" href=\"indegene-china.html\">
                                                <i class=\"fa fa-angle-right\"></i> Indegene China
                                                </a>
                                                <a class=\"btn btn-mod btn-gray btn-small btn-round\" style=\"margin-top: 20px; clear: both; float: left;\" href=\"indegene-china/chinese.html\">
                                                <i class=\"fa fa-angle-right\"></i> 英帝捷中国
                                                </a>
                                                <a class=\"btn btn-mod btn-gray btn-small btn-round\" style=\"clear: both; float: left; margin-top: 10px;\" href=\"indegene-japan.html\">
                                                <i class=\"fa fa-angle-right\"></i> Indegene Japan
                                                </a>
                                                <a class=\"btn btn-mod btn-gray btn-small btn-round\" style=\"clear: both; float: left; margin-top: 10px;\" href=\"indegene-japan/japanese.html\">
                                                <i class=\"fa fa-angle-right\"></i> インデジーンジャパン
                                                </a>
                                             </div>
                                             <div class=\"col-md-6 hwd_img\" style=\"background-image: url('https://www.indegene.com/sites/default/files/world%20map.jpg');\"></div>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                                 <div class=\"fadeInUp container wow mb-100 mt-100\">
                                    <section
                                       class=\"page-section bg-scroll banner-section bg-image-right marketing-info-box\"
                                       style=\"background-color: #0a4ca4; background-image: url('https://www.indegene.com/sites/default/files/CTA_5.jpeg');\"
                                       data-background=\"https://www.indegene.com/sites/default/files/CTA_5.jpeg\"
                                       data-uri=\"public://CTA_5.jpeg\"
                                       >
                                       <div class=\"row\">
                                          <div class=\"col-md-1\"></div>
                                          <div class=\"col-md-6 white-box\">
                                             <h2 class=\"align-left font-alt black fw-700\">Let’s chat about #FutureReadyHealthcare</h2>
                                             <a class=\"btn btn-mod btn-medium btn-round\" href=\"business-inquiry.html\">Contact us</a>
                                          </div>
                                       </div>
                                    </section>
                                 </div>
                                 <div class=\"border-box-2\"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.block -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class=\"nd-region container\">
      <div class=\"container\">
         <div class=\"container\">
            <div id=\"Content-Bottom-Full-Width\" class=\"row\"></div>
         </div>
      </div>
   </div>
   <div class=\"nd-region\">
      <div class=\"container-fluid\">
         <div id=\"Content-Bottom-Full-Width\" class=\"row\"></div>
      </div>
   </div>
   <div class=\"nd-region\">
      <div class=\"container-fluid\">
         <div id=\"Header\" class=\"row\">
            <div id=\"footer\" class=\"col-md-12\">
               <div class=\"region region-footer\">
                  <div id=\"block-block-71\" class=\"block block-block\">
                     <div class=\"block-content clearfix\">
                        <section class=\"page-section bg-scroll mob-mt-20\" style=\"background-color: #0a4ca4;\">
                           <div class=\"container\">
                              <div class=\"row\">
                                 <div class=\"col-md-7 mob-mb-30\">
                                    <h3 class=\"font-alt white\" style=\"margin-top: 0px; margin-bottom: 20px;\">About Indegene</h3>
                                    <div class=\"large-text blue\">
                                       <p>
                                          We are a technology-led healthcare solutions provider. We combine deep industry expertise with fit-for-purpose technology in an agile and scalable operating model. Many of the leading,
                                          global healthcare organizations rely on us to deliver effective and efficient clinical, medical and commercial outcomes every day. From strategy to execution, we enable healthcare
                                          organizations be future ready.
                                       </p>
                                    </div>
                                 </div>
                                 <div class=\"col-md-1\"></div>
                                 <div class=\"col-md-4\">
                                    <h2 class=\"align-left font-alt white fw-700\" style=\"margin-top: 0px; margin-bottom: 20px;\">Stay connected</h2>
                                    <div id=\"block-simplenews-75\" class=\"block block-simplenews\">
                                       <h5 class=\"font-alt mb-sm-40 widget-title\">| newsletter</h5>
                                       <div class=\"block-content clearfix\">
                                          <div id=\"clientsidevalidation-simplenews-block-form-75-errors\" class=\"messages error clientside-error\" style=\"display: none;\">
                                             <ul></ul>
                                          </div>
                                          <form class=\"simplenews-subscribe form\" action=\"/\" method=\"post\" id=\"simplenews-block-form-75\" accept-charset=\"UTF-8\" novalidate=\"novalidate\">
                                             <div>
                                                <div class=\"form-item form-type-textfield form-item-mail\">
                                                   <input placeholder=\"E-mail\" class=\"input-md form-control round\" type=\"text\" id=\"edit-mail\" name=\"mail\" value=\"\" size=\"20\" maxlength=\"128\" />
                                                   <input class=\"btn-medium btn btn-mod btn-round form-submit\" type=\"submit\" id=\"edit-submit\" name=\"op\" value=\"Subscribe\" />
                                                </div>
                                                <input type=\"hidden\" name=\"form_build_id\" value=\"form-nDsRa56eoJWTx9u1nmaQLxIcU6UZ1WtpadaJxA9VLsA\" />
                                                <input type=\"hidden\" name=\"form_id\" value=\"simplenews_block_form_75\" />
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class=\"page-section bg-scroll text-white\" style=\"padding-top: 40px; padding-bottom: 40px; background-color: #000000;\">
                           <div class=\"container\">
                              <div class=\"row\">

                                 <div class=\"col-md-2\">

                                    ";
        // line 740
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "bottom_footer_region1", [])), "html", null, true);
        echo "
                                    ";
        // line 744
        echo "                                 </div>
                                 <div class=\"col-md-6\">
                                  ";
        // line 746
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "bottom_footer_region2", [])), "html", null, true);
        echo "

                                    ";
        // line 758
        echo "                                    <!-- /.block -->
                                 </div>
                                 <div class=\"col-md-4 social-media-icons\">
                                  ";
        // line 761
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "bottom_footer_region3", [])), "html", null, true);
        echo "

                                    ";
        // line 775
        echo "                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                  </div>
                  <!-- /.block -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class=\"local-scroll\">
      <a href=\"#top\" class=\"link-to-top\"><i class=\"fa fa-caret-up\"></i></a>
   </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "themes/custom/indegenetheme/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  734 => 775,  729 => 761,  724 => 758,  719 => 746,  715 => 744,  711 => 740,  181 => 212,  177 => 152,  155 => 132,  151 => 128,  144 => 124,  84 => 67,  74 => 60,  59 => 47,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/indegenetheme/templates/layout/page.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\indegenetheme\\templates\\layout\\page.html.twig");
    }
}
