<?php

/* iutTaskBundle:Task:index.html.twig */
class __TwigTemplate_beeba88517e9f4fbbce8a548a8bd895baa6fa421cdb464e82709cf588b435c46 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "iutTaskBundle:Task:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Task List";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Task List</h1>
<ul>
";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lists"]) ? $context["lists"] : $this->getContext($context, "lists")));
        foreach ($context['_seq'] as $context["_key"] => $context["list"]) {
            // line 7
            echo "<li>
<a href=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_task", array("id" => $this->getAttribute($context["list"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["list"], "name", array()), "html", null, true);
            echo "</a>
</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['list'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "iutTaskBundle:Task:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 11,  49 => 8,  46 => 7,  42 => 6,  38 => 4,  35 => 3,  29 => 2,  11 => 1,);
    }
}
