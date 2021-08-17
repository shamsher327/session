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

/* core/themes/stable/templates/views/views-view-table.html.twig */
class __TwigTemplate_b2d32bf6406ccddaf653e44bd50c3012e9f684a638264a352d2eb8575e5e103f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 35, "if" => 42, "for" => 57];
        $filters = ["length" => 36, "escape" => 41, "merge" => 98];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['length', 'escape', 'merge'],
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
        // line 35
        $context["classes"] = [0 => ("cols-" . twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(        // line 36
($context["header"] ?? null)))), 1 => ((        // line 37
($context["responsive"] ?? null)) ? ("responsive-enabled") : ("")), 2 => ((        // line 38
($context["sticky"] ?? null)) ? ("sticky-enabled") : (""))];
        // line 41
        echo "<table";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
  ";
        // line 42
        if (($context["caption_needed"] ?? null)) {
            // line 43
            echo "    <caption>
    ";
            // line 44
            if (($context["caption"] ?? null)) {
                // line 45
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null)), "html", null, true);
                echo "
    ";
            } else {
                // line 47
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 49
            echo "    ";
            if ( !twig_test_empty(($context["summary_element"] ?? null))) {
                // line 50
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary_element"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 52
            echo "    </caption>
  ";
        }
        // line 54
        echo "  ";
        if (($context["header"] ?? null)) {
            // line 55
            echo "    <thead>
      <tr>
        ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 58
                echo "          ";
                if ($this->getAttribute($context["column"], "default_classes", [])) {
                    // line 59
                    echo "            ";
                    // line 60
                    $context["column_classes"] = [0 => "views-field", 1 => ("views-field-" . $this->sandbox->ensureToStringAllowed($this->getAttribute(                    // line 62
($context["fields"] ?? null), $context["key"], [], "array")))];
                    // line 65
                    echo "          ";
                }
                // line 66
                echo "          <th";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["column"], "attributes", []), "addClass", [0 => ($context["column_classes"] ?? null)], "method"), "setAttribute", [0 => "scope", 1 => "col"], "method")), "html", null, true);
                echo ">";
                // line 67
                if ($this->getAttribute($context["column"], "wrapper_element", [])) {
                    // line 68
                    echo "<";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">";
                    // line 69
                    if ($this->getAttribute($context["column"], "url", [])) {
                        // line 70
                        echo "<a href=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "url", [])), "html", null, true);
                        echo "\" title=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "title", [])), "html", null, true);
                        echo "\" rel=\"nofollow\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 72
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                    }
                    // line 74
                    echo "</";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">";
                } else {
                    // line 76
                    if ($this->getAttribute($context["column"], "url", [])) {
                        // line 77
                        echo "<a href=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "url", [])), "html", null, true);
                        echo "\" title=\"";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "title", [])), "html", null, true);
                        echo "\" rel=\"nofollow\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 79
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "content", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "sort_indicator", [])), "html", null, true);
                    }
                }
                // line 82
                echo "</th>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "      </tr>
    </thead>
  ";
        }
        // line 87
        echo "  <tbody>
    ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 89
            echo "      <tr";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["row"], "attributes", [])), "html", null, true);
            echo ">
        ";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "columns", []));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 91
                echo "          ";
                if ($this->getAttribute($context["column"], "default_classes", [])) {
                    // line 92
                    echo "            ";
                    // line 93
                    $context["column_classes"] = [0 => "views-field"];
                    // line 97
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "fields", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 98
                        echo "              ";
                        $context["column_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["column_classes"] ?? null)), [0 => ("views-field-" . $this->sandbox->ensureToStringAllowed($context["field"]))]);
                        // line 99
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 100
                    echo "          ";
                }
                // line 101
                echo "          <td";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["column"], "attributes", []), "addClass", [0 => ($context["column_classes"] ?? null)], "method")), "html", null, true);
                echo ">";
                // line 102
                if ($this->getAttribute($context["column"], "wrapper_element", [])) {
                    // line 103
                    echo "<";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">
              ";
                    // line 104
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "content", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 105
                        echo "                ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "separator", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "field_output", [])), "html", null, true);
                        echo "
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 107
                    echo "              </";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["column"], "wrapper_element", [])), "html", null, true);
                    echo ">";
                } else {
                    // line 109
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["column"], "content", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 110
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "separator", [])), "html", null, true);
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "field_output", [])), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 113
                echo "          </td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            echo "      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        echo "  </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/views/views-view-table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 117,  268 => 115,  261 => 113,  253 => 110,  249 => 109,  244 => 107,  234 => 105,  230 => 104,  225 => 103,  223 => 102,  219 => 101,  216 => 100,  210 => 99,  207 => 98,  202 => 97,  200 => 93,  198 => 92,  195 => 91,  191 => 90,  186 => 89,  182 => 88,  179 => 87,  174 => 84,  167 => 82,  162 => 79,  152 => 77,  150 => 76,  145 => 74,  141 => 72,  131 => 70,  129 => 69,  125 => 68,  123 => 67,  119 => 66,  116 => 65,  114 => 62,  113 => 60,  111 => 59,  108 => 58,  104 => 57,  100 => 55,  97 => 54,  93 => 52,  87 => 50,  84 => 49,  78 => 47,  72 => 45,  70 => 44,  67 => 43,  65 => 42,  60 => 41,  58 => 38,  57 => 37,  56 => 36,  55 => 35,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/stable/templates/views/views-view-table.html.twig", "C:\\xampp\\htdocs\\session\\web\\core\\themes\\stable\\templates\\views\\views-view-table.html.twig");
    }
}
