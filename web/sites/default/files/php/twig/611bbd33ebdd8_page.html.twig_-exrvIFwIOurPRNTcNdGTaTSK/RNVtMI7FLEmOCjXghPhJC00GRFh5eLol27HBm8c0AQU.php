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
        $tags = ["set" => 46, "if" => 70];
        $filters = ["escape" => 64];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
        // line 46
        $context["nav_classes"] = ((("navbar navbar-expand-lg" . (((        // line 47
($context["b4_navbar_schema"] ?? null) != "none")) ? ((" navbar-" . $this->sandbox->ensureToStringAllowed(($context["b4_navbar_schema"] ?? null)))) : (" "))) . (((        // line 48
($context["b4_navbar_schema"] ?? null) != "none")) ? ((((($context["b4_navbar_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 49
($context["b4_navbar_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b4_navbar_bg_schema"] ?? null)))) : (" ")));
        // line 51
        echo "
";
        // line 53
        $context["footer_classes"] = (((" " . (((        // line 54
($context["b4_footer_schema"] ?? null) != "none")) ? ((" footer-" . $this->sandbox->ensureToStringAllowed(($context["b4_footer_schema"] ?? null)))) : (" "))) . (((        // line 55
($context["b4_footer_schema"] ?? null) != "none")) ? ((((($context["b4_footer_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 56
($context["b4_footer_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b4_footer_bg_schema"] ?? null)))) : (" ")));
        // line 58
        echo "
<header>
<div class=\"label bg-dark\">
  <span class=\"text color-text-flow\">!! Important Text!! </span>
</div>
<div class=\"row\">
  <div class=\"col-md-6\">";
        // line 64
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "top_srishty_header", [])), "html", null, true);
        echo "</div>
  <div class=\"col-md-6\">";
        // line 65
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "social_links", [])), "html", null, true);
        echo "</div>
</div>

";
        // line 68
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "

";
        // line 70
        if ((($this->getAttribute(($context["page"] ?? null), "nav_branding", []) || $this->getAttribute(($context["page"] ?? null), "nav_main", [])) || $this->getAttribute(($context["page"] ?? null), "nav_additional", []))) {
            // line 71
            echo "<nav class=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nav_classes"] ?? null)), "html", null, true);
            echo "\">
  <div class=\"";
            // line 72
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b4_top_container"] ?? null)), "html", null, true);
            echo " row mx-auto\">
    <div class=\"col-auto p-0\">
        ";
            // line 74
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_branding", [])), "html", null, true);
            echo "
    </div>

    <div class=\"col-3 col-md-auto p-0 text-right\">
      <button class=\"navbar-toggler collapsed\" type=\"button\" data-toggle=\"collapse\"
              data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
              aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
    </div>

    <div class=\"collapse navbar-collapse col-12 col-md-auto p-0 justify-content-end\" id=\"navbarSupportedContent\">
      ";
            // line 86
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_main", [])), "html", null, true);
            echo "
      ";
            // line 87
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_additional", [])), "html", null, true);
            echo "
    </div>
  </div>
</nav>
";
        }
        // line 92
        echo "
</header>

<main role=\"main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 97
        echo "
  ";
        // line 99
        $context["sidebar_first_classes"] = ((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 101
        echo "
  ";
        // line 103
        $context["sidebar_second_classes"] = ((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 105
        echo "
  ";
        // line 107
        $context["content_classes"] = ((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-lg-6") : (((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) || $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-lg-9") : ("col-12"))));
        // line 109
        echo "

  <div class=\"";
        // line 111
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b4_top_container"] ?? null)), "html", null, true);
        echo "\">
    ";
        // line 112
        if ($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])) {
            // line 113
            echo "      ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
            echo "
    ";
        }
        // line 115
        echo "    <div class=\"row no-gutters\">
      ";
        // line 116
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 117
            echo "        <div class=\"order-2 order-lg-1 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_classes"] ?? null)), "html", null, true);
            echo "\">
          ";
            // line 118
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 121
        echo "      <div class=\"order-1 order-lg-2 ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_classes"] ?? null)), "html", null, true);
        echo "\">
        ";
        // line 122
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
      </div>
      ";
        // line 124
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 125
            echo "        <div class=\"order-3 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_classes"] ?? null)), "html", null, true);
            echo "\">
          ";
            // line 126
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 129
        echo "    </div>
  </div>

</main>

";
        // line 134
        if ($this->getAttribute(($context["page"] ?? null), "footer", [])) {
            // line 135
            echo "<footer class=\"mt-auto ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_classes"] ?? null)), "html", null, true);
            echo "\">
  <div class=\"";
            // line 136
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b4_top_container"] ?? null)), "html", null, true);
            echo "\">
    ";
            // line 137
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
            echo "
  </div>
</footer>
";
        }
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
        return array (  224 => 137,  220 => 136,  215 => 135,  213 => 134,  206 => 129,  200 => 126,  195 => 125,  193 => 124,  188 => 122,  183 => 121,  177 => 118,  172 => 117,  170 => 116,  167 => 115,  161 => 113,  159 => 112,  155 => 111,  151 => 109,  149 => 107,  146 => 105,  144 => 103,  141 => 101,  139 => 99,  136 => 97,  130 => 92,  122 => 87,  118 => 86,  103 => 74,  98 => 72,  93 => 71,  91 => 70,  86 => 68,  80 => 65,  76 => 64,  68 => 58,  66 => 56,  65 => 55,  64 => 54,  63 => 53,  60 => 51,  58 => 49,  57 => 48,  56 => 47,  55 => 46,);
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
