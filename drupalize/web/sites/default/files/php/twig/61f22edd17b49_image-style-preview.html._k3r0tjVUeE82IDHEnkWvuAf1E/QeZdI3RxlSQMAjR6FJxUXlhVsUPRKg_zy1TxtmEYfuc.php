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

/* core/modules/image/templates/image-style-preview.html.twig */
class __TwigTemplate_8bd85560cb6d5f5bea73fb93b570f4d9e28db51b78eca09cb39b29305cb8bea0 extends \Twig\Template
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
        // line 33
        echo "<div class=\"image-style-preview preview clearfix\">
  ";
        // line 35
        echo "  <div class=\"preview-image-wrapper\">
      ";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("original"));
        echo " (<a href=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["original"] ?? null), "url", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("view actual size"));
        echo "</a>)
      <div class=\"preview-image original-image\" style=\"width: ";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "original", [], "any", false, false, true, 37), "width", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
        echo "px; height: ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "original", [], "any", false, false, true, 37), "height", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
        echo "px;\">
        <a href=\"";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["original"] ?? null), "url", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
        echo "\">
          ";
        // line 39
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["original"] ?? null), "rendered", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
        echo "
        </a>
      <div class=\"height\" style=\"height: ";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "original", [], "any", false, false, true, 41), "height", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
        echo "px\"><span>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["original"] ?? null), "height", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
        echo "px</span></div>
      <div class=\"width\" style=\"width: ";
        // line 42
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "original", [], "any", false, false, true, 42), "width", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
        echo "px\"><span>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["original"] ?? null), "width", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
        echo "px</span></div>
    </div>
  </div>

  ";
        // line 47
        echo "  <div class=\"preview-image-wrapper\">
    ";
        // line 48
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["style_name"] ?? null), 48, $this->source), "html", null, true);
        echo " (<a href=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["derivative"] ?? null), "url", [], "any", false, false, true, 48), 48, $this->source), "html", null, true);
        echo "?";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cache_bypass"] ?? null), 48, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("view actual size"));
        echo "</a>)
    <div class=\"preview-image modified-image\" style=\"width: ";
        // line 49
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "derivative", [], "any", false, false, true, 49), "width", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
        echo "px; height: ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "derivative", [], "any", false, false, true, 49), "height", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
        echo "px;\">
      <a href=\"";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["derivative"] ?? null), "url", [], "any", false, false, true, 50), 50, $this->source), "html", null, true);
        echo "?";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cache_bypass"] ?? null), 50, $this->source), "html", null, true);
        echo "\">
        ";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["derivative"] ?? null), "rendered", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
        echo "
      </a>
      <div class=\"height\" style=\"height: ";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "derivative", [], "any", false, false, true, 53), "height", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo "px\"><span>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["derivative"] ?? null), "height", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo "px</span></div>
      <div class=\"width\" style=\"width: ";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["preview"] ?? null), "derivative", [], "any", false, false, true, 54), "width", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
        echo "px\"><span>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["derivative"] ?? null), "width", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
        echo "px</span></div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/image/templates/image-style-preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 54,  113 => 53,  108 => 51,  102 => 50,  96 => 49,  86 => 48,  83 => 47,  74 => 42,  68 => 41,  63 => 39,  59 => 38,  53 => 37,  45 => 36,  42 => 35,  39 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/image/templates/image-style-preview.html.twig", "/app/web/core/modules/image/templates/image-style-preview.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("t" => 36, "escape" => 36);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['t', 'escape'],
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
