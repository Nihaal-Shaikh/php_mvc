<?php

class Page extends Controller {

    public function __construct() {
    }

    public function index() {
        $this->view('hello');
    }

    public function about($id) {
        echo $id;
    }
}