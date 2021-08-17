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

<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_rdf-metadata.html.twig_f0tQnCgS3ofoZIBJK7hTa51tR/shFL728I3D-HEAqfQJQye0CoBXMRhwxc1rTzTwukfDo.php
/* themes/custom/srishtytheme/templates/misc/rdf-metadata.html.twig */
class __TwigTemplate_254914d2b6fdcbf9ea110fa715c7bb66ede3543f62b848886d9227250e9df69b extends \Twig\Template
=======
/* themes/custom/indegene/templates/misc/rdf-metadata.html.twig */
class __TwigTemplate_567323cc1dc543320b5e87098d140ee52e274445f7ef577aca118432a2a0fe6d extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_rdf-metadata.html.twig_1WCsa6kMNKr8RabQMLSrsVHjs/x6fGTKOmIF1BLOWg2kD-YiEiyT7-40PpI0gRFltP_cQ.php
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 18];
        $filters = ["escape" => 19];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
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
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["metadata"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
            // line 19
            echo "  <span";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["attributes"], "addClass", [0 => "rdf-meta", 1 => "hidden"], "method")), "html", null, true);
            echo "></span>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_rdf-metadata.html.twig_f0tQnCgS3ofoZIBJK7hTa51tR/shFL728I3D-HEAqfQJQye0CoBXMRhwxc1rTzTwukfDo.php
        return "themes/custom/srishtytheme/templates/misc/rdf-metadata.html.twig";
=======
        return "themes/custom/indegene/templates/misc/rdf-metadata.html.twig";
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_rdf-metadata.html.twig_1WCsa6kMNKr8RabQMLSrsVHjs/x6fGTKOmIF1BLOWg2kD-YiEiyT7-40PpI0gRFltP_cQ.php
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 19,  55 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_rdf-metadata.html.twig_f0tQnCgS3ofoZIBJK7hTa51tR/shFL728I3D-HEAqfQJQye0CoBXMRhwxc1rTzTwukfDo.php
        return new Source("", "themes/custom/srishtytheme/templates/misc/rdf-metadata.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\misc\\rdf-metadata.html.twig");
=======
        return new Source("", "themes/custom/indegene/templates/misc/rdf-metadata.html.twig", "/var/www/html/web/themes/custom/indegene/templates/misc/rdf-metadata.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_rdf-metadata.html.twig_1WCsa6kMNKr8RabQMLSrsVHjs/x6fGTKOmIF1BLOWg2kD-YiEiyT7-40PpI0gRFltP_cQ.php
    }
}
