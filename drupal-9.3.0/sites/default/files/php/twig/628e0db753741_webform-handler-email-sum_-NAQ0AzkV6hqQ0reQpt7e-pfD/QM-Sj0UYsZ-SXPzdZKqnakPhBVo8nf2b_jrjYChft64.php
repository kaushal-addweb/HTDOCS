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

/* modules/webform/templates/webform-handler-email-summary.html.twig */
class __TwigTemplate_fe11ceec1b22643e305bb0849a09a93acd4b81fbad6f2ac9fb43abacdead1409 extends \Twig\Template
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
        // line 13
        echo "
";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "debug", [], "any", false, false, true, 14)) {
            echo "<strong class=\"color-error\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Debugging is enabled"));
            echo "</strong><br />";
        }
        // line 15
        echo "<b>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("To:"));
        echo "</b> ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "to_mail", [], "any", false, false, true, 15), 15, $this->source), ["," => ", "]), "html", null, true);
        echo "<br />
";
        // line 16
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "cc_mail", [], "any", false, false, true, 16)) {
            echo "<b>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("CC:"));
            echo "</b> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "cc_mail", [], "any", false, false, true, 16), 16, $this->source), ["," => ", "]), "html", null, true);
            echo "<br />";
        }
        // line 17
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "bcc_mail", [], "any", false, false, true, 17)) {
            echo "<b>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("BCC:"));
            echo "</b> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "bcc_mail", [], "any", false, false, true, 17), 17, $this->source), ["," => ", "]), "html", null, true);
            echo "<br />";
        }
        // line 18
        echo "<b>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("From:"));
        echo "</b> ";
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "from_name", [], "any", false, false, true, 18)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "from_name", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
        }
        echo " &lt;";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "from_mail", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
        echo "&gt;<br />
";
        // line 19
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "reply_to", [], "any", false, false, true, 19)) {
            echo "<b>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Reply to:"));
            echo "</b> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "reply_to", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "<br />";
        }
        // line 20
        echo "<b>";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subject:"));
        echo "</b> ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "subject", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
        echo "<br />
<b>";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Settings:"));
        echo "</b> ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "html", [], "any", false, false, true, 21)) ? ("HTML") : (t("Plain text"))));
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "html", [], "any", false, false, true, 21) && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "attachments", [], "any", false, false, true, 21))) ? ("/") : ("")));
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "attachments", [], "any", false, false, true, 21)) ? (t("Attachments")) : ("")));
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "twig", [], "any", false, false, true, 21)) ? (t("(Twig)")) : ("")));
        echo "<br />
<b>";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Sent when:"));
        echo "</b> ";
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "states", [], "any", false, false, true, 22)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "states", [], "any", false, false, true, 22), 22, $this->source), "; "), "html", null, true);
        } else {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Custom"));
        }
        echo "<br />
";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "theme_name", [], "any", false, false, true, 23)) {
            echo "<b>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Theme:"));
            echo "</b> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "theme_name", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "<br />";
        }
    }

    public function getTemplateName()
    {
        return "modules/webform/templates/webform-handler-email-summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 23,  109 => 22,  97 => 21,  90 => 20,  82 => 19,  71 => 18,  63 => 17,  55 => 16,  48 => 15,  42 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/webform/templates/webform-handler-email-summary.html.twig", "/opt/lampp/htdocs/drupal-9.3.0/modules/webform/templates/webform-handler-email-summary.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14);
        static $filters = array("t" => 14, "escape" => 15, "replace" => 15, "join" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape', 'replace', 'join'],
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
