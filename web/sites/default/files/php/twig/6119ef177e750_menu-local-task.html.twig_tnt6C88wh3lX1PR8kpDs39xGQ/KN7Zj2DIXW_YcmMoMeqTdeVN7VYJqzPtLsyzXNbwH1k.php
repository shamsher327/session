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

/* themes/contrib/bootstrap4/templates/navigation/menu-local-task.html.twig */
class __TwigTemplate_c659b444990165d595545605c13c37aaa92174c6d5ec504288db949e6ff7fb3d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 18, "if" => 25];
        $filters = ["escape" => 23, "t" => 27];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
        // line 18
        $context["classes"] = [0 => "nav-item", 1 => ((        // line 20
($context["is_active"] ?? null)) ? ("nav-link active") : (""))];
        // line 23
        echo "<li";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
  ";
        // line 24
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null)), "html", null, true);
        echo "
  ";
        // line 25
        if ((($context["is_active"] ?? null) && (($context["level"] ?? null) == "primary"))) {
            // line 26
            echo "    <a href=\"#\" class=\"tab-toggle dropdown-toggle\" data-drupal-nav-tabs-toggle aria-haspopup=\"true\" aria-expanded=\"false\">
      <span class=\"visually-hidden\">";
            // line 27
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Toggle tabs as a menu"));
            echo "</span>
    </a>
  ";
        }
        // line 30
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap4/templates/navigation/menu-local-task.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 30,  72 => 27,  69 => 26,  67 => 25,  63 => 24,  58 => 23,  56 => 20,  55 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap4/templates/navigation/menu-local-task.html.twig", "C:\\xampp\\htdocs\\session\\web\\themes\\contrib\\bootstrap4\\templates\\navigation\\menu-local-task.html.twig");
    }
}
