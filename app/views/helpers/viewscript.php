<?php

/**
 * Inclusão automática de scripts de Views
 *
 * @author junior.dias
 */
class ViewscriptHelper extends AppHelper {

    var $helpers = array('Javascript');

    function incluir() {
        $controller = $this->params['controller'];
        $view = $this->params['action'];
        $file = strtolower($controller . '.' . $view . '.js');
        $path = JS . 'viewscripts' . DS . $file;
        if(file_exists($path)) {
            $script = $this->Javascript->link('viewscripts/' . $file);
            return $this->output($script);
        }
    }

}