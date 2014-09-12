<?php

/* index.html.twig */
class __TwigTemplate_d804daf8af148e900256d87f60bdeb8641ef7cbe0cc8bb5e8720116afb1c13c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["active"] = "homepage";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div id=\"main\" role=\"main\" class=\"container\">
  Hoje o almoço será no ";
        // line 6
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (isset($context["restaurante"]) ? $context["restaurante"] : $this->getContext($context, "restaurante"))), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 6,  33 => 5,  30 => 4,  25 => 2,);
    }
}
