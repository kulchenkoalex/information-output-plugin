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
    public function Information()
    {
        $request = wp_remote_get('https://api.pinterest.com/v1/boards/marticz/home-office/pins/?access_token=<your access token>');
        $pins = json_decode($request['body'], true);
        if (!empty($pins['data'])) {
            echo '<ul>';
            foreach ($pins['data'] as $pin) {
                echo '<li><a href="' . $pin['url'] . '">' . $pin['note'] . '</a></li>';
            }
            echo '</ul>';
        }
    }
}