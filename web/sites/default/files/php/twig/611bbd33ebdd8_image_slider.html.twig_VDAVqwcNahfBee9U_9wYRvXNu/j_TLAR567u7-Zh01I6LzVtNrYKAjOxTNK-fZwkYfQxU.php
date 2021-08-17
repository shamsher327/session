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

/* modules/contrib/image_slider/templates/image_slider.html.twig */
class __TwigTemplate_0f4c1d054cbf6bcc4dd18b6658a7ed02b32e4cf34e81e888afee7f9adf62325a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 5, "for" => 12];
        $filters = ["escape" => 2, "t" => 99];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 't'],
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
        echo "<div class=\"slider_main\">
  <!-- <div class=\"slider_name\">";
        // line 2
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["data"] ?? null), "name", [])), "html", null, true);
        echo "</div>
  <div class=\"slider_description\">";
        // line 3
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["data"] ?? null), "description", [])), "html", null, true);
        echo "</div>-->
  <div class=\"slider_description\"></div>
  ";
        // line 5
        if (($this->getAttribute(($context["data"] ?? null), "slide_type", []) == "image-slider")) {
            // line 6
            echo "    <div id=\"jssor_1\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-004-double-tail-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/double-tail-spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;\">
        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 13
                echo "          <div style=\"background-color:#000000;\">
            <img data-u=\"image\" style=\"opacity:0.5;\" src=\"";
                // line 14
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
            <div data-ts=\"flat\" data-p=\"320\" style=\"left:144px;top:80px;width:550px;height:90px;position:absolute;\">
              <div data-to=\"50% 50%\" data-ts=\"preserve-3d\" data-t=\"0\" style=\"left:550px;top:0px;width:550px;height:90px;position:absolute;\">
                <div data-to=\"50% 50%\" data-ts=\"preserve-3d\" data-arr=\"2\" style=\"left:19px;top:36px;width:600px;height:30px;position:absolute;color:#edf1f2;font-size:24px;line-height:1.2;letter-spacing:0.05em;\">";
                // line 17
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_alt", [])), "html", null, true);
                echo "</div>
              </div>
            </div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "      </div>
      <a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">slider html</a>
      <!-- Bullet Navigator -->
      <div data-u=\"navigator\" class=\"jssorb031\" style=\"position:absolute;bottom:16px;right:16px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
        <div data-u=\"prototype\" class=\"i\" style=\"width:13px;height:13px;\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <circle class=\"b\" cx=\"8000\" cy=\"8000\" r=\"5800\"></circle>
          </svg>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora051\" style=\"width:55px;height:55px;top:0px;left:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <polyline class=\"a\" points=\"11040,1920 4960,8000 11040,14080 \"></polyline>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora051\" style=\"width:55px;height:55px;top:0px;right:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <polyline class=\"a\" points=\"4960,1920 11040,8000 4960,14080 \"></polyline>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 44
($context["data"] ?? null), "slide_type", []) == "image-gallery")) {
            // line 45
            echo "    <div id=\"jssor_2\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;\">
        ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 52
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 53
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
            <img data-u=\"thumb\" src=\"";
                // line 54
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">web animation</a>
      <!-- Thumbnail Navigator -->
      <div data-u=\"thumbnavigator\" class=\"jssort101\" style=\"position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;\" data-autocenter=\"1\" data-scale-bottom=\"0.75\">
        <div data-u=\"slides\">
          <div data-u=\"prototype\" class=\"p\" style=\"width:190px;height:90px;\">
            <div data-u=\"thumbnailtemplate\" class=\"t\"></div>
            <svg viewbox=\"0 0 16000 16000\" class=\"cv\">
            <circle class=\"a\" cx=\"8000\" cy=\"8000\" r=\"3238.1\"></circle>
            <line class=\"a\" x1=\"6190.5\" y1=\"8000\" x2=\"9809.5\" y2=\"8000\"></line>
            <line class=\"a\" x1=\"8000\" y1=\"9809.5\" x2=\"8000\" y2=\"6190.5\"></line>
            </svg>
          </div>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora106\" style=\"width:55px;height:55px;top:162px;left:30px;\" data-scale=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <circle class=\"c\" cx=\"8000\" cy=\"8000\" r=\"6260.9\"></circle>
        <polyline class=\"a\" points=\"7930.4,5495.7 5426.1,8000 7930.4,10504.3 \"></polyline>
        <line class=\"a\" x1=\"10573.9\" y1=\"8000\" x2=\"5426.1\" y2=\"8000\"></line>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora106\" style=\"width:55px;height:55px;top:162px;right:30px;\" data-scale=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <circle class=\"c\" cx=\"8000\" cy=\"8000\" r=\"6260.9\"></circle>
        <polyline class=\"a\" points=\"8069.6,5495.7 10573.9,8000 8069.6,10504.3 \"></polyline>
        <line class=\"a\" x1=\"5426.1\" y1=\"8000\" x2=\"10573.9\" y2=\"8000\"></line>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 87
($context["data"] ?? null), "slide_type", []) == "banner-rotator")) {
            // line 88
            echo "    <div id=\"jssor_3\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;\">
        ";
            // line 94
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 95
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 96
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Responsive slider"));
            echo "</a>
      <!-- Bullet Navigator -->
      <div data-u=\"navigator\" class=\"jssorb053\" style=\"position:absolute;bottom:16px;right:16px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
        <div data-u=\"prototype\" class=\"i\" style=\"width:12px;height:12px;\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <path class=\"b\" d=\"M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z\"></path>
          </svg>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora093\" style=\"width:50px;height:50px;top:0px;left:30px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <circle class=\"c\" cx=\"8000\" cy=\"8000\" r=\"5920\"></circle>
        <polyline class=\"a\" points=\"7777.8,6080 5857.8,8000 7777.8,9920 \"></polyline>
        <line class=\"a\" x1=\"10142.2\" y1=\"8000\" x2=\"5857.8\" y2=\"8000\"></line>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora093\" style=\"width:50px;height:50px;top:0px;right:30px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <circle class=\"c\" cx=\"8000\" cy=\"8000\" r=\"5920\"></circle>
        <polyline class=\"a\" points=\"8222.2,6080 10142.2,8000 8222.2,9920 \"></polyline>
        <line class=\"a\" x1=\"5857.8\" y1=\"8000\" x2=\"10142.2\" y2=\"8000\"></line>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 124
($context["data"] ?? null), "slide_type", []) == "banner-slider")) {
            // line 125
            echo "    <div id=\"jssor_4\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;\">
        ";
            // line 131
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 132
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 133
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
            <div u=\"thumb\">";
                // line 134
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_alt", [])), "html", null, true);
                echo "</div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">image gallery</a>
      <!-- Thumbnail Navigator -->
      <div u=\"thumbnavigator\" style=\"position:absolute;bottom:0px;left:0px;width:980px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);\">
        <div u=\"slides\">
          <div u=\"prototype\" style=\"position:absolute;top:0;left:0;width:980px;height:50px;\">
            <div u=\"thumbnailtemplate\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;\"></div>
          </div>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora061\" style=\"width:55px;height:55px;top:0px;left:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <path class=\"a\" d=\"M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079\"></path>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora061\" style=\"width:55px;height:55px;top:0px;right:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <path class=\"a\" d=\"M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079\"></path>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 158
($context["data"] ?? null), "slide_type", []) == "carousel-slider")) {
            // line 159
            echo "    <div id=\"jssor_5\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:150px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;\">
        ";
            // line 165
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 166
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 167
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">web animation composer</a>
      <!-- Bullet Navigator -->
      <div data-u=\"navigator\" class=\"jssorb057\" style=\"position:absolute;bottom:12px;right:12px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
        <div data-u=\"prototype\" class=\"i\" style=\"width:14px;height:14px;\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <circle class=\"b\" cx=\"8000\" cy=\"8000\" r=\"5000\"></circle>
          </svg>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora073\" style=\"width:50px;height:50px;top:0px;left:30px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <path class=\"a\" d=\"M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z\"></path>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora073\" style=\"width:50px;height:50px;top:0px;right:30px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <path class=\"a\" d=\"M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z\"></path>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 191
($context["data"] ?? null), "slide_type", []) == "nearby-image-partial-visible-slider")) {
            // line 192
            echo "    <div id=\"jssor_6\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;\">
        ";
            // line 198
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 199
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 200
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">animation</a>
      <!-- Bullet Navigator -->
      <div data-u=\"navigator\" class=\"jssorb051\" style=\"position:absolute;bottom:16px;right:16px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
        <div data-u=\"prototype\" class=\"i\" style=\"width:12px;height:12px;\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <circle class=\"b\" cx=\"8000\" cy=\"8000\" r=\"5800\"></circle>
          </svg>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora051\" style=\"width:65px;height:65px;top:0px;left:35px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <polyline class=\"a\" points=\"11040,1920 4960,8000 11040,14080 \"></polyline>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora051\" style=\"width:65px;height:65px;top:0px;right:35px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <polyline class=\"a\" points=\"4960,1920 11040,8000 4960,14080 \"></polyline>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 224
($context["data"] ?? null), "slide_type", []) == "image-gallery-with-vertical-thumbnail")) {
            // line 225
            echo "    <div id=\"jssor_7\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"../images/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:240px;width:720px;height:480px;overflow:hidden;\">
        ";
            // line 231
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 232
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 233
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
            <img data-u=\"thumb\" src=\"";
                // line 234
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 237
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">web animation composer</a>
      <!-- Thumbnail Navigator -->
      <div data-u=\"thumbnavigator\" class=\"jssort101\" style=\"position:absolute;left:0px;top:0px;width:240px;height:480px;background-color:#000;\" data-autocenter=\"2\" data-scale-left=\"0.75\">
        <div data-u=\"slides\">
          <div data-u=\"prototype\" class=\"p\" style=\"width:99px;height:66px;\">
            <div data-u=\"thumbnailtemplate\" class=\"t\"></div>
            <svg viewbox=\"0 0 16000 16000\" class=\"cv\">
            <circle class=\"a\" cx=\"8000\" cy=\"8000\" r=\"3238.1\"></circle>
            <line class=\"a\" x1=\"6190.5\" y1=\"8000\" x2=\"9809.5\" y2=\"8000\"></line>
            <line class=\"a\" x1=\"8000\" y1=\"9809.5\" x2=\"8000\" y2=\"6190.5\"></line>
            </svg>
          </div>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora093\" style=\"width:50px;height:50px;top:0px;left:270px;\" data-autocenter=\"2\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <circle class=\"c\" cx=\"8000\" cy=\"8000\" r=\"5920\"></circle>
        <polyline class=\"a\" points=\"7777.8,6080 5857.8,8000 7777.8,9920 \"></polyline>
        <line class=\"a\" x1=\"10142.2\" y1=\"8000\" x2=\"5857.8\" y2=\"8000\"></line>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora093\" style=\"width:50px;height:50px;top:0px;right:30px;\" data-autocenter=\"2\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <circle class=\"c\" cx=\"8000\" cy=\"8000\" r=\"5920\"></circle>
        <polyline class=\"a\" points=\"8222.2,6080 10142.2,8000 8222.2,9920 \"></polyline>
        <line class=\"a\" x1=\"5857.8\" y1=\"8000\" x2=\"10142.2\" y2=\"8000\"></line>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 267
($context["data"] ?? null), "slide_type", []) == "scrolling-logo-thumbnail-slider")) {
            // line 268
            echo "    <div id=\"jssor_8\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:100px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"img/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:980px;height:100px;overflow:hidden;\">
        ";
            // line 274
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 275
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 276
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 279
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">web design</a>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 281
($context["data"] ?? null), "slide_type", []) == "full-width-slider")) {
            // line 282
            echo "    <div id=\"jssor_9\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"img/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;\">
        ";
            // line 288
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 289
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 290
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
            <div data-ts=\"flat\" data-p=\"1080\" style=\"left:0px;top:0px;width:1600px;height:560px;position:absolute;\">
              <svg viewbox=\"0 0 600 400\" data-ts=\"preserve-3d\" width=\"600\" height=\"400\" data-tchd=\"jssor_1_msk_3\" style=\"left:255px;top:0px;display:block;position:absolute;overflow:visible;\">
              <g mask=\"url(#jssor_1_msk_3)\">
              <path data-to=\"300px -180px\" fill=\"none\" stroke=\"rgba(250,251,252,0.5)\" stroke-width=\"20\" d=\"M410-350L410-10L190-10L190-350Z\" x=\"190\" y=\"-350\" data-t=\"10\" style=\"position:absolute;overflow:visible;\"></path>
              </g>
              </svg>
              <svg viewbox=\"0 0 800 72\" data-to=\"50% 50%\" width=\"800\" height=\"72\" data-t=\"12\" style=\"left:1700px;top:153px;display:block;position:absolute;font-family:'Roboto Condensed',sans-serif;font-size:18px;font-weight:900;overflow:visible;\">
              <text fill=\"#fafbfc\" text-anchor=\"middle\" x=\"400\" y=\"72\">";
                // line 298
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_alt", [])), "html", null, true);
                echo "
              </text>
              </svg>
            </div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 304
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">slider html</a>
      <!-- Bullet Navigator -->
      <div data-u=\"navigator\" class=\"jssorb132\" style=\"position:absolute;bottom:24px;right:16px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
        <div data-u=\"prototype\" class=\"i\" style=\"width:12px;height:12px;\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <circle class=\"b\" cx=\"8000\" cy=\"8000\" r=\"5800\"></circle>
          </svg>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora051\" style=\"width:55px;height:55px;top:0px;left:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <polyline class=\"a\" points=\"11040,1920 4960,8000 11040,14080 \"></polyline>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora051\" style=\"width:55px;height:55px;top:0px;right:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <polyline class=\"a\" points=\"4960,1920 11040,8000 4960,14080 \"></polyline>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 325
($context["data"] ?? null), "slide_type", []) == "different-size-photo-slider")) {
            // line 326
            echo "    <div id=\"jssor_10\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:500px;overflow:hidden;visibility:hidden;\">
      <!-- Loading Screen -->
      <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
        <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"img/spin.svg\" />
      </div>
      <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:600px;height:500px;overflow:hidden;\">
        ";
            // line 332
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 333
                echo "          <div>
            <img data-u=\"image\" src=\"";
                // line 334
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 337
            echo "      </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">design web</a>
      <!-- Bullet Navigator -->
      <div data-u=\"navigator\" class=\"jssorb072\" style=\"position:absolute;bottom:16px;right:16px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
        <div data-u=\"prototype\" class=\"i\" style=\"width:24px;height:24px;font-size:12px;line-height:24px;\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;\">
          <circle class=\"b\" cx=\"8000\" cy=\"8000\" r=\"6666.7\"></circle>
          </svg>
          <div data-u=\"numbertemplate\" class=\"n\"></div>
        </div>
      </div>
      <!-- Arrow Navigator -->
      <div data-u=\"arrowleft\" class=\"jssora073\" style=\"width:40px;height:50px;top:0px;left:30px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <path class=\"a\" d=\"M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z\"></path>
        </svg>
      </div>
      <div data-u=\"arrowright\" class=\"jssora073\" style=\"width:40px;height:50px;top:0px;right:30px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
        <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
        <path class=\"a\" d=\"M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z\"></path>
        </svg>
      </div>
    </div>
  ";
        } elseif (($this->getAttribute(        // line 359
($context["data"] ?? null), "slide_type", []) == "full-window-for-pc")) {
            // line 360
            echo "    <div style=\"position:relative;top:0;left:0;width:100%;height:100%;overflow:hidden;\">
      <div id=\"jssor_11\" style=\"position:relative;margin:0 auto;top:0px;left:0px;width:1366px;height:768px;overflow:hidden;visibility:hidden;\">
        <!-- Loading Screen -->
        <div data-u=\"loading\" class=\"jssorl-009-spin\" style=\"position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);\">
          <img style=\"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;\" src=\"img/spin.svg\" />
        </div>
        <div data-u=\"slides\" style=\"cursor:default;position:relative;top:0px;left:0px;width:1366px;height:768px;overflow:hidden;\">
          ";
            // line 367
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "image", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 368
                echo "            <div>
              <img data-u=\"image\" src=\"";
                // line 369
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_url", [])), "html", null, true);
                echo "\" />
            </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 372
            echo "        </div><a data-scale=\"0\" href=\"https://www.jssor.com\" style=\"display:none;position:absolute;\">web design</a>
        <!-- Bullet Navigator -->
        <div data-u=\"navigator\" class=\"jssorb106\" style=\"position:absolute;bottom:16px;right:16px;\" data-autocenter=\"1\" data-scale=\"0.5\" data-scale-bottom=\"0.75\">
          <div data-u=\"prototype\" class=\"i\" style=\"width:12px;height:12px;\">
            <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
            <path class=\"b\" d=\"M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z\"></path>
            </svg>
          </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u=\"arrowleft\" class=\"jssora051\" style=\"width:55px;height:55px;top:0px;left:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-left=\"0.75\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <polyline class=\"a\" points=\"11040,1920 4960,8000 11040,14080 \"></polyline>
          </svg>
        </div>
        <div data-u=\"arrowright\" class=\"jssora051\" style=\"width:55px;height:55px;top:0px;right:25px;\" data-autocenter=\"2\" data-scale=\"0.75\" data-scale-right=\"0.75\">
          <svg viewbox=\"0 0 16000 16000\" style=\"position:absolute;top:0;left:0;width:100%;height:100%;\">
          <polyline class=\"a\" points=\"4960,1920 11040,8000 4960,14080 \"></polyline>
          </svg>
        </div>
      </div>
    </div>
  ";
        }
        // line 395
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/image_slider/templates/image_slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  650 => 395,  625 => 372,  616 => 369,  613 => 368,  609 => 367,  600 => 360,  598 => 359,  574 => 337,  565 => 334,  562 => 333,  558 => 332,  550 => 326,  548 => 325,  525 => 304,  513 => 298,  502 => 290,  499 => 289,  495 => 288,  487 => 282,  485 => 281,  481 => 279,  472 => 276,  469 => 275,  465 => 274,  457 => 268,  455 => 267,  423 => 237,  414 => 234,  410 => 233,  407 => 232,  403 => 231,  395 => 225,  393 => 224,  370 => 203,  361 => 200,  358 => 199,  354 => 198,  346 => 192,  344 => 191,  321 => 170,  312 => 167,  309 => 166,  305 => 165,  297 => 159,  295 => 158,  272 => 137,  263 => 134,  259 => 133,  256 => 132,  252 => 131,  244 => 125,  242 => 124,  213 => 99,  204 => 96,  201 => 95,  197 => 94,  189 => 88,  187 => 87,  155 => 57,  146 => 54,  142 => 53,  139 => 52,  135 => 51,  127 => 45,  125 => 44,  101 => 22,  90 => 17,  84 => 14,  81 => 13,  77 => 12,  69 => 6,  67 => 5,  62 => 3,  58 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/image_slider/templates/image_slider.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\modules\\contrib\\image_slider\\templates\\image_slider.html.twig");
    }
}
