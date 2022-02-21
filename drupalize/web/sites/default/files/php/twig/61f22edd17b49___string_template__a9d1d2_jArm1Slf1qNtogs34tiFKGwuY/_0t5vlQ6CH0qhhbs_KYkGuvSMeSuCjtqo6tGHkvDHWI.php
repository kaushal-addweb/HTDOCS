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

/* __string_template__a9d1d2addc73c5109551ae1c0873aa6c5e80779a095ad2aab416736b01e1a9c7 */
class __TwigTemplate_07b7fac05981bf6ebe1cf4833fc7000915983689cc4b52a25adb872b53375147 extends \Twig\Template
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
        // line 1
        echo "<span class=\"status\">";
        if (($context["status"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Published"));
        } else {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Not published"));
        }
        echo "</span>";
        if (($context["outdated"] ?? null)) {
            echo " <span class=\"marker\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("outdated"));
            echo "</span>";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__a9d1d2addc73c5109551ae1c0873aa6c5e80779a095ad2aab416736b01e1a9c7";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__a9d1d2addc73c5109551ae1c0873aa6c5e80779a095ad2aab416736b01e1a9c7", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1);
        static $filters = array("t" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t'],
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
