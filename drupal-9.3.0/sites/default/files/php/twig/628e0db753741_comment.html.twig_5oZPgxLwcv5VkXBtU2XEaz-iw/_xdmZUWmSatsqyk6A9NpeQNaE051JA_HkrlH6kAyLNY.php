<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/bartik/templates/comment.html.twig */
class __TwigTemplate_dbdeefeaeff3ff6f21a5fe79236cfb56859250ac37d41867aa6e6f314d6137c3 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        $context["classes"] = [0 => "comment", 1 => "js-comment", 2 => (((        // line 71
($context["status"] ?? null) != "published")) ? (("comment--" . $this->sandbox->ensureToStringAllowed(($context["status"] ?? null), 71, $this->source))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 72
($context["comment"] ?? null), "owner", [], "any", false, false, true, 72), "anonymous", [], "any", false, false, true, 72)) ? ("by-anonymous") : ("")), 4 => (((        // line 73
($context["author_id"] ?? null) && (($context["author_id"] ?? null) == twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getOwnerId", [], "method", false, false, true, 73)))) ? ((("by-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getEntityTypeId", [], "method", false, false, true, 73), 73, $this->source)) . "-author")) : ("")), 5 => "clearfix"];
        // line 77
        echo "<article role=\"article\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 77), 77, $this->source), "role"), "html", null, true);
        echo ">
  ";
        // line 83
        echo "  <span class=\"hidden\" data-comment-timestamp=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["new_indicator_timestamp"] ?? null), 83, $this->source), "html", null, true);
        echo "\"></span>

  <footer class=\"comment__meta\">
    ";
        // line 86
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 86, $this->source), "html", null, true);
        echo "
    <p class=\"comment__author\">";
        // line 87
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author"] ?? null), 87, $this->source), "html", null, true);
        echo "</p>
    <p class=\"comment__time\">";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["created"] ?? null), 88, $this->source), "html", null, true);
        echo "</p>
    <p class=\"comment__permalink\">";
        // line 89
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["permalink"] ?? null), 89, $this->source), "html", null, true);
        echo "</p>
    ";
        // line 95
        echo "    ";
        if (($context["parent"] ?? null)) {
            // line 96
            echo "      <p class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["parent"] ?? null), 96, $this->source), "html", null, true);
            echo "</p>
    ";
        }
        // line 98
        echo "  </footer>

  <div";
        // line 100
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "comment__content"], "method", false, false, true, 100), 100, $this->source), "html", null, true);
        echo ">
    ";
        // line 101
        if (($context["title"] ?? null)) {
            // line 102
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 102, $this->source), "html", null, true);
            echo "
      <h3";
            // line 103
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 103, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 103, $this->source), "html", null, true);
            echo "</h3>
      ";
            // line 104
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 104, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 106
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 106, $this->source), "html", null, true);
        echo "
  </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 106,  102 => 104,  96 => 103,  91 => 102,  89 => 101,  85 => 100,  81 => 98,  75 => 96,  72 => 95,  68 => 89,  64 => 88,  60 => 87,  56 => 86,  49 => 83,  44 => 77,  42 => 73,  41 => 72,  40 => 71,  39 => 68,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/bartik/templates/comment.html.twig", "/opt/lampp/htdocs/drupal-9.3.0/core/themes/bartik/templates/comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 68, "if" => 95);
        static $filters = array("escape" => 77, "without" => 77);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'without'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

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
}
