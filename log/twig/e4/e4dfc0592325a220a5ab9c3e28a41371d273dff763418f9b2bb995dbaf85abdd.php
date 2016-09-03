<?php

/* layout.html */
class __TwigTemplate_60ad05ad3999420d4760eaa827fb24e9ae06cecf6e31793b7eae90ca55b255bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<body>

<header>header</header>

<content>
    ";
        // line 7
        $this->displayBlock('content', $context, $blocks);
        // line 11
        echo "</content>


<footer>footer</footer>

</body>
</html>";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "

    ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  40 => 7,  30 => 11,  28 => 7,  20 => 1,);
    }
}
/* <html>*/
/* <body>*/
/* */
/* <header>header</header>*/
/* */
/* <content>*/
/*     {% block content %}*/
/* */
/* */
/*     {% endblock %}*/
/* </content>*/
/* */
/* */
/* <footer>footer</footer>*/
/* */
/* </body>*/
/* </html>*/
