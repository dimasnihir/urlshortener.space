<?php

namespace shortener;

class App
{


     public static $app;


     public function __construct()
     {
          $query = trim($_SERVER['QUERY_STRING'], '/');
        echo '!!!';
         session_start();

         self::$app = Registry::instance();
         $this->getParams();

         new ErorHandler();
         Router::dispatch($query);


     }

     protected function getParams() {
         $params = require_once CONFIG . '/params.php';
         if(!empty($params)) {
             foreach ($params as $k => $v) {
                 self::$app->setProperty($k, $v);
             }
         }
     }

}