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
/* themes/custom/indegene/templates/field/field--node--created.html.twig */
class __TwigTemplate_e6252b27b5b0d249c393689f404df95a71a0de845de6668b91f3cdae9aa438c5 extends \Twig\Template
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--node--created.html_ubEeHikXwlE57wfyR5i9hSNz1/egZ0NiI0hjbcg0u1De5lVgX_CLAygwXNdLJEJDVBn6U.php
/* themes/custom/srishtytheme/templates/field/field--node--created.html.twig */
class __TwigTemplate_8993cff726f01d96bb230d2b15a9ea8e9cd4fa282ed83a379d2ea3ba1596c37a extends \Twig\Template
=======
/* themes/custom/indegene/templates/field/field--node--created.html.twig */
class __TwigTemplate_e6252b27b5b0d249c393689f404df95a71a0de845de6668b91f3cdae9aa438c5 extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--node--created.html_KtmBaSd7r_-MkvH43yVmZM4AA/izaL8_KXnPy3gDNWuDDIn8RKY6Ie9Nh4Yss0QDUFwpA.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 23, "for" => 31];
        $filters = ["clean_class" => 25, "escape" => 30];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for'],
                ['clean_class', 'escape'],
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
        // line 23
        $context["classes"] = [0 => "field", 1 => ("field--name-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 25
($context["field_name"] ?? null)))), 2 => ("field--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 26
($context["field_type"] ?? null)))), 3 => ("field--label-" . $this->sandbox->ensureToStringAllowed(        // line 27
($context["label_display"] ?? null)))];
        // line 30
        echo "<span";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "content", [])), "html", null, true);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "</span>
";
    }

    public function getTemplateName()
    {
<<<<<<< HEAD
        return "themes/custom/indegene/templates/field/field--node--created.html.twig";
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--node--created.html_ubEeHikXwlE57wfyR5i9hSNz1/egZ0NiI0hjbcg0u1De5lVgX_CLAygwXNdLJEJDVBn6U.php
        return "themes/custom/srishtytheme/templates/field/field--node--created.html.twig";
=======
        return "themes/custom/indegene/templates/field/field--node--created.html.twig";
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--node--created.html_KtmBaSd7r_-MkvH43yVmZM4AA/izaL8_KXnPy3gDNWuDDIn8RKY6Ie9Nh4Yss0QDUFwpA.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 34,  68 => 32,  64 => 31,  60 => 30,  58 => 27,  57 => 26,  56 => 25,  55 => 23,);
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
        return new Source("", "themes/custom/indegene/templates/field/field--node--created.html.twig", "/var/www/html/web/themes/custom/indegene/templates/field/field--node--created.html.twig");
=======
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_field--node--created.html_ubEeHikXwlE57wfyR5i9hSNz1/egZ0NiI0hjbcg0u1De5lVgX_CLAygwXNdLJEJDVBn6U.php
        return new Source("", "themes/custom/srishtytheme/templates/field/field--node--created.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\field\\field--node--created.html.twig");
=======
        return new Source("", "themes/custom/indegene/templates/field/field--node--created.html.twig", "/var/www/html/web/themes/custom/indegene/templates/field/field--node--created.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_field--node--created.html_KtmBaSd7r_-MkvH43yVmZM4AA/izaL8_KXnPy3gDNWuDDIn8RKY6Ie9Nh4Yss0QDUFwpA.php
>>>>>>> 80fb8e5f6453eedb93f9a3d6b75b3f89f586592f
    }
}
