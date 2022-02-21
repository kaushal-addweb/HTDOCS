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

/* core/modules/image/templates/image-scale-and-crop-summary.html.twig */
class __TwigTemplate_50b1625f57cc8896bb2397fd93a2f1f044b7fd2d6b4b12671a21a63d195e726b extends \Twig\Template
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
        // line 20
        if ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "width", [], "any", false, false, true, 20) && twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "height", [], "any", false, false, true, 20))) {
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "width", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo "×";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "height", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
        } else {
            // line 23
            if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "width", [], "any", false, false, true, 23)) {
                // line 24
                echo "    ";
                echo t("width @data.width", array("@data.width" => twig_get_attribute($this->env, $this->source,                 // line 25
($context["data"] ?? null), "width", [], "any", false, false, true, 25), ));
                // line 27
                echo "  ";
            } elseif (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "height", [], "any", false, false, true, 27)) {
                // line 28
                echo "    ";
                echo t("height @data.height", array("@data.height" => twig_get_attribute($this->env, $this->source,                 // line 29
($context["data"] ?? null), "height", [], "any", false, false, true, 29), ));
                // line 31
                echo "  ";
            }
        }
    }

    public function getTemplateName()
    {
        return "core/modules/image/templates/image-scale-and-crop-summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 31,  57 => 29,  55 => 28,  52 => 27,  50 => 25,  48 => 24,  46 => 23,  41 => 21,  39 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/modules/image/templates/image-scale-and-crop-summary.html.twig", "/app/web/core/modules/image/templates/image-scale-and-crop-summary.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 20, "trans" => 24);
        static $filters = array("escape" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
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
