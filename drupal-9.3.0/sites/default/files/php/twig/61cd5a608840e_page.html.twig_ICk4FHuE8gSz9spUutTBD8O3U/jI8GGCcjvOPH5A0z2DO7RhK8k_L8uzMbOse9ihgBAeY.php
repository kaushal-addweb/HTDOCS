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

/* themes/creative_responsive_theme/templates/layout/page.html.twig */
class __TwigTemplate_55ad0ebd518605b7d38cd39f48e3d3fda6fe9bb494d905e492e1fe4fe7acbc64 extends \Twig\Template
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
        // line 60
        echo "

<!-- Header and Navbar -->
<header class=\"main-header\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-sm-4 col-md-3\">
        ";
        // line 67
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 67)) {
            // line 68
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 70
        echo "      </div>

      ";
        // line 72
        if (($context["show_social_icon"] ?? null)) {
            // line 73
            echo "        <div class=\"col-sm-8 col-md-9\">
          <div class=\"social-media\">
            ";
            // line 75
            if (($context["facebook_url"] ?? null)) {
                // line 76
                echo "              <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["facebook_url"] ?? null), 76, $this->source), "html", null, true);
                echo "\"  class=\"facebook\" target=\"_blank\" ><i class=\"fa fa-facebook\"></i></a>
            ";
            }
            // line 78
            echo "            ";
            if (($context["twitter_url"] ?? null)) {
                // line 79
                echo "              <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["twitter_url"] ?? null), 79, $this->source), "html", null, true);
                echo "\" class=\"twitter\" target=\"_blank\" ><i class=\"fa fa-twitter\"></i></a>
            ";
            }
            // line 81
            echo "            ";
            if (($context["linkedin_url"] ?? null)) {
                // line 82
                echo "              <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["linkedin_url"] ?? null), 82, $this->source), "html", null, true);
                echo "\" class=\"linkedin\" target=\"_blank\"><i class=\"fa fa-linkedin\"></i></a>
            ";
            }
            // line 84
            echo "            ";
            if (($context["pinterest_url"] ?? null)) {
                // line 85
                echo "              <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pinterest_url"] ?? null), 85, $this->source), "html", null, true);
                echo "\" class=\"pinterest\" target=\"_blank\" ><i class=\"fa fa-pinterest\"></i></a>
            ";
            }
            // line 87
            echo "            ";
            if (($context["rss_url"] ?? null)) {
                // line 88
                echo "              <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rss_url"] ?? null), 88, $this->source), "html", null, true);
                echo "\" class=\"rss\" target=\"_blank\" ><i class=\"fa fa-rss\"></i></a>
            ";
            }
            // line 90
            echo "          </div>
        </div>
      ";
        }
        // line 93
        echo "    </div>

    <div class=\"row\">
      <div class=\"navbar-header col-md-12\">
        <nav class=\"navbar navbar-default\" role=\"navigation\">
          <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#main-navigation\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button> 

          ";
        // line 105
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 105)) {
            // line 106
            echo "            ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 106), 106, $this->source), "html", null, true);
            echo "
          ";
        }
        // line 108
        echo "        </nav>
      </div>
    </div>
  </div>
</header>
<!--End Header & Navbar -->


<div class=\"container main-menuwrap\">
  
</div>

<!-- Banner -->
  ";
        // line 121
        if ((($context["is_front"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slideshow", [], "any", false, false, true, 121))) {
            echo "  
    <div class=\"container slideshow\">
      <div class=\"row\">
        <div class=\"col-md-12\">
            ";
            // line 125
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slideshow", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
            echo "
        </div>
      </div>
    </div>
  ";
        }
        // line 130
        echo "  <!-- End Banner -->


<!--Highlighted-->
  ";
        // line 134
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 134)) {
            // line 135
            echo "    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-md-12\">
          ";
            // line 138
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 138), 138, $this->source), "html", null, true);
            echo "
        </div>
      </div>
    </div>
  ";
        }
        // line 143
        echo "<!--End Highlighted-->


