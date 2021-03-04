<?php

namespace app\controllers;

use app\core\Controller;
use \App;

class DasboardController extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->render('index', [
            'ten'=> 'hoàng',
            'tuoi' => '22'

        ]);
    }
}
?>