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

/* themes/custom/studio/templates/page.html.twig */
class __TwigTemplate_c807ece5cd3e798f4fa1fee97357105f280e61d61590986c286eb2bb0716a0e6 extends \Twig\Template
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
        echo "<div id=\"panel\">
\t<div class=\"row\">
\t\t<div class=\"twelve columns\">
\t\t\t<img src=\"";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 4, $this->source), "html", null, true);
        echo "/images/info.png\" class=\"pics\" alt=\"info\">
\t\t\t<div class=\"infotext\">
\t\t\t\t Thank you for visiting my theme! Replace this with your message to visitors.
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<p class=\"slide\">
\t<a href=\"#\" class=\"btn-slide\"></a>
</p>
<!-- HEADER
================================================== -->
<div class=\"row\">
\t<div class=\"headerlogo four columns\">
\t\t<div class=\"logo\">
\t\t\t<a href=\"\">
\t\t\t<h4>Studio Francesca</h4>
\t\t\t</a>
\t\t</div>
\t</div>
\t<div class=\"headermenu eight columns noleftmarg\">

    ";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "menu", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        echo "
    <!--<nav id=\"nav-wrap\">
\t\t<ul id=\"main-menu\" class=\"nav-bar sf-menu\">
\t\t\t<li class=\"current\">
\t\t\t<a href=\"index.html\">Home</a>
\t\t\t<ul>
\t\t\t\t<li><a href=\"index2.html\">Without slider</a></li>
\t\t\t</ul>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">Portofolio</a>
\t\t\t<ul>
\t\t\t\t<li><a href=\"portofolio2.html\">2 Columns</a></li>
\t\t\t\t<li><a href=\"portofolio3.html\">3 Columns</a></li>
\t\t\t\t<li><a href=\"portofolio4.html\">4 Columns</a></li>
\t\t\t\t<li><a href=\"portofoliodetail.html\">Project Details</a></li>
\t\t\t</ul>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">Blog</a>
\t\t\t<ul>
\t\t\t\t<li><a href=\"blogpage1.html\">Blog page style 1</a></li>
\t\t\t\t<li><a href=\"blogpage2.html\">Blog page style 2</a></li>
\t\t\t\t<li><a href=\"blogpage3.html\">Blog page style 3</a></li>
\t\t\t\t<li><a href=\"blogsinglepost.html\">Single post</a></li>
\t\t\t</ul>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">Pages</a>
\t\t\t<ul>
\t\t\t\t<li><a href=\"about.html\">About us</a></li>
\t\t\t\t<li><a href=\"services.html\">Services</a></li>
\t\t\t</ul>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">Features</a>
\t\t\t<ul>
\t\t\t\t<li><a href=\"columns.html\">Columns</a></li>
\t\t\t\t<li><a href=\"elements.html\">Elements</a></li>
\t\t\t\t<li><a href=\"typography.html\">Typography</a></li>
\t\t\t</ul>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"contact.html\">Contact</a>
\t\t\t</li>
\t\t</ul>
\t\t</nav>-->
\t</div>
</div>
<div class=\"clear\">
</div>
<!-- SLIDER
================================================== -->

  <div class=\"container-lg my-3\">
    <div id=\"myCarousel\" class=\"carousel slide\" data-bs-ride=\"carousel\">
        <!-- Carousel indicators -->
        ";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
        echo "
    </div>
</div>
<!-- SUBHEADER
================================================== -->
<!-- <div id=\"subheader\">
\t<div class=\"row\">
\t\t<div class=\"twelve columns\">
\t\t\t<p class=\"text-center\">
\t\t\t\t \"Vision is the art of seeing what is invisible to others\" - Jonathan Swift
\t\t\t</p>
\t\t</div>
\t</div>
</div> -->
<!-- ANIMATED COLUMNS
================================================== -->
<div class=\"row\">
\t<!--<div class=\"twelve columns\">
\t\t<ul class=\"ca-menu\">
\t\t\t<li>
\t\t\t<a href=\"#\">
\t\t\t<span class=\"ca-icon\"><i class=\"fa fa-heart\"></i></span>
\t\t\t<div class=\"ca-content\">
\t\t\t\t<h2 class=\"ca-main\">Responsive<br/> Design</h2>
\t\t\t\t<h3 class=\"ca-sub\">Across all major devices</h3>
\t\t\t</div>
\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">
\t\t\t<span class=\"ca-icon\"><i class=\"fa fa-bullhorn\"></i></span>
\t\t\t<div class=\"ca-content\">
\t\t\t\t<h2 class=\"ca-main\">Friendly<br/> Documentation</h2>
\t\t\t\t<h3 class=\"ca-sub\">Straight to the point</h3>
\t\t\t</div>
\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">
\t\t\t<span class=\"ca-icon\"><i class=\"fa fa-user\"></i></span>
\t\t\t<div class=\"ca-content\">
\t\t\t\t<h2 class=\"ca-main\">Alternate<br/> Home Pages</h2>
\t\t\t\t<h3 class=\"ca-sub\">Full slider, boxed or none</h3>
\t\t\t</div>
\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">
\t\t\t<span class=\"ca-icon\"><i class=\"fa fa-camera\"></i></span>
\t\t\t<div class=\"ca-content\">
\t\t\t\t<h2 class=\"ca-main\">Filterable<br/> Portofolio</h2>
\t\t\t\t<h3 class=\"ca-s
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">
\t\t\t<span class=\"ca-icon\"><i class=\"fa fa-user\"></i></span>
\t\t\t<div class=\"ca-content\">
\t\t\t\t<h2 class=\"ca-main\">Alternate<br/> Home Pages</h2>
\t\t\t\t<h3 class=\"ca-sub\">Full slider, boxed or none</h3>
\t\t\t</div>
\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t<a href=\"#\">
\t\t\t<span class=\"ca-icon\"><i class=\"fa fa-camera\"></i></span>
\t\t\t<div class=\"ca-content\">
\t\t\t\t<h2 class=\"ca-main\">Filterable<br/> Portofolio</h2>
\t\t\t\t<h3 class=\"ca-sub\">Isotop & PrettyPhoto</h3>
\t\t\t</div>
\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</div>-->

  ";
        // line 157
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 157), 157, $this->source), "html", null, true);
        echo "
