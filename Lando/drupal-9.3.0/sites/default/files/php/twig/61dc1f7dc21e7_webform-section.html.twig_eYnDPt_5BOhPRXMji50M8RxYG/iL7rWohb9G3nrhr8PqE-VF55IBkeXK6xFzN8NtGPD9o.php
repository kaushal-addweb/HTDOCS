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

/* modules/webform/templates/webform-section.html.twig */
class __TwigTemplate_78ce57b5424cf7520019096acc169f7aab9aacb6e4725414f6c71822a98497ca extends \Twig\Template
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
        // line 34
        $context["classes"] = [0 => "js-form-item", 1 => "form-item", 2 => "js-form-wrapper", 3 => "form-wrapper", 4 => "webform-section"];
        // line 42
        echo "<section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
        echo ">
  ";
        // line 44
        $context["title_classes"] = [0 => "webform-section-title", 1 => ((        // line 46
($context["required"] ?? null)) ? ("js-form-required") : ("")), 2 => ((        // line 47
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 50
        echo "  ";
        if (($context["title"] ?? null)) {
            // line 51
            echo "    <";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_tag"] ?? null), 51, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => ($context["title_classes"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 51, $this->source), "html", null, true);
            echo "</";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_tag"] ?? null), 51, $this->source), "html", null, true);
            echo ">
  ";
        }
        // line 53
        echo "  <div class=\"webform-section-wrapper\">
    ";
        // line 54
        if (($context["errors"] ?? null)) {
            // line 55
            echo "      <div>
        ";
            // line 56
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null), 56, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 59
        echo "    ";
        if ((twig_in_filter(($context["description_display"] ?? null), [0 => "before", 1 => "invisible"]) && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 59))) {
            // line 60
            echo "      <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 60), "addClass", [0 => "description"], "method", false, false, true, 60), 60, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 62
        echo "    ";
        if (($context["prefix"] ?? null)) {
            // line 63
            echo "      <span class=\"field-prefix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null), 63, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 65
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 65, $this->source), "html", null, true);
        echo "
    ";
        // line 66
        if (($context["suffix"] ?? null)) {
            // line 67
            echo "      <span class=\"field-suffix\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null), 67, $this->source), "html", null, true);
            echo "</span>
    ";
        }
        // line 69
        echo "    ";
        if (((($context["description_display"] ?? null) == "after") && twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 69))) {
            // line 70
            echo "      <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 70), "addClass", [0 => "description"], "method", false, false, true, 70), 70, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 72
        echo "  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 72,  114 => 70,  111 => 69,  105 => 67,  103 => 66,  98 => 65,  92 => 63,  89 => 62,  81 => 60,  78 => 59,  72 => 56,  69 => 55,  67 => 54,  64 => 53,  53 => 51,  50 => 50,  48 => 47,  47 => 46,  46 => 44,  41 => 42,  39 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/webform/templates/webform-section.html.twig", "/opt/lampp/htdocs/drupal-9.3.0/modules/webform/templates/webform-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 34, "if" => 50);
        static $filters = array("escape" => 42);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
