<?php

/* iutTaskBundle:Task:tasks.html.twig */
class __TwigTemplate_7b307669ec5ac7fb3bf1daeab49c43ebf96436e39924371a7da3abf0cc738d57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "iutTaskBundle:Task:tasks.html.twig", 1);
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
        echo "<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
<ul>
";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : $this->getContext($context, "tasks")));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 7
            echo "<li>
<input type=\"checkbox\" name=\"chech";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "id", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "id", array()), "html", null, true);
            echo "\" ";
            if ( !(null === $this->getAttribute($context["task"], "check", array()))) {
                echo "checked";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "name", array()), "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "description", array()), "html", null, true);
            echo " <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_list_remove_task", array("idTask" => $this->getAttribute($context["task"], "id", array()), "idList" => $this->getAttribute($this->getAttribute($context["task"], "listTask", array()), "id", array()))), "html", null, true);
            echo "\">Supprimer</a>
</li>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</ul>


<form action=\"\" method=\"post\" ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), 'enctype');
        echo ">
    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), 'errors');
        echo "

    ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), "name", array()), 'row');
        echo "

    ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), "description", array()), 'row');
        echo "

    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), 'rest');
        echo "

    <input type=\"submit\" />
</form>

<a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("index_list");
        echo "\">Retour</a>
";
    }

    public function getTemplateName()
    {
        return "iutTaskBundle:Task:tasks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 27,  97 => 22,  92 => 20,  87 => 18,  82 => 16,  78 => 15,  73 => 12,  51 => 8,  48 => 7,  44 => 6,  38 => 4,  35 => 3,  29 => 2,  11 => 1,);
    }
}
