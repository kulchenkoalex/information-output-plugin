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
    public function information()
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

    public function generationToken()
    {
        $key = base64_encode( urlencode( "n8KP16uvGZA6xvFTtb8IAA:i4pmOV0duXJv7TyF5IvyFdh5wDIqfJOovKjs92ei878" ) );
        $request = wp_remote_post('https://api.twitter.com/oauth2/token', array(
            'headers' => array(
                'Authorization' => 'Basic ' . $key,
                'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
            ),
            'body' => 'grant_type=client_credentials',
            'httpversion' => '1.1'
        ));
        $token = json_decode( $request['body'] );
        echo "<pre>"; var_dump($token); echo "</pre>";
    }

    public function accessToken()
    {
        $token = get_transient( 'twitter_access_token' );
        $token = ( empty( $token ) ) ? get_twitter_access_token() : $token;
        $request = wp_remote_get('https://api.twitter.com/1.1/followers/ids.json?screen_name=danielpataki&count=5', array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
            ),
            'httpversion' => '1.1'
        ));
        $token = json_decode( $request['body'] );
    }
}