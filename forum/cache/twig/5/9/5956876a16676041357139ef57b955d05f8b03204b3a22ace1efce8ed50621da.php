<?php

/* overall_footer.html */
class __TwigTemplate_5956876a16676041357139ef57b955d05f8b03204b3a22ace1efce8ed50621da extends Twig_Template
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
        echo "\t\t";
        // line 2
        echo "\t</div>

";
        // line 4
        // line 5
        echo "
";
        // line 6
        if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "WRAP_FOOTER", array()) == 0)) {
            // line 7
            echo "\t";
            $location = "navbar_footer.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("navbar_footer.html", "overall_footer.html", 7)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 8
            echo "</div>
";
        }
        // line 10
        echo "
<div id=\"page-footer\" class=\"page-width\" role=\"contentinfo\">
\t";
        // line 12
        if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "WRAP_FOOTER", array()) == 1)) {
            // line 13
            echo "\t\t";
            $location = "navbar_footer.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("navbar_footer.html", "overall_footer.html", 13)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 14
            echo "\t";
        }
        // line 15
        echo "
<!-- \t<div class=\"copyright\">
\tEVENT overall_footer_copyright_prepend
\t";
        // line 18
        echo (isset($context["CREDIT_LINE"]) ? $context["CREDIT_LINE"] : null);
        echo "
\t<a href=\"http://www.colorizeit.com/styles/phpbb-31-styles/368.basic.html\">Color scheme created with Colorize It</a>. 
\t<br />Style by <a href=\"http://www.artodia.com/\">Arty</a>
\tIF TRANSLATION_INFO<br />";
        // line 21
        echo (isset($context["TRANSLATION_INFO"]) ? $context["TRANSLATION_INFO"] : null);
        echo "ENDIF
\tEVENT overall_footer_copyright_append
\tIF DEBUG_OUTPUT<br />";
        // line 23
        echo (isset($context["DEBUG_OUTPUT"]) ? $context["DEBUG_OUTPUT"] : null);
        echo "ENDIF
\tIF U_ACP<br /><strong><a href=\"";
        // line 24
        echo (isset($context["U_ACP"]) ? $context["U_ACP"] : null);
        echo "\">";
        echo $this->env->getExtension('phpbb')->lang("ACP");
        echo "</a></strong>ENDIF
</div> -->







\t<div id=\"darkenwrapper\" data-ajax-error-title=\"";
        // line 33
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TITLE");
        echo "\" data-ajax-error-text=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT");
        echo "\" data-ajax-error-text-abort=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT_ABORT");
        echo "\" data-ajax-error-text-timeout=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT_TIMEOUT");
        echo "\" data-ajax-error-text-parsererror=\"";
        echo $this->env->getExtension('phpbb')->lang("AJAX_ERROR_TEXT_PARSERERROR");
        echo "\">
\t\t<div id=\"darken\">&nbsp;</div>
\t</div>

\t<div id=\"phpbb_alert\" class=\"phpbb_alert\" data-l-err=\"";
        // line 37
        echo $this->env->getExtension('phpbb')->lang("ERROR");
        echo "\" data-l-timeout-processing-req=\"";
        echo $this->env->getExtension('phpbb')->lang("TIMEOUT_PROCESSING_REQ");
        echo "\">
\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t<h3 class=\"alert_title\">&nbsp;</h3><p class=\"alert_text\"></p>
\t</div>
\t<div id=\"phpbb_confirm\" class=\"phpbb_alert\">
\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t<div class=\"alert_text\"></div>
\t</div>
</div>

";
        // line 47
        if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "WRAP_FOOTER", array()) == 1)) {
            // line 48
            echo "</div>
";
        }
        // line 50
        echo "
<div>
\t<a id=\"bottom\" class=\"anchor\" accesskey=\"z\"></a>
\t";
        // line 53
        if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
            echo (isset($context["RUN_CRON_TASK"]) ? $context["RUN_CRON_TASK"] : null);
        }
        // line 54
        echo "</div>

<script type=\"text/javascript\" src=\"";
        // line 56
        echo (isset($context["T_JQUERY_LINK"]) ? $context["T_JQUERY_LINK"] : null);
        echo "\"></script>
";
        // line 57
        if ((isset($context["S_ALLOW_CDN"]) ? $context["S_ALLOW_CDN"] : null)) {
            echo "<script type=\"text/javascript\">window.jQuery || document.write(unescape('%3Cscript src=\"";
            echo (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null);
            echo "/javascript/jquery.min.js?assets_version=";
            echo (isset($context["T_ASSETS_VERSION"]) ? $context["T_ASSETS_VERSION"] : null);
            echo "\" type=\"text/javascript\"%3E%3C/script%3E'));</script>";
        }
        // line 58
        echo "<script type=\"text/javascript\" src=\"";
        echo (isset($context["T_ASSETS_PATH"]) ? $context["T_ASSETS_PATH"] : null);
        echo "/javascript/core.js?assets_version=";
        echo (isset($context["T_ASSETS_VERSION"]) ? $context["T_ASSETS_VERSION"] : null);
        echo "\"></script>
