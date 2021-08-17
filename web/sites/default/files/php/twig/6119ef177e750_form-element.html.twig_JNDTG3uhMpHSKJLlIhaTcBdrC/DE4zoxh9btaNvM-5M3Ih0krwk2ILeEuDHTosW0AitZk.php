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

/* themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig */
class __TwigTemplate_2568898c0591fb3c717c3e01cf49d0e782c8dcc277b24e8fad5fc4b38d755f8e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 49, "if" => 52];
        $filters = ["clean_class" => 67, "escape" => 85, "raw" => 96];
        $functions = ["create_attribute" => 49];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'raw'],
                ['create_attribute']
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
        // line 47
        echo "
";
        // line 49
        $context["label_attributes"] = ((($context["label_attributes"] ?? null)) ? (($context["label_attributes"] ?? null)) : ($this->env->getExtension('Drupal\Core\Template\TwigExtension')->createAttribute()));
        // line 51
        echo "
";
        // line 52
        if ((($context["type"] ?? null) == "checkbox")) {
            // line 53
            echo "  ";
            $context["wrapperclass"] = "form-check";
            // line 54
            echo "  ";
            $context["labelclass"] = "form-check-label";
            // line 55
            echo "  ";
            $context["inputclass"] = "form-check-input";
        }
        // line 57
        echo "
";
        // line 58
        if ((($context["type"] ?? null) == "radio")) {
            // line 59
            echo "  ";
            $context["wrapperclass"] = "form-check";
            // line 60
            echo "  ";
            $context["labelclass"] = "form-check-label";
            // line 61
            echo "  ";
            $context["inputclass"] = "form-check-input";
        }
        // line 63
        echo "
";
        // line 65
        $context["classes"] = [0 => "js-form-item", 1 => ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 67
($context["type"] ?? null)))), 2 => ((twig_in_filter(        // line 68
($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null)))) : (("form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null)))))), 3 => ((twig_in_filter(        // line 69
($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) ? (($context["wrapperclass"] ?? null)) : ("")), 4 => ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 70
($context["name"] ?? null)))), 5 => ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 71
($context["name"] ?? null)))), 6 => ((!twig_in_filter(        // line 72
($context["title_display"] ?? null), [0 => "after", 1 => "before"])) ? ("form-no-label") : ("")), 7 => (((        // line 73
($context["disabled"] ?? null) == "disabled")) ? ("disabled") : ("")), 8 => ((        // line 74
($context["errors"] ?? null)) ? ("has-error") : (""))];
        // line 78
        $context["description_classes"] = [0 => "description", 1 => "text-muted", 2 => (((        // line 81
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 84
        if (twig_in_filter(($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) {
            // line 85
            echo "  <div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 86
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 87
                echo "      <span class=\"field-prefix\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null)), "html", null, true);
                echo "</span>
    ";
            }
            // line 89
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 90
                echo "      <div";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "attributes", [])), "html", null, true);
                echo ">
        ";
                // line 91
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 94
            echo "    ";
            if (twig_in_filter(($context["label_display"] ?? null), [0 => "before", 1 => "invisible"])) {
                // line 95
                echo "      <label ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["labelclass"] ?? null)], "method"), "setAttribute", [0 => "for", 1 => $this->getAttribute(($context["input_attributes"] ?? null), "id", [])], "method")), "html", null, true);
                echo ">
        ";
                // line 96
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null)));
                echo "
      </label>
    ";
            }
            // line 99
            echo "    <input";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["input_attributes"] ?? null), "addClass", [0 => ($context["inputclass"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 100
            if ((($context["label_display"] ?? null) == "after")) {
                // line 101
                echo "      <label ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["labelclass"] ?? null)], "method"), "setAttribute", [0 => "for", 1 => $this->getAttribute(($context["input_attributes"] ?? null), "id", [])], "method")), "html", null, true);
                echo ">
        ";
                // line 102
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null)));
                echo "
      </label>
    ";
            }
            // line 105
            echo "    ";
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 106
                echo "      <span class=\"field-suffix\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null)), "html", null, true);
                echo "</span>
    ";
            }
            // line 108
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 109
                echo "      <div class=\"invalid-feedback\">
        ";
                // line 110
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null)), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 113
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 114
                echo "      <small";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", []), "addClass", [0 => ($context["description_classes"] ?? null)], "method")), "html", null, true);
                echo ">
        ";
                // line 115
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 118
            echo "  </div>
";
        } else {
            // line 120
            echo "  <fieldset";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null), 1 => "mb-3"], "method")), "html", null, true);
            echo ">
    ";
            // line 121
            if (twig_in_filter(($context["label_display"] ?? null), [0 => "before", 1 => "invisible"])) {
                // line 122
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 124
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 125
                echo "      <div class=\"input-group\">
    ";
            }
            // line 127
            echo "    ";
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 128
                echo "      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">";
                // line 129
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null)), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 132
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 133
                echo "      <div";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "attributes", [])), "html", null, true);
                echo ">
        ";
                // line 134
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 137
            echo "    ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
            echo "
    ";
            // line 138
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 139
                echo "      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">";
                // line 140
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null)), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 143
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 144
                echo "      </div>
    ";
            }
            // line 146
            echo "    ";
            if ((($context["label_display"] ?? null) == "after")) {
                // line 147
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 149
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 150
                echo "      <div class=\"invalid-feedback\">
        ";
                // line 151
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null)), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 154
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 155
                echo "      <small";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", []), "addClass", [0 => ($context["description_classes"] ?? null)], "method")), "html", null, true);
                echo ">
        ";
                // line 156
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 159
            echo "  </fieldset>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  310 => 159,  304 => 156,  299 => 155,  296 => 154,  290 => 151,  287 => 150,  284 => 149,  278 => 147,  275 => 146,  271 => 144,  268 => 143,  262 => 140,  259 => 139,  257 => 138,  252 => 137,  246 => 134,  241 => 133,  238 => 132,  232 => 129,  229 => 128,  226 => 127,  222 => 125,  219 => 124,  213 => 122,  211 => 121,  206 => 120,  202 => 118,  196 => 115,  191 => 114,  188 => 113,  182 => 110,  179 => 109,  176 => 108,  170 => 106,  167 => 105,  161 => 102,  156 => 101,  154 => 100,  149 => 99,  143 => 96,  138 => 95,  135 => 94,  129 => 91,  124 => 90,  121 => 89,  115 => 87,  113 => 86,  108 => 85,  106 => 84,  104 => 81,  103 => 78,  101 => 74,  100 => 73,  99 => 72,  98 => 71,  97 => 70,  96 => 69,  95 => 68,  94 => 67,  93 => 65,  90 => 63,  86 => 61,  83 => 60,  80 => 59,  78 => 58,  75 => 57,  71 => 55,  68 => 54,  65 => 53,  63 => 52,  60 => 51,  58 => 49,  55 => 47,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig", "C:\\xampp\\htdocs\\session\\web\\themes\\contrib\\bootstrap_barrio\\templates\\form\\form-element.html.twig");
    }
}
