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

/* themes/custom/indegene/templates/layout/page.html.twig */
class __TwigTemplate_f211d502e7dbfff27be4db33a6ab2a13d6b8a48a4ef949151d6d0627502134ef extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 67];
        $filters = ["escape" => 48];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
        // line 45
        echo "<div class=\"layout-container\">

    <header role=\"banner\">
        ";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "
    </header>

    ";
        // line 51
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "primary_menu", [])), "html", null, true);
        echo "
    ";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "secondary_menu", [])), "html", null, true);
        echo "

    ";
        // line 54
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
        echo "

    ";
        // line 56
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "highlighted", [])), "html", null, true);
        echo "

    ";
        // line 58
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "help", [])), "html", null, true);
        echo "

    <main role=\"main\">
        <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 62
        echo "
        <div class=\"layout-content\">
            ";
        // line 64
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
        </div>";
        // line 66
        echo "
        ";
        // line 67
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 68
            echo "            <aside class=\"layout-sidebar-first\" role=\"complementary\">
                ";
            // line 69
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
            echo "
            </aside>
        ";
        }
        // line 72
        echo "
        ";
        // line 73
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 74
            echo "            <aside class=\"layout-sidebar-second\" role=\"complementary\">
                ";
            // line 75
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
            echo "
            </aside>
        ";
        }
        // line 78
        echo "

        ";
        // line 80
        if ($this->getAttribute(($context["page"] ?? null), "indegene_top", [])) {
            // line 81
            echo "            <aside class=\"page-indegene-top\" role=\"complementary\" style=\"border:solid 1px red\">
                ";
            // line 82
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "indegene_top", [])), "html", null, true);
            echo "
            </aside>
        ";
        }
        // line 85
        echo "
    </main>

    ";
        // line 88
        if ($this->getAttribute(($context["page"] ?? null), "footer", [])) {
            // line 89
            echo "        <footer role=\"contentinfo\">
            ";
            // line 90
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
            echo "
        </footer>
    ";
        }
        // line 93
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom/indegene/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 93,  152 => 90,  149 => 89,  147 => 88,  142 => 85,  136 => 82,  133 => 81,  131 => 80,  127 => 78,  121 => 75,  118 => 74,  116 => 73,  113 => 72,  107 => 69,  104 => 68,  102 => 67,  99 => 66,  95 => 64,  91 => 62,  85 => 58,  80 => 56,  75 => 54,  70 => 52,  66 => 51,  60 => 48,  55 => 45,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/indegene/templates/layout/page.html.twig", "/var/www/html/web/themes/custom/indegene/templates/layout/page.html.twig");
    }
}
