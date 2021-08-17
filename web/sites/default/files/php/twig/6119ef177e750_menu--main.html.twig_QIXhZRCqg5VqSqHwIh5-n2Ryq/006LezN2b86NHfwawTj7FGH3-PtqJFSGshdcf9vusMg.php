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

/* themes/contrib/bootstrap4/templates/navigation/menu--main.html.twig */
class __TwigTemplate_d7198257f952c37becee8837574a83f93ec9603a6e341d49cca4dbf29979dad2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["import" => 21, "macro" => 29, "if" => 31, "for" => 37, "set" => 47];
        $filters = ["escape" => 33, "t" => 66];
        $functions = ["link" => 66];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                ['escape', 't'],
                ['link']
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
        // line 21
        $context["menus"] = $this;
        // line 22
        echo "
";
        // line 27
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getbuild_menu(($context["items"] ?? null), ($context["attributes"] ?? null), 0));
        echo "

";
        // line 43
        echo "
";
    }

    // line 29
    public function getbuild_menu($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 30
            echo "  ";
            $context["menus"] = $this;
            // line 31
            echo "  ";
            if (($context["items"] ?? null)) {
                // line 32
                echo "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 33
                    echo "    <ul";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "navbar-nav mr-auto"], "method")), "html", null, true);
                    echo ">
    ";
                } else {
                    // line 35
                    echo "    <ul class=\"dropdown-menu\">
    ";
                }
                // line 37
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 38
                    echo "      ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getadd_link($context["item"], ($context["attributes"] ?? null), ($context["menu_level"] ?? null)));
                    echo "
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 40
                echo "    </ul>
  ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 44
    public function getadd_link($__item__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 45
            echo "  ";
            $context["menus"] = $this;
            // line 46
            echo "  ";
            // line 47
            $context["list_item_classes"] = [0 => "nav-item", 1 => (($this->getAttribute(            // line 49
($context["item"] ?? null), "is_expanded", [])) ? ("dropdown") : (""))];
            // line 52
            echo "  ";
            // line 53
            $context["link_class"] = [0 => "nav-item", 1 => "nav-link", 2 => (($this->getAttribute(            // line 56
($context["item"] ?? null), "in_active_trail", [])) ? ("active") : ("")), 3 => ((((            // line 57
($context["menu_level"] ?? null) == 0) && ($this->getAttribute(($context["item"] ?? null), "is_expanded", []) || $this->getAttribute(($context["item"] ?? null), "is_collapsed", [])))) ? ("dropdown-toggle") : (""))];
            // line 60
            echo "  ";
            // line 61
            $context["toggle_class"] = [];
            // line 64
            echo "  <li";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["item"] ?? null), "attributes", []), "addClass", [0 => ($context["list_item_classes"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 65
            if (((($context["menu_level"] ?? null) == 0) && $this->getAttribute(($context["item"] ?? null), "below", []))) {
                // line 66
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getLink($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "title", [])), $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "url", [])), ["class" => ($context["link_class"] ?? null), "data-toggle" => "dropdown", "title" => ((t("Expand menu") . " ") . $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "title", [])))]), "html", null, true);
                echo "
      ";
                // line 67
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getbuild_menu($this->getAttribute(($context["item"] ?? null), "below", []), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)));
                echo "
    ";
            } else {
                // line 69
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getLink($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "title", [])), $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["item"] ?? null), "url", [])), ["class" => ($context["link_class"] ?? null)]), "html", null, true);
                echo "
    ";
            }
            // line 71
            echo "  </li>
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap4/templates/navigation/menu--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 71,  183 => 69,  178 => 67,  173 => 66,  171 => 65,  166 => 64,  164 => 61,  162 => 60,  160 => 57,  159 => 56,  158 => 53,  156 => 52,  154 => 49,  153 => 47,  151 => 46,  148 => 45,  134 => 44,  117 => 40,  108 => 38,  103 => 37,  99 => 35,  93 => 33,  90 => 32,  87 => 31,  84 => 30,  70 => 29,  65 => 43,  60 => 27,  57 => 22,  55 => 21,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/bootstrap4/templates/navigation/menu--main.html.twig", "C:\\xampp\\htdocs\\session\\web\\themes\\contrib\\bootstrap4\\templates\\navigation\\menu--main.html.twig");
    }
}
