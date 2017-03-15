<?php

namespace pff\modules;
use pff\Abs\AModule;
use pff\Iface\IAfterViewHook;
use pff\Iface\IBeforeViewHook;
use pff\Iface\IConfigurableModule;

/**
 * Manages images
 */
class Cookie extends AModule implements IConfigurableModule, IBeforeViewHook, IAfterViewHook{

    private $_multiLang, $_keyName, $_defaultLang, $_position, $_theme, $_cookieType, $_privacy, $_privacyText;

    public function __construct($confFile = 'pff2-cookie/module.conf.local.yaml'){
        $this->loadConfig($confFile);
    }

    public function loadConfig($confFile) {
        $conf = $this->readConfig($confFile);
        $this->_multiLang    = $conf['moduleConf']['multiLang'];
        $this->_keyName      = $conf['moduleConf']['keyName'];
        $this->_defaultLang  = $conf['moduleConf']['defaultLang'];
        $this->_position     = $conf['moduleConf']['position'];
        $this->_theme        = $conf['moduleConf']['theme'];
        $this->_cookieType   = $conf['moduleConf']['cookieType'];
        if(isset($conf['moduleConf']['privacy'])){
            $this->_privacy      = $conf['moduleConf']['privacy'];
            $this->_privacyText  = $conf['moduleConf']['privacyText'];
        }else{
            $this->_privacy      = false;
            $this->_privacyText  = array();
        }
    }

    private function getCookieContent($output){
        $plugin = file_get_contents(__DIR__."/../resources/cookie.php");
        $text = "";

        if($this->_multiLang && !empty($_SESSION['lang'])){
            if(file_exists(__DIR__."/../resources/text_".$_SESSION['lang'].".php")){
                $text .= file_get_contents(__DIR__."/../resources/text_".$_SESSION['lang'].".php");
            }else{
                $text .= file_get_contents(__DIR__."/../resources/text_".$this->_defaultLang.".php");
            }
        }else{
            $text .= file_get_contents(__DIR__."/../resources/text_".$this->_defaultLang.".php");
        }

        if($this->_privacy){
            $start = stripos($text, '__popup">');
            if($this->_multiLang && !empty($_SESSION['lang'])){
                if(!empty($this->_privacyText["testo_".$_SESSION['lang']])){
                    $temp = $this->_privacyText["testo_".$_SESSION['lang']];
                }elseif(!empty($this->_privacyText["testo_".$this->_defaultLang])){
                    $temp = $this->_privacyText["testo_".$this->_defaultLang];
                }
            }else{
                if(!empty($this->_privacyText["text_".$this->_defaultLang])){
                    $temp = $this->_privacyText["text_".$this->_defaultLang];
                }else{
                    $temp = "";
                }
            }
            $text = substr($text, 0, $start+9).$temp.substr($text,$start+9);
        }

        $base_css = file_get_contents(__DIR__."/../resources/base_css.php");
        if($this->_theme == "dark"){
            $theme = file_get_contents(__DIR__."/../resources/dark_css.php");
        }else{
            $theme = file_get_contents(__DIR__."/../resources/light_css.php");
        }
        $cookie_list = "<script>$(function(){";
        foreach($this->_cookieType as $c){
            $cookie_list .= "$('#cookie__".$c."').show();";
        }
        $cookie_list .= "});</script>";
        if($this->_position == "bottom"){
            $cookie_position = "<style>.ce-banner{bottom:0}</style>";
        }else{
            $cookie_position = "<style>.ce-banner{top:0}</style>";
        }
        $toInject = $cookie_list.$base_css.$cookie_position.$theme.$text.$plugin;
        $start = stripos($output, '</body>');
        if($start){
            $toReturn = substr($output, 0, $start).$toInject.substr($output,$start);
        }else{
            $toReturn = $output;
        }
        //$toReturn = $matches[0].$toInject.$matches[1];
        //$toReturn = preg_replace('#<body(.*?)</body>#is', '<body$1'.$toInject.'</body>', $output);
        return $toReturn;
    }

    /**
     * Executes actions before the Views are rendered
     *
     * @return mixed
     */
    public function doBeforeView($context = null)
    {
        if(!isset($_SESSION['cookieaggiunti'])){
            ob_start(array($this,'getCookieContent'));
            $_SESSION['cookieaggiunti'] = true;
        }
    }

    /**
     * Executes actions after the views are rendered
     *
     * @return mixed
     */
    public function doAfterView()
    {
        if(isset($_SESSION['cookieaggiunti'])){
            unset($_SESSION['cookieaggiunti']);
        }
        ob_end_flush();
    }
}
