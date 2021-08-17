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

<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_username.html.twig_MR-MW7TekfPzGfS80zMKpbsGW/MMsS4rGpcqUejrUpc-kKGgzHofbffp6cXaiMPi4WbRY.php
/* themes/custom/srishtytheme/templates/user/username.html.twig */
class __TwigTemplate_596285d8641460fbce83d8070169e39a32e0d8c26707ded88ed12fb6182dc671 extends \Twig\Template
=======
/* themes/custom/indegene/templates/user/username.html.twig */
class __TwigTemplate_1e3d80d184842dac17ecc0f4ae5f1de95a91324a965e6e95e8a8e209e04b3dce extends \Twig\Template
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_username.html.twig_I4aGHxh8pkB-xRqlSLvA9Zhf5/ihykwNqlaLH4KZsClD37L0Qx5-6MiwmtQn_yyrnjZhE.php
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 25];
        $filters = ["escape" => 26];
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
        // line 25
        if (($context["link_path"] ?? null)) {
            // line 26
            echo "<a";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "username"], "method")), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null)), "html", null, true);
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["extra"] ?? null)), "html", null, true);
            echo "</a>";
        } else {
            // line 28
            echo "<span";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null)), "html", null, true);
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["extra"] ?? null)), "html", null, true);
            echo "</span>";
        }
    }

    public function getTemplateName()
    {
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_username.html.twig_MR-MW7TekfPzGfS80zMKpbsGW/MMsS4rGpcqUejrUpc-kKGgzHofbffp6cXaiMPi4WbRY.php
        return "themes/custom/srishtytheme/templates/user/username.html.twig";
=======
        return "themes/custom/indegene/templates/user/username.html.twig";
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_username.html.twig_I4aGHxh8pkB-xRqlSLvA9Zhf5/ihykwNqlaLH4KZsClD37L0Qx5-6MiwmtQn_yyrnjZhE.php
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 28,  57 => 26,  55 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
<<<<<<< HEAD:web/sites/default/files/php/twig/611b27d1417cf_username.html.twig_MR-MW7TekfPzGfS80zMKpbsGW/MMsS4rGpcqUejrUpc-kKGgzHofbffp6cXaiMPi4WbRY.php
        return new Source("", "themes/custom/srishtytheme/templates/user/username.html.twig", "C:\\xampp\\htdocs\\drupal_training\\session\\web\\themes\\custom\\srishtytheme\\templates\\user\\username.html.twig");
=======
        return new Source("", "themes/custom/indegene/templates/user/username.html.twig", "/var/www/html/web/themes/custom/indegene/templates/user/username.html.twig");
>>>>>>> main:web/sites/default/files/php/twig/6119f7f7af469_username.html.twig_I4aGHxh8pkB-xRqlSLvA9Zhf5/ihykwNqlaLH4KZsClD37L0Qx5-6MiwmtQn_yyrnjZhE.php
    }
}