<!-- Start Top Widget -->
";
        // line 147
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_first", [], "any", false, false, true, 147) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_second", [], "any", false, false, true, 147)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_third", [], "any", false, false, true, 147))) {
            // line 148
            echo "  <div class=\"topwidget\">
    <!-- start: Container -->
    <div class=\"container\">
      
      <div class=\"row\">
        <!-- Top widget first region -->
        <div class = ";
            // line 154
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["topwidget_class"] ?? null), 154, $this->source), "html", null, true);
            echo ">
          ";
            // line 155
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_first", [], "any", false, false, true, 155)) {
                // line 156
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_first", [], "any", false, false, true, 156), 156, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 158
            echo "        </div>
        <!-- End top widget third region -->
        <!-- Top widget second region -->
        <div class = ";
            // line 161
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["topwidget_class"] ?? null), 161, $this->source), "html", null, true);
            echo ">
          ";
            // line 162
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_second", [], "any", false, false, true, 162)) {
                // line 163
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_second", [], "any", false, false, true, 163), 163, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 165
            echo "        </div>
        <!-- End top widget third region -->
        <!-- Top widget third region -->
        <div class = ";
            // line 168
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["topwidget_third_class"] ?? null), 168, $this->source), "html", null, true);
            echo ">
          ";
            // line 169
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_third", [], "any", false, false, true, 169)) {
                // line 170
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "topwidget_third", [], "any", false, false, true, 170), 170, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 172
            echo "        </div>
        <!-- End top widget third region -->
      </div>
    </div>
  </div>
";
        }
        // line 178
        echo "<!--End Top Widget -->


<!-- Page Title -->
";
        // line 182
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_title", [], "any", false, false, true, 182) &&  !($context["is_front"] ?? null))) {
            // line 183
            echo "  <div id=\"page-title\">
    <div id=\"page-title-inner\">
      <!-- start: Container -->
      <div class=\"container\">
        ";
            // line 187
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_title", [], "any", false, false, true, 187), 187, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  </div>
";
        }
        // line 192
        echo "<!-- End Page Title ---- >


<!-- layout -->
<div id=\"wrapper\">
  <!-- start: Container -->
  <div class=\"container\">
    
    <!--Content top-->
      ";
        // line 201
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 201)) {
            // line 202
            echo "        <div class=\"row\">
          ";
            // line 203
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 203), 203, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 206
        echo "    <!--End Content top-->
    
    <!--start:content -->
    <div class=\"row\">
      <div class=\"col-md-12\">";
        // line 210
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 210), 210, $this->source), "html", null, true);
        echo "</div>
    </div>

    <div class=\"row layout\">
      <!--- Start Left SideBar -->
      ";
        // line 215
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 215)) {
            // line 216
            echo "        <div class=\"sidebar\" >
          <div class = ";
            // line 217
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarfirst"] ?? null), 217, $this->source), "html", null, true);
            echo " >
            ";
            // line 218
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 218), 218, $this->source), "html", null, true);
            echo "
          </div>
        </div>
      ";
        }
        // line 222
        echo "      <!---End Right SideBar -->

      <!--- Start content -->
      ";
        // line 225
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 225)) {
            // line 226
            echo "        <div class=\"content_layout\">
          <div class=";
            // line 227
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["contentlayout"] ?? null), 227, $this->source), "html", null, true);
            echo ">
            ";
            // line 228
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 228), 228, $this->source), "html", null, true);
            echo "
          </div>
        </div>
      ";
        }
        // line 232
        echo "      <!---End content -->

      <!--- Start Right SideBar -->
      ";
        // line 235
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 235)) {
            // line 236
            echo "        <div class=\"sidebar\">
          <div class=";
            // line 237
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarsecond"] ?? null), 237, $this->source), "html", null, true);
            echo ">
            ";
            // line 238
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 238), 238, $this->source), "html", null, true);
            echo "
          </div>
        </div>
      ";
        }
        // line 242
        echo "      <!---End Right SideBar -->
      
    </div>
    <!--End Content -->

    <!--Start Content Bottom-->
    ";
        // line 248
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom", [], "any", false, false, true, 248)) {
            // line 249
            echo "      <div class=\"row\">
        ";
            // line 250
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom", [], "any", false, false, true, 250), 250, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 253
        echo "    <!--End Content Bottom-->
  </div>
</div>
<!-- End layout -->









