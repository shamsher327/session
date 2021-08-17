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
/* themes/custom/indegene/templates/layout/html.html.twig */
class __TwigTemplate_996bf642cc55b7235ee45fb8e866bef768f77e2b531e07073021b56676787dd0 extends \Twig\Template
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_html.html.twig_VSxQvKjtBdZJxZB_EsZtbvWTY/nZNrIq4dlOsL76Z9UnndKubpdRZ2pnuowctc8vTnnYY.php
/* themes/custom/srishtytheme/templates/layout/html.html.twig */
class __TwigTemplate_a55367ccb6de4a72fd81d1937adadcdadafaddfb6a6cfeabc55b54e2c2a3ad73 extends \Twig\Template
=======
/* themes/custom/indegene/templates/layout/html.html.twig */
class __TwigTemplate_996bf642cc55b7235ee45fb8e866bef768f77e2b531e07073021b56676787dd0 extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_html.html.twig_FxalAv08NBwwyCor5_MR7RKjL/DaOg8SH8WeeKmJ0QDKm2NGtDHwXqsiMz3ngg6ZZiNmQ.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 27];
        $filters = ["clean_class" => 29, "escape" => 35, "safe_join" => 38, "t" => 48];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_class', 'escape', 'safe_join', 't'],
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
        // line 27
        $context["body_classes"] = [0 => ((        // line 28
($context["logged_in"] ?? null)) ? ("user-logged-in") : ("")), 1 => (( !        // line 29
($context["root_path"] ?? null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["root_path"] ?? null)))))), 2 => ((        // line 30
($context["node_type"] ?? null)) ? (("page-node-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["node_type"] ?? null))))) : ("")), 3 => ((        // line 31
($context["db_offline"] ?? null)) ? ("db-offline") : (""))];
        // line 34
        echo "<!DOCTYPE html>
<html";
        // line 35
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null)), "html", null, true);
        echo ">
  <head>
    <head-placeholder token=\"";
        // line 37
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)), "html", null, true);
        echo "\">
    <title>";
        // line 38
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null)), " | "));
        echo "</title>
    <css-placeholder token=\"";
        // line 39
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)), "html", null, true);
        echo "\">
    <js-placeholder token=\"";
        // line 40
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)), "html", null, true);
        echo "\">
  </head>
  <body";
        // line 42
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["body_classes"] ?? null)], "method")), "html", null, true);
        echo ">
    ";
        // line 47
        echo "    <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      ";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Skip to main content"));
        echo "
    </a>
    ";
        // line 50
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null)), "html", null, true);
        echo "
    ";
        // line 51
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null)), "html", null, true);
        echo "
    ";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null)), "html", null, true);
        echo "
    <js-bottom-placeholder token=\"";
        // line 53
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)), "html", null, true);
        echo "\">
  </body>
</html>
";
    }

    public function getTemplateName()
    {
<<<<<<< HEAD
        return "themes/custom/indegene/templates/layout/html.html.twig";
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_html.html.twig_VSxQvKjtBdZJxZB_EsZtbvWTY/nZNrIq4dlOsL76Z9UnndKubpdRZ2pnuowctc8vTnnYY.php
        return "themes/custom/srishtytheme/templates/layout/html.html.twig";
=======
        return "themes/custom/indegene/templates/layout/html.html.twig";
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_html.html.twig_FxalAv08NBwwyCor5_MR7RKjL/DaOg8SH8WeeKmJ0QDKm2NGtDHwXqsiMz3ngg6ZZiNmQ.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 53,  106 => 52,  102 => 51,  98 => 50,  93 => 48,  90 => 47,  86 => 42,  81 => 40,  77 => 39,  73 => 38,  69 => 37,  64 => 35,  61 => 34,  59 => 31,  58 => 30,  57 => 29,  56 => 28,  55 => 27,);
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
        return new Source("", "themes/custom/indegene/templates/layout/html.html.twig", "/var/www/html/web/themes/custom/indegene/templates/layout/html.html.twig");
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_html.html.twig_VSxQvKjtBdZJxZB_EsZtbvWTY/nZNrIq4dlOsL76Z9UnndKubpdRZ2pnuowctc8vTnnYY.php
        return new Source("", "themes/custom/srishtytheme/templates/layout/html.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\layout\\html.html.twig");
=======
        return new Source("", "themes/custom/indegene/templates/layout/html.html.twig", "/var/www/html/web/themes/custom/indegene/templates/layout/html.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_html.html.twig_FxalAv08NBwwyCor5_MR7RKjL/DaOg8SH8WeeKmJ0QDKm2NGtDHwXqsiMz3ngg6ZZiNmQ.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }
}
