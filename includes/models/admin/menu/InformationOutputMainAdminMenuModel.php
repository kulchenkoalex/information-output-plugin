<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 16.02.2017
 * Time: 11:51
 */

namespace includes\models\admin\menu;


class InformationOutputMainAdminMenuModel
{
    public function __construct(){
                add_action( 'admin_init', array( &$this, 'createOption' ) );

            }

    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции

     */
    public function createOption()
     {

 
     }

    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
     {


     }

}