</div>
<!-- CONTENT
================================================== -->
<!--<div class=\"row\">
\t<div class=\"twelve columns\">
\t\t<div class=\"centersectiontitle\">
\t\t\t<h4>Services</h4>
\t\t</div>
\t</div>
\t<div class=\"four columns\">
\t\t<h5>Photography</h5>
    <p>
    <img src=\"";
        // line 170
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 170, $this->source), "html", null, true);
        echo "/images/5.jpg\" alt=\"New york\" style=\"width:270px;height:170px;\">
    </p>
\t\t<p>
\t\t\t Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.
\t\t</p>
\t</div>
\t<div class=\"four columns\">
\t\t<h5>Artwork</h5>
    <p>
    <img src=\"";
        // line 179
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 179, $this->source), "html", null, true);
        echo "/images/5.jpg\" alt=\"New york\" style=\"width:270px;height:170px;\">
    </p>
\t\t<p>
\t\t\t Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.
\t\t</p>
\t</div>
\t<div class=\"four columns\">
\t\t<h5>Logos</h5>
    <p>
    <img src=\"";
        // line 188
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 188, $this->source), "html", null, true);
        echo "/images/5.jpg\" alt=\"New york\" style=\"width:270px;height:170px;\">
    </p>
\t\t<p>
\t\t\t Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.
\t\t</p>
\t</div>
</div> -->
<div class=\"hr\">
</div>


<!-- FOOOTER
================================================== -->
<div id=\"footer\">
\t<footer class=\"row\">
\t<p class=\"back-top floatright\">
\t\t<a href=\"#top\"><span></span></a>
\t</p>
\t<div class=\"four columns\">
\t\t<!--<h1>ABOUT US</h1>
\t\t Our goal is to keep clients satisfied!-->
     ";
        // line 209
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_column_1", [], "any", false, false, true, 209), 209, $this->source), "html", null, true);
        echo "
\t</div>
\t<div class=\"four columns\">
\t\t<!--<h1>GET SOCIAL</h1>
\t\t<a class=\"social facebook\" href=\"#\"></a>
\t\t<a class=\"social twitter\" href=\"#\"></a>
\t\t<a class=\"social deviantart\" href=\"#\"></a>
\t\t<a class=\"social flickr\" href=\"#\"></a>
\t\t<a class=\"social dribbble\" href=\"#\"></a>-->
    ";
        // line 218
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_column_2", [], "any", false, false, true, 218), 218, $this->source), "html", null, true);
        echo "
\t</div>
\t<div class=\"four columns\">
  ";
        // line 221
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_column_3", [], "any", false, false, true, 221), 221, $this->source), "html", null, true);
        echo "
\t\t<!--<h1 class=\"newsmargin\">NEWSLETTER</h1>
\t\t<div class=\"row collapse newsletter floatright\">
\t\t\t<div class=\"ten mobile-three columns\">
\t\t\t\t<input type=\"text\" class=\"nomargin\" placeholder=\"Enter your e-mail address...\">
\t\t\t</div>
\t\t\t<div class=\"two mobile-one columns\">
\t\t\t\t<a href=\"#\" class=\"postfix button expand\">GO</a>
\t\t\t</div>
\t\t</div>-->
\t</div>
\t</footer>
</div>
<div class=\"copyright\">
\t<div class=\"row\">
  ";
        // line 236
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_column_4", [], "any", false, false, true, 236), 236, $this->source), "html", null, true);
        echo "
\t\t<!--<div class=\"six columns\">
\t\t\t &copy;<span class=\"small\"> Copyright Your Agency Name</span>
\t\t</div>
\t\t<div class=\"six columns\">
\t\t\t<span class=\"small floatright\">Design by <a target=\"_blank\" href=\"http://www.wowthemes.net/premium-themes-templates/\">WowThemesNet</a> </span>
\t\t</div>-->
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/studio/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  306 => 236,  288 => 221,  282 => 218,  270 => 209,  246 => 188,  234 => 179,  222 => 170,  206 => 157,  129 => 83,  69 => 26,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/studio/templates/page.html.twig", "/opt/lampp/htdocs/drupal-9.3.0/themes/custom/studio/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
