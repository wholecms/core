<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 1.9.2015
 * Time: 18:27
 */


if ( ! function_exists('day_localize'))
{

    function day_localize($day,$is="en",$localize="tr")
    {

        $days['tr']['D'] = ['Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi','Pazar'];
        $days['en']['D'] = ['Monday ','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        return $days[$localize]['D'][array_search($day,$days[$is]['D'])];
    }
}
