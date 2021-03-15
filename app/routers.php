<?php

    use app\core\Controller;

    Router::get('/','HomeController@index');
    Router::POST('/editjson','EditJsonController@index');
    
    
    Router::get('/EditJsonController','EditJsonController@index');
    Router::get('/home',function(){
        $ct = new Controller;
        $ct->render('index',[
            'age'=> '19',
            'name'=> 'hoàng'
        ]);
    });

    Router::post('/sentmail','SentmailController@index');

     // $this->router->any('/{list}/{page}','HomeController@index' );
    //  Router::get('/',function(){
    //      echo '<h1>alo</h1>';
    //  });

    Router::get('/dasboard','DasboardController@index');
    Router::GET('/sentdate{date?}','SentDateController@index');
    Router::get('/login', function(){
        echo 'day la trang login';
    });

    Router::any('*', function(){
        echo '404 Trang không tồn tại';
    });
?>