<?php
namespace App\Controllers;

use League\Plates\Engine;

class BaseController
{
    /**
     * Default URL to redirect if it's not valid
     * 
     * @var string
     */
    public $redirect = '/home';

    /**
     * View Engine
     * 
     * @var \League\Plates\Engine;
     */
    public $view;

    public function __construct()
    {
        $this->init();

        //If it's not have permission, the controller will direct $redirect = '/home'
        if (!$this->authorize()){
            redirect($this->redirect);
        }
    }
    /**
     * This method use to check if the controller is called
     * 
     * @return void
     */
    public function authorize(){
        return true;
    }

    /**
     * The function inits Controller
     * 
     * @return void
     */
    public function init(){
        $this->view = new Engine(config('view.path'));
    }

    /**
     * Render view
     *
     * @param [type] $view
     * @param array $data
     * @return string|mixed
     */
    public function render($view, $data = [])
    {
        echo $this->view->render($view, $data);
    }
}
?>