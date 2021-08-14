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

/* modules/contrib/uikit_slideshow/templates/views-view-uikit-slideshow.html.twig */
class __TwigTemplate_f42e6f635fcaccb771ac4b337936a1ba80b627fe56c0a41cbbb772792ee2addb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 24, "for" => 25];
        $filters = ["escape" => 27];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for'],
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
        // line 21
        echo "
<div data-uk-slideshow=\"{autoplay:true, kenburns:true}\">
  <ul class=\"uk-slideshow uk-overlay-active\">
    ";
        // line 24
        $context["rowCount"] =  -1;
        // line 25
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 26
            echo "      ";
            $context["rowCount"] = (($context["rowCount"] ?? null) + 1);
            // line 27
            echo "      <li data-uk-slideshow-item=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rowCount"] ?? null)), "html", null, true);
            echo ">
        ";
            // line 28
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "slide_image", [])), "html", null, true);
            echo "
        <div class=\"uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-fade\">
          <h2";
            // line 30
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["title_attributes"] ?? null), "addClass", [0 => "node__title"], "method")), "html", null, true);
            echo ">
            ";
            // line 31
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "slide_title", [])), "html", null, true);
            echo "
          </h2>
          <div class=\"uk-hidden-small\">
            ";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "slide_body", [])), "html", null, true);
            echo "
          </div>
        </div>
        <a class=\"uk-position-cover\" href=\"javascript:;\" onclick=\"window.location.href=('";
            // line 37
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "node_link", [])), "html", null, true);
            echo "')\"></a>
      </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "  </ul>
  <ul class=\"uk-slideset uk-grid uk-grid-small uk-flex-center uk-container-center uk-grid-width-1-10\">
    ";
        // line 42
        $context["rowCount"] =  -1;
        // line 43
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 44
            echo "      ";
            $context["rowCount"] = (($context["rowCount"] ?? null) + 1);
            // line 45
            echo "      <li class=\"uk-margin-small-top uk-margin-small-bottom\" data-uk-slideshow-item=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rowCount"] ?? null)), "html", null, true);
            echo ">
        ";
            // line 46
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "thumbnail", [])), "html", null, true);
            echo "
      </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "  </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/contrib/uikit_slideshow/templates/views-view-uikit-slideshow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 49,  124 => 46,  119 => 45,  116 => 44,  111 => 43,  109 => 42,  105 => 40,  96 => 37,  90 => 34,  84 => 31,  80 => 30,  75 => 28,  70 => 27,  67 => 26,  62 => 25,  60 => 24,  55 => 21,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/uikit_slideshow/templates/views-view-uikit-slideshow.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\modules\\contrib\\uikit_slideshow\\templates\\views-view-uikit-slideshow.html.twig");
    }
}
