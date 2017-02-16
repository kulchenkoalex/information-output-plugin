<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 16.02.2017
 * Time: 11:20
 */

namespace includes\common;


class InformationOutputDefaultOption
{
    public static function getDefaultOptions()
    {
        $defaults = array(
            'account' => array(
                'marker' => '',
                'token' => ''
            )
        );
        $defaults = apply_filters('information_output_default_option', $defaults);
        return $defaults;
    }
}