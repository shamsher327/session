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

/* field--text.html.twig */
<<<<<<< HEAD
class __TwigTemplate_70e34647e3c0162057c65512b11bb9ef224765b85dfed24a452254087585f68d extends \Twig\Template
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text.html.twig_BYjUtLVe5k1r2uZhorhBKjv6o/MTVudNqODD7MdI8CakvWphErpRJndwn351Vp47ggEm8.php
class __TwigTemplate_5f8ea0ac3e05071c19ee239a2392f19996fcfd6132d9e7f3c53a9e57eb07f744 extends \Twig\Template
=======
class __TwigTemplate_70e34647e3c0162057c65512b11bb9ef224765b85dfed24a452254087585f68d extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--text.html.twig_u8raBgxo2T2-wUmI5JStjTZnz/ihvjr9YqU5mXj4OF75vLxEeUH9xBf8UBJ5i2y22I-Rc.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 28];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
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

    protected function doGetParent(array $context)
    {
        // line 1
        return "field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 28
        $context["attributes"] = $this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "clearfix", 1 => "text-formatted"], "method");
        // line 1
        $this->parent = $this->loadTemplate("field.html.twig", "field--text.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "field--text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 1,  59 => 28,  53 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
<<<<<<< HEAD
        return new Source("", "field--text.html.twig", "themes/custom/indegene/templates/field/field--text.html.twig");
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text.html.twig_BYjUtLVe5k1r2uZhorhBKjv6o/MTVudNqODD7MdI8CakvWphErpRJndwn351Vp47ggEm8.php
        return new Source("", "field--text.html.twig", "themes/custom/srishtytheme/templates/field/field--text.html.twig");
=======
        return new Source("", "field--text.html.twig", "themes/custom/indegene/templates/field/field--text.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--text.html.twig_u8raBgxo2T2-wUmI5JStjTZnz/ihvjr9YqU5mXj4OF75vLxEeUH9xBf8UBJ5i2y22I-Rc.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }
}
