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

<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-with-summary._nfSzR9kgCHuu1k9XL4vgO4bBF/A8XLALPeUbrK1GITimY4-t-coGF3neL9Q4V1WSNUZhQ.php
/* themes/custom/srishtytheme/templates/field/field--text-with-summary.html.twig */
class __TwigTemplate_1bffc3d100df93eb557b0d346921d3c01eff844402c284c3c8099795dac879fb extends \Twig\Template
=======
/* themes/custom/indegene/templates/field/image-style.html.twig */
class __TwigTemplate_7e70a96a7f0b272e1e960146b088b452a6ddaa8089e151856d1bc6cacd841ba3 extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_image-style.html.twig_9_rdN3PG8aShnEEhB8K78qrn-/ViQ2cLsoUHCWon6cW3a4PbOFKY1Vh9W-q92b6B5f2qI.php
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
        $this->parent = $this->loadTemplate("field--text.html.twig", "themes/custom/srishtytheme/templates/field/field--text-with-summary.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-with-summary._nfSzR9kgCHuu1k9XL4vgO4bBF/A8XLALPeUbrK1GITimY4-t-coGF3neL9Q4V1WSNUZhQ.php
        return "themes/custom/srishtytheme/templates/field/field--text-with-summary.html.twig";
=======
        return "themes/custom/indegene/templates/field/image-style.html.twig";
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_image-style.html.twig_9_rdN3PG8aShnEEhB8K78qrn-/ViQ2cLsoUHCWon6cW3a4PbOFKY1Vh9W-q92b6B5f2qI.php
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
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--text-with-summary._nfSzR9kgCHuu1k9XL4vgO4bBF/A8XLALPeUbrK1GITimY4-t-coGF3neL9Q4V1WSNUZhQ.php
        return new Source("", "themes/custom/srishtytheme/templates/field/field--text-with-summary.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\field\\field--text-with-summary.html.twig");
=======
        return new Source("", "themes/custom/indegene/templates/field/image-style.html.twig", "/var/www/html/web/themes/custom/indegene/templates/field/image-style.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_image-style.html.twig_9_rdN3PG8aShnEEhB8K78qrn-/ViQ2cLsoUHCWon6cW3a4PbOFKY1Vh9W-q92b6B5f2qI.php
    }
}
