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

/* themes/custom/srishtytheme/templates/content/links--node.html.twig */
class __TwigTemplate_8c5ad117a58daa8bed4d0e95a59d49f4c2bc6c29110beaf8a3ebc92786261893 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 36, "include" => 38];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
                [],
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
        // line 36
        if (($context["links"] ?? null)) {
            // line 37
            echo "  <div class=\"node__links\">
    ";
            // line 38
            $this->loadTemplate("links.html.twig", "themes/custom/srishtytheme/templates/content/links--node.html.twig", 38)->display($context);
            // line 39
            echo "  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/srishtytheme/templates/content/links--node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 39,  60 => 38,  57 => 37,  55 => 36,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/srishtytheme/templates/content/links--node.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\content\\links--node.html.twig");
    }
}
