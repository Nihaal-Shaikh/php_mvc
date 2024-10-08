<?php

/*
 * Base controller
 * Loads the models and views
 */

class Controller
{

    // Load model
    public function model($model)
    {
        // Require model file

        require_once '../app/model/' . $model . '.php';

        // Instantiate the model
        return new $model;
    }

    // Load view
    public function view($view, $data = [])
    {
        // Check for the view file
        if (file_exists('../app/view/' . $view . '.php')) {
            require_once '../app/view/' . $view . '.php';
        } else {
            // View does not exist.
            echo 'View does not exist';
        }
    }
}