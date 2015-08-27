<?php

/* iutTaskBundle:Task:tasks.html.twig */
class __TwigTemplate_cfbd81e6beac4b2014734d93477474535962b035ce7c5d5b3c950dff4c0dd833 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "iutTaskBundle:Task:tasks.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'script' => array($this, 'block_script'),
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
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
\t<div id=\"idList\">
\t\t";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["idList"]) ? $context["idList"] : $this->getContext($context, "idList")), "html", null, true);
        echo "
\t</div>
\t<form id=\"formStatus\" action=\"\" method=\"post\" ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), 'enctype');
        echo ">
\t\t";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), 'errors');
        echo "

\t\t";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), "name", array()), 'row');
        echo "

\t\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), "description", array()), 'row');
        echo "

\t\t";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["taskForm"]) ? $context["taskForm"] : $this->getContext($context, "taskForm")), 'rest');
        echo "

\t\t<input class=\"navigation\" type=\"submit\" value=\"Create\"/>
\t</form>
\t<ul id=\"contentList\">
\t\t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : $this->getContext($context, "tasks")));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 21
            echo "\t\t\t<li>
\t\t\t\t<input type=\"checkbox\" name=\"chech";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "id", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "id", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($context["task"], "check", array()) == "completed")) {
                echo "checked";
            }
            echo "><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "name", array()), "html", null, true);
            echo "</strong> : ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "description", array()), "html", null, true);
            echo " <a id=\"supprimer\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("index_list_remove_task", array("idTask" => $this->getAttribute($context["task"], "id", array()), "idList" => $this->getAttribute($this->getAttribute($context["task"], "listTask", array()), "id", array()))), "html", null, true);
            echo "\"><img src=\"/sf2/web/css/ic_delete_black_24px.svg\"/></a>
\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t</ul>
\t<footer>
\t\t<a class=\"navigation\" href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("index_list");
        echo "\">Return</a>
\t</footer>
";
    }

    // line 30
    public function block_script($context, array $blocks = array())
    {
        // line 31
        echo "\t<script type=\"text/javascript\">\t\t\t  
\t\t\$(\"input[type=checkbox]\").click(function(){
\t\t\tvar idT = \$(this).val();
\t\t\tvar idL = \$(\"#idList\").html();
\t\t\tif(\$(this).is(':checked'))
\t\t\t{
\t\t\t\tvar task_check = \"completed\";
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\tvar task_check = \"needsAction\";
\t\t\t}
\t\t\tjQuery.ajax({
\t\t\t\ttype : 'POST',
\t\t\t\turl: '";
        // line 45
        echo $this->env->getExtension('routing')->getPath("index_update_task_ajax");
        echo "',
\t\t\t\tdata: {idTask : idT, idList : idL, check : task_check},
\t\t\t\tsuccess: function (data) {
\t\t\t\t},
\t\t\t\terror:   function(request, textStatus, errorThrown){
\t\t\t\t\talert('An error has occured with Google Task. Please contact us.');
\t\t\t\t}
\t\t\t});
\t\t});
\t</script>
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
        return array (  135 => 45,  119 => 31,  116 => 30,  109 => 27,  105 => 25,  84 => 22,  81 => 21,  77 => 20,  69 => 15,  64 => 13,  59 => 11,  54 => 9,  50 => 8,  45 => 6,  39 => 4,  36 => 3,  30 => 2,  11 => 1,);
    }
}
