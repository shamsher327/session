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

/* themes/custom/indegenetheme/templates/block/block--system-menu-block.html.twig */
class __TwigTemplate_53534d0c665f014557afbdcecdf9a59d56c54abcc6e796745c4805ac1c311276 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 42, "block" => 59];
        $filters = ["clean_class" => 44, "clean_id" => 47, "escape" => 60];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
                ['clean_class', 'clean_id', 'escape'],
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
        // line 42
        $context["classes"] = [0 => ("menu--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 44
($context["derivative_plugin_id"] ?? null))))];
        // line 47
        $context["heading_id"] = ($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "id", [])) . \Drupal\Component\Utility\Html::getId("-menu"));
        // line 48
        echo "<ul class=\"clearlist\">
  ";
        // line 50
        echo "    ";
        // line 51
        echo "    ";
        // line 57
        echo "
    ";
        // line 59
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 62
        echo "  ";
        // line 63
        echo "</ul>




";
    }

    // line 59
    public function block_content($context, array $blocks = [])
    {
        // line 60
        echo "      ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/indegenetheme/templates/block/block--system-menu-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 60,  85 => 59,  76 => 63,  74 => 62,  71 => 59,  68 => 57,  66 => 51,  64 => 50,  61 => 48,  59 => 47,  57 => 44,  56 => 42,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/indegenetheme/templates/block/block--system-menu-block.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\indegenetheme\\templates\\block\\block--system-menu-block.html.twig");
    }
}
