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

/* core/modules/system/templates/off-canvas-page-wrapper.html.twig */
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_off-canvas-page-wrapper.h_1m6MbvX6gmg7B0RAylNUszt57/-2sf_3mAfMEM7wzZB1bIAJO_4a3cJTK9J_bauELYlXo.php
class __TwigTemplate_628e7ee1a91efaa8dc653050719c425e4089ae17fb87f4adf1a1eec64fd0e844 extends \Twig\Template
=======
class __TwigTemplate_73e355a98985d12e0deb4d2a9aa724b71e87bfa1b20da0d646cfbf1b9de6af3f extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_off-canvas-page-wrapper.h_NBFK5WoxeM6B1pA0p7071Lywo/J6S2HnmSaK1ya3g1BuwUTa-h0b3pJ0C199QHOko0c-w.php
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 22];
        $filters = ["escape" => 24];
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
        // line 22
        if (($context["children"] ?? null)) {
            // line 23
            echo "  <div class=\"dialog-off-canvas-main-canvas\" data-off-canvas-main-canvas>
    ";
            // line 24
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/modules/system/templates/off-canvas-page-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 24,  57 => 23,  55 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_off-canvas-page-wrapper.h_1m6MbvX6gmg7B0RAylNUszt57/-2sf_3mAfMEM7wzZB1bIAJO_4a3cJTK9J_bauELYlXo.php
        return new Source("", "core/modules/system/templates/off-canvas-page-wrapper.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\core\\modules\\system\\templates\\off-canvas-page-wrapper.html.twig");
=======
        return new Source("", "core/modules/system/templates/off-canvas-page-wrapper.html.twig", "/var/www/html/web/core/modules/system/templates/off-canvas-page-wrapper.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_off-canvas-page-wrapper.h_NBFK5WoxeM6B1pA0p7071Lywo/J6S2HnmSaK1ya3g1BuwUTa-h0b3pJ0C199QHOko0c-w.php
    }
}