";
        // line 59
        $asset_file = "forum_fn.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            $asset->add_assets_version('27');
            $asset_file = $asset->get_url();
            }
        }
        $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        // line 60
        $asset_file = "ajax.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            $asset->add_assets_version('27');
            $asset_file = $asset->get_url();
            }
        }
        $context['definition']->append('SCRIPTS', '<script type="text/javascript" src="' . $asset_file. '"></script>

');
        // line 61
        echo "
";
        // line 62
        // line 63
        echo "
";
        // line 64
        if ((isset($context["S_PLUPLOAD"]) ? $context["S_PLUPLOAD"] : null)) {
            $location = "plupload.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("plupload.html", "overall_footer.html", 64)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 65
        echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SCRIPTS", array());
        echo "

";
        // line 67
        // line 68
        echo "

\t<div class=\"use-bootstrap\" id=\"travelFooter\">
\t\t<footer class=\"footer-main\">
            <div class=\"footer-main__corner\"></div>
            <div class=\"footer-main__corner-border\"></div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"footer__logo col-lg-3 col-md-3 hidden-sm hidden-xs\">
                        <h3 class=\"title\"><a href=\"index.html\">ТурфирмНЕТ</a></h3>
                    </div>
                    <div class=\"grid col-lg-9 col-md-9\">
                        <div class=\"col-lg-2 col-md-2 hidden-sm hidden-xs\">
                            <h4 class=\"title\">Навигация</h4>
                            <ul class=\"footer-main__navigation list-unstyled\">
                                <li><p><a href=\"#\">О проекте</a></p></li>
                                <li><p><a href=\"#\">Консультации</a></p></li>
                                <li><p><a href=\"#\">Форум</a></p></li>
                                <li><p><a href=\"#\">Карты</a></p></li>
                                <li><p><a href=\"#\">Web-камеры</a></p></li>
                                <li><p><a href=\"#\">Справочник</a></p></li>
                                <li><p><a href=\"#\">Контакты</a></p></li>
                            </ul>
                        </div>
                        <div class=\"footer-main__subscribe-us text-center clearfix col-lg-4 col-md-4\">
                            <h4 class=\"title\">ПОДПИСЫВАЙТЕСЬ НА НАС</h4>
                            <ul class=\"footer-main__subscribe list-unstyled\">
                                <li><a href=\"#\"><i class=\"icon-tw\"></i>Twitter</a></li>
                                <li><a href=\"#\"><i class=\"icon-fb\"></i>Facebook</a></li>
                                <li><a href=\"#\"><i class=\"icon-goog\"></i>Google+</a></li>
                            </ul>
                            <div class=\"contacts visible-xs visible-sm pull-right\">
                                <p><i class=\"icon-phone\"></i>8 (800) 123 45 67</p>
                                <p><i class=\"icon-mail\"></i>travel@mail.ru</p>
                            </div>
                        </div>
                        <div class=\"col-lg-4 col-md-3\">
                            <form class=\"contact-us\" method=\"post\" action=\"javascript: void(null);\">
                                <h4 class=\"title\">СВЯЖИТЕСЬ С НАМИ</h4>
                                <input type=\"text\" class=\"contact-us__field\" name=\"name\" placeholder=\"Ваше имя\">
                                <input type=\"text\" class=\"contact-us__field\" name=\"mail\" placeholder=\"E-mail\">
                                <textarea class=\"contact-us__field\" placeholder=\"Напишите Ваше сообщение\" name=\"message\"></textarea>
                                <input type=\"submit\" class=\"contact-us__submit\" value=\"Отправить\">
                            </form>
                        </div>
                        <div class=\"col-lg-2 col-md-3 hidden-sm hidden-xs\">
                            <div class=\"contacts\">
                                <p><i class=\"icon-phone\"></i>8 (800) 123 45 67</p>
                                <p><i class=\"icon-mail\"></i>travel@mail.ru</p>
                            </div>
                        </div>
                    </div> <!--grid-->
                </div>  <!--row-->
            </div>  <!--container-->
        </footer>
\t</div>

<style>
\tbody#phpbb {
\t    padding-bottom: 0;
\t    overflow-x: hidden;
\t}
\tfooter.footer-main {
\t\tmargin-top: 80px!important;
\t}
\theader.header-main {
\t\tmargin-bottom: 80px!important;
\t}
</style>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "overall_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 68,  228 => 67,  223 => 65,  209 => 64,  206 => 63,  205 => 62,  202 => 61,  187 => 60,  172 => 59,  165 => 58,  157 => 57,  153 => 56,  149 => 54,  145 => 53,  140 => 50,  136 => 48,  134 => 47,  119 => 37,  104 => 33,  90 => 24,  86 => 23,  81 => 21,  75 => 18,  70 => 15,  67 => 14,  54 => 13,  52 => 12,  48 => 10,  44 => 8,  31 => 7,  29 => 6,  26 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
