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

/* modules/contrib/modal_page/templates/modal-page-modal.html.twig */
class __TwigTemplate_7c97d15a110dbb9f2e8db8a6d71f4a1a712d84a059d59b81fb5dbd4a07e4b75b extends \Twig\Template
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
        // line 10
        echo "<div id=\"js-modal-page-show-modal\" class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["modal_class"] ?? null), 10, $this->source), "html", null, true);
        echo "\" data-modal-options=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["modal_options"] ?? null), 10, $this->source), "html", null, true);
        echo "\" data-keyboard=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["close_modal_esc_key"] ?? null), 10, $this->source), "html", null, true);
        echo "\" data-backdrop=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["close_modal_clicking_outside"] ?? null), 10, $this->source), "html", null, true);
        echo "\" aria-modal=\"true\" ";
        (((($context["enable_modal_header"] ?? null) && ($context["display_title"] ?? null))) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ("aria-labelledby=" . ($context["id_label"] ?? null)), "html", null, true))) : (print ("")));
        echo " aria-describedby=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id_desc"] ?? null), 10, $this->source), "html", null, true);
        echo "\" role=\"dialog\" tabindex=\"-1\">
  <div class=\"modal-page-dialog modal-dialog ";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["modal_size"] ?? null), 11, $this->source), "html", null, true);
        echo "\" role=\"document\">
    <div class=\"modal-page-content modal-content\">

      ";
        // line 15
        echo "      ";
        if (($context["enable_modal_header"] ?? null)) {
            // line 16
            echo "
        <div class=\"modal-page-content modal-header ";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["modal_header_classes"] ?? null), 17, $this->source), "html", null, true);
            echo "\">

          ";
            // line 20
            echo "          ";
            if (($context["display_button_x_close"] ?? null)) {
                // line 21
                echo "            <button type=\"button\" class=\"close js-modal-page-ok-button ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["top_right_button_class"] ?? null), 21, $this->source), "html", null, true);
                echo "\" data-dismiss=\"modal\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["top_right_button_label"] ?? null), 21, $this->source));
                echo "</button>
          ";
            }
            // line 23
            echo "
          ";
            // line 25
            echo "          ";
            if (($context["display_title"] ?? null)) {
                // line 26
                echo "            <h4 id=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id_label"] ?? null), 26, $this->source), "html", null, true);
                echo "\" class=\"modal-title modal-page-title\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 26, $this->source));
                echo "</h4>
          ";
            }
            // line 28
            echo "
        </div>

      ";
        }
        // line 32
        echo "
      ";
        // line 34
        echo "      <div id=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id_desc"] ?? null), 34, $this->source), "html", null, true);
        echo "\" class=\"modal-body modal-page-body\">
        ";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 35, $this->source));
        echo "
      </div>

      ";
        // line 39
        echo "      ";
        if (($context["enable_modal_footer"] ?? null)) {
            // line 40
            echo "
        <div class=\"modal-footer modal-page-footer ";
            // line 41
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["modal_footer_classes"] ?? null), 41, $this->source), "html", null, true);
            echo "\">

          ";
            // line 44
            echo "          ";
            if (($context["do_not_show_again"] ?? null)) {
                // line 45
                echo "            <label class =\"modal-dont-show-again-label\"><input type=\"checkbox\" class=\"modal-page-please-do-not-show-again\" value=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 45, $this->source), "html", null, true);
                echo "\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["do_not_show_again"] ?? null), 45, $this->source), "html", null, true);
                echo "</label>
          ";
            }
            // line 47
            echo "
          <div class=\"modal-buttons\">

            ";
            // line 51
            echo "            ";
            if (($context["enable_left_button"] ?? null)) {
                // line 52
                echo "              <button type=\"button\" class=\"btn btn-default js-modal-page-left-button ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left_button_class"] ?? null), 52, $this->source), "html", null, true);
                echo "\" data-dismiss=\"modal\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left_label_button"] ?? null), 52, $this->source), "html", null, true);
                echo "</button>
            ";
            }
            // line 54
            echo "
            ";
            // line 56
            echo "            ";
            if (($context["enable_right_button"] ?? null)) {
                // line 57
                echo "              <button type=\"button\" class=\"btn btn-default js-modal-page-ok-button ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["ok_button_class"] ?? null), 57, $this->source), "html", null, true);
                echo "\" data-dismiss=\"modal\" ";
                if (($context["enable_redirect_link"] ?? null)) {
                    echo " data-redirect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["redirect_link"] ?? null), 57, $this->source), "html", null, true);
                    echo "\" ";
                }
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button"] ?? null), 57, $this->source), "html", null, true);
                echo "</button>
            ";
            }
            // line 59
            echo "
          </div>

          ";
            // line 63
            echo "          <input type=\"hidden\" id=\"delay_display\" name=\"delay_display\" value=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["delay_display"] ?? null), 63, $this->source));
            echo "\" />

        </div>

      ";
        }
        // line 68
        echo "
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/modal_page/templates/modal-page-modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 68,  179 => 63,  174 => 59,  160 => 57,  157 => 56,  154 => 54,  146 => 52,  143 => 51,  138 => 47,  130 => 45,  127 => 44,  122 => 41,  119 => 40,  116 => 39,  110 => 35,  105 => 34,  102 => 32,  96 => 28,  88 => 26,  85 => 25,  82 => 23,  74 => 21,  71 => 20,  66 => 17,  63 => 16,  60 => 15,  54 => 11,  39 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/modal_page/templates/modal-page-modal.html.twig", "/opt/lampp/htdocs/drupal-9.3.6/modules/contrib/modal_page/templates/modal-page-modal.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 15);
        static $filters = array("escape" => 10, "raw" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'raw'],
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
