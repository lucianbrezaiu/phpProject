<?php

/* user/show.html */
class __TwigTemplate_3f64d0685547691bf89a0d0a658d9e2d03452513175d812f8c17d8458008ca2c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1> Hello ";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " </h1>";
    }

    public function getTemplateName()
    {
        return "user/show.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "user/show.html", "C:\\xampp\\htdocs\\proiect_php\\app\\Views\\user\\show.html");
    }
}
