<?php

namespace app\controllers;

use app\core\Controller;
use \App;

class HomeController extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        // echo 'home Index';
        $this->render('index', [
            'ten'=> 'hoàng',
            'tuoi' => '22'

        ]);
        // $this->redirect('http://google.com');
        // echo App::getController();
        // echo App::getAction();
    }
}
?>