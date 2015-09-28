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
        $localize = \App::getLocale();

        $days['locale']['D'] = [
            trans('whole::http/helpers.monday'),
            trans('whole::http/helpers.tuesday'),
            trans('whole::http/helpers.wednesday'),
            trans('whole::http/helpers.thursday'),
            trans('whole::http/helpers.friday'),
            trans('whole::http/helpers.saturday'),
            trans('whole::http/helpers.sunday'),
        ];

        $days['en']['D'] = ['Monday ','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        return $days['locale']['D'][array_search($day,$days[$is]['D'])];
    }
}
