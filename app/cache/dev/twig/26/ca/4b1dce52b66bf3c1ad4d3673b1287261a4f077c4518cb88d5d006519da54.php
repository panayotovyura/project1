<?php

/* Levi9BatteriesBundle:Default:index.html.twig */
class __TwigTemplate_26ca4b1dce52b66bf3c1ad4d3673b1287261a4f077c4518cb88d5d006519da54 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "Levi9BatteriesBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Welcome to Recycle Batteries application</h1>
    <p>Click <a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("batteries_add");
        echo "\">here</a> to add batteries to the box</p>
    <table border=\"1\">
        <caption>Statistics</caption>
        <thead>
            <tr>
                <th><b>Battery type</b></th>
                <th><b>Total count</b></th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["batteries"]) ? $context["batteries"] : $this->getContext($context, "batteries")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["battery"]) {
            // line 16
            echo "            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["battery"], "type", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["battery"], "stat_count", array()), "html", null, true);
            echo "</td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 21
            echo "            <tr>
                <td colspan=\"2\" align=\"center\">No batteries</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['battery'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "Levi9BatteriesBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 25,  67 => 21,  59 => 18,  55 => 17,  52 => 16,  47 => 15,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
