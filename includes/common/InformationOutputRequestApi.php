<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 13.02.2017
 * Time: 20:22
 */

namespace includes\common;


class InformationOutputRequestApi
{
    private static $instance = null;
    private function __construct(){

    }
    public static function getInstance(){
                if ( null == self::$instance ) {
                        self::$instance = new self;
                    }
         return self::$instance;
     }
}