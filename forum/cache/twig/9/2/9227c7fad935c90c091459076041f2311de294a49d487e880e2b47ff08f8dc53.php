<?php

/* ucp_pm_message_footer.html */
class __TwigTemplate_9227c7fad935c90c091459076041f2311de294a49d487e880e2b47ff08f8dc53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div>";
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "</div>
</form>
";
    }

    public function getTemplateName()
    {
        return "ucp_pm_message_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