<!-- start: Footer -->
";
        // line 267
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 267) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 267)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 267))) {
            // line 268
            echo "  <div class=\"footerwidget\">
    <div class=\"container\">
      
      <div class=\"row\">
        
        <!-- Start Footer First Region -->
        <div class = ";
            // line 274
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 274, $this->source), "html", null, true);
            echo ">
          ";
            // line 275
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 275)) {
                // line 276
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 276), 276, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 278
            echo "        </div>
        <!-- End Footer First Region -->

        <!-- Start Footer Second Region -->
        <div class = ";
            // line 282
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 282, $this->source), "html", null, true);
            echo ">
          ";
            // line 283
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 283)) {
                // line 284
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 284), 284, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 286
            echo "        </div>
        <!-- End Footer Second Region -->

        <!-- Start Footer third Region -->
        <div class = ";
            // line 290
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 290, $this->source), "html", null, true);
            echo ">
          ";
            // line 291
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 291)) {
                // line 292
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 292), 292, $this->source), "html", null, true);
                echo "
          ";
            }
            // line 294
            echo "        </div>
        <!-- End Footer Third Region -->
      </div>
    </div>
  </div>
";
        }
        // line 300
        echo "<!--End Footer -->

<!-- Start Footer Menu -->
";
        // line 303
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_menu", [], "any", false, false, true, 303)) {
            // line 304
            echo "  <div class=\"footer-menu\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-sm-6 col-md-6\">
          ";
            // line 308
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_menu", [], "any", false, false, true, 308), 308, $this->source), "html", null, true);
            echo "
        </div>
        
      </div>
    </div>
  </div>
";
        }
        // line 315
        echo "<!-- End Footer Menu -->

";
        // line 317
        if ((($context["copyright_text"] ?? null) || ($context["show_credit_link"] ?? null))) {
            // line 318
            echo "<div class=\"copyright\">
  <div class=\"container\">
    <div class=\"row\">

      <!-- Copyright -->
      <div class=\"col-sm-6 col-md-6\">
        ";
            // line 324
            if (($context["copyright_text"] ?? null)) {
                echo "        
          <p>";
                // line 325
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["copyright_text"] ?? null), 325, $this->source), "html", null, true);
                echo "</p>        
        ";
            }
            // line 327
            echo "      </div>
      <!-- End Copyright -->

      <!-- Credit link -->
      ";
            // line 331
            if (($context["show_credit_link"] ?? null)) {
                // line 332
                echo "        <div class=\"col-sm-6 col-md-6\">
          <p class=\"credit-link\">Designed by <a href=\"http://www.zymphonies.in\" target=\"_blank\">Zymphonies</a></p>
        </div>
      ";
            }
            // line 336
            echo "      <!-- End Credit link -->
            
    </div>
  </div>
</div>
";
        }
        // line 342
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/creative_responsive_theme/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  543 => 342,  535 => 336,  529 => 332,  527 => 331,  521 => 327,  516 => 325,  512 => 324,  504 => 318,  502 => 317,  498 => 315,  488 => 308,  482 => 304,  480 => 303,  475 => 300,  467 => 294,  461 => 292,  459 => 291,  455 => 290,  449 => 286,  443 => 284,  441 => 283,  437 => 282,  431 => 278,  425 => 276,  423 => 275,  419 => 274,  411 => 268,  409 => 267,  393 => 253,  387 => 250,  384 => 249,  382 => 248,  374 => 242,  367 => 238,  363 => 237,  360 => 236,  358 => 235,  353 => 232,  346 => 228,  342 => 227,  339 => 226,  337 => 225,  332 => 222,  325 => 218,  321 => 217,  318 => 216,  316 => 215,  308 => 210,  302 => 206,  296 => 203,  293 => 202,  291 => 201,  280 => 192,  272 => 187,  266 => 183,  264 => 182,  258 => 178,  250 => 172,  244 => 170,  242 => 169,  238 => 168,  233 => 165,  227 => 163,  225 => 162,  221 => 161,  216 => 158,  210 => 156,  208 => 155,  204 => 154,  196 => 148,  194 => 147,  188 => 143,  180 => 138,  175 => 135,  173 => 134,  167 => 130,  159 => 125,  152 => 121,  137 => 108,  131 => 106,  129 => 105,  115 => 93,  110 => 90,  104 => 88,  101 => 87,  95 => 85,  92 => 84,  86 => 82,  83 => 81,  77 => 79,  74 => 78,  68 => 76,  66 => 75,  62 => 73,  60 => 72,  56 => 70,  50 => 68,  48 => 67,  39 => 60,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/creative_responsive_theme/templates/layout/page.html.twig", "/opt/lampp/htdocs/drupal-9.3.0/themes/creative_responsive_theme/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 67);
        static $filters = array("escape" => 68);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
