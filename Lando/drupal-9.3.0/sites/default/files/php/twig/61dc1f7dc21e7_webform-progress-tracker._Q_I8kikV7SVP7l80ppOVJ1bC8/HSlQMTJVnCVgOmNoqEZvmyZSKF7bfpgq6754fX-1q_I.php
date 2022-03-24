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

/* modules/webform/templates/webform-progress-tracker.html.twig */
class __TwigTemplate_7acc9430bc3c10ce3f5cebf69d476e341b27e2205714ab2729e1c1384629f2a7 extends \Twig\Template
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("webform/webform.progress.tracker"), "html", null, true);
        echo "

<ul class=\"webform-progress-tracker progress-tracker progress-tracker--center\" data-webform-progress-steps>
  ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["progress"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["page"]) {
            // line 24
            echo "    ";
            $context["is_completed"] = ($context["index"] < ($context["current_index"] ?? null));
            // line 25
            echo "    ";
            $context["is_active"] = ($context["index"] == ($context["current_index"] ?? null));
            // line 26
            echo "    ";
            // line 27
            $context["classes"] = [0 => "progress-step", 1 => ((            // line 29
($context["is_completed"] ?? null)) ? ("is-complete") : ("")), 2 => ((            // line 30
($context["is_active"] ?? null)) ? ("is-active") : (""))];
            // line 33
            echo "    ";
            // line 34
            $context["attributes"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "setAttribute", [0 => ("data-webform-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,             // line 35
$context["page"], "type", [], "any", false, false, true, 35), 35, $this->source)), 1 => twig_get_attribute($this->env, $this->source, $context["page"], "name", [], "any", false, false, true, 35)], "method", false, false, true, 34), "setAttribute", [0 => "title", 1 => twig_get_attribute($this->env, $this->source,             // line 36
$context["page"], "title", [], "any", false, false, true, 36)], "method", false, false, true, 35), "setAttribute", [0 => "class", 1 => ""], "method", false, false, true, 36), "addClass", [0 =>             // line 38
($context["classes"] ?? null)], "method", false, false, true, 37);
            // line 40
            echo "    <li";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 40, $this->source), "html", null, true);
            echo ">
      <div class=\"progress-marker\" data-webform-progress-step data-webform-progress-link data-text=\"";
            // line 41
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["index"] + 1), "html", null, true);
            echo "\"></div>
      ";
            // line 42
            if ((twig_length_filter($this->env, ($context["progress"] ?? null)) < ($context["max_pages"] ?? null))) {
                // line 43
                echo "        <div class=\"progress-text\">
          <div class=\"progress-title\" data-webform-progress-link>
            <span class=\"visually-hidden\" data-webform-progress-state>";
                // line 45
                if ((($context["is_active"] ?? null) || ($context["is_completed"] ?? null))) {
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["is_active"] ?? null)) ? (t("Current")) : (t("Completed"))));
                }
                echo "</span>
            ";
                // line 46
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["page"], "title", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
                echo "
          </div>
        </div>
      ";
            }
            // line 50
            echo "    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-progress-tracker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 52,  96 => 50,  89 => 46,  83 => 45,  79 => 43,  77 => 42,  73 => 41,  68 => 40,  66 => 38,  65 => 36,  64 => 35,  63 => 34,  61 => 33,  59 => 30,  58 => 29,  57 => 27,  55 => 26,  52 => 25,  49 => 24,  45 => 23,  39 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/webform/templates/webform-progress-tracker.html.twig", "/opt/lampp/htdocs/drupal-9.3.0/modules/webform/templates/webform-progress-tracker.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 23, "set" => 24, "if" => 42);
        static $filters = array("escape" => 20, "length" => 42, "t" => 45);
        static $functions = array("attach_library" => 20, "create_attribute" => 34);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape', 'length', 't'],
                ['attach_library', 'create_attribute']
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
