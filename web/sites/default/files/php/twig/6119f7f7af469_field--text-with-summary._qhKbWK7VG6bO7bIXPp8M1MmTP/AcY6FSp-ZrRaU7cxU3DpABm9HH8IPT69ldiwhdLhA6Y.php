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

<<<<<<< HEAD
/* themes/custom/indegene/templates/field/field--text-with-summary.html.twig */
class __TwigTemplate_e7d63bc2f362eabb713db1f5a201a9081a4d7458069c5b8f8f14a84a2511ac07 extends \Twig\Template
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-long.html.twi_1NNBt_KnuQnSg4laqxNZFBAyv/_XGj3Ea58C_M4T-ZR1qPxV1hZLjoH2PU1WAW8kEtkQQ.php
/* themes/custom/srishtytheme/templates/field/field--text-long.html.twig */
class __TwigTemplate_90e02b8282354067f72dfd8a63c2aca652eb4b3416c4abe6b332e27d3eecb50d extends \Twig\Template
=======
/* themes/custom/indegene/templates/field/field--text-with-summary.html.twig */
class __TwigTemplate_e7d63bc2f362eabb713db1f5a201a9081a4d7458069c5b8f8f14a84a2511ac07 extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--text-with-summary._qhKbWK7VG6bO7bIXPp8M1MmTP/AcY6FSp-ZrRaU7cxU3DpABm9HH8IPT69ldiwhdLhA6Y.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
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
        return "field--text.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
<<<<<<< HEAD
        $this->parent = $this->loadTemplate("field--text.html.twig", "themes/custom/indegene/templates/field/field--text-with-summary.html.twig", 1);
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-long.html.twi_1NNBt_KnuQnSg4laqxNZFBAyv/_XGj3Ea58C_M4T-ZR1qPxV1hZLjoH2PU1WAW8kEtkQQ.php
        $this->parent = $this->loadTemplate("field--text.html.twig", "themes/custom/srishtytheme/templates/field/field--text-long.html.twig", 1);
=======
        $this->parent = $this->loadTemplate("field--text.html.twig", "themes/custom/indegene/templates/field/field--text-with-summary.html.twig", 1);
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--text-with-summary._qhKbWK7VG6bO7bIXPp8M1MmTP/AcY6FSp-ZrRaU7cxU3DpABm9HH8IPT69ldiwhdLhA6Y.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
<<<<<<< HEAD
        return "themes/custom/indegene/templates/field/field--text-with-summary.html.twig";
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-long.html.twi_1NNBt_KnuQnSg4laqxNZFBAyv/_XGj3Ea58C_M4T-ZR1qPxV1hZLjoH2PU1WAW8kEtkQQ.php
        return "themes/custom/srishtytheme/templates/field/field--text-long.html.twig";
=======
        return "themes/custom/indegene/templates/field/field--text-with-summary.html.twig";
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--text-with-summary._qhKbWK7VG6bO7bIXPp8M1MmTP/AcY6FSp-ZrRaU7cxU3DpABm9HH8IPT69ldiwhdLhA6Y.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 1,);
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
        return new Source("", "themes/custom/indegene/templates/field/field--text-with-summary.html.twig", "/var/www/html/web/themes/custom/indegene/templates/field/field--text-with-summary.html.twig");
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-long.html.twi_1NNBt_KnuQnSg4laqxNZFBAyv/_XGj3Ea58C_M4T-ZR1qPxV1hZLjoH2PU1WAW8kEtkQQ.php
        return new Source("", "themes/custom/srishtytheme/templates/field/field--text-long.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\field\\field--text-long.html.twig");
=======
        return new Source("", "themes/custom/indegene/templates/field/field--text-with-summary.html.twig", "/var/www/html/web/themes/custom/indegene/templates/field/field--text-with-summary.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--text-with-summary._qhKbWK7VG6bO7bIXPp8M1MmTP/AcY6FSp-ZrRaU7cxU3DpABm9HH8IPT69ldiwhdLhA6Y.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }
}
