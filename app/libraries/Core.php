<?php

/*
 * App Core Class
 * Creayes URL & loads core controller
 * URL format: /controller/method/params
 */

class Core {

    protected $currentController = 'Page';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        // print_r($this->getUrl());

        $url = $this->getUrl();

        // Look in controllers for first value
        if (file_exists('../app/controller/' . ucwords($url[0]) . 'php')) {

            // If exists, then set as controller.
            $this->currentController = ucwords($url[0]);
            
            // Unset 0 index.
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controller/' . $this->currentController . '.php';

        // Instantiate the controller class
        $this->currentController = new $this->currentController;
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}