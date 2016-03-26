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




if ( ! function_exists('route_input_render'))
{

    function route_input_render($v,$route_aar,$this_id=null)
    { if($this_id==null){$this_id = $v;}
        return "".($v=="content_page"?"<input type=\"hidden\" name=\"route[name]\" value=\"".$route_aar."\" />":"")."<input ".($v=="content_page"?"readonly":"")." class=\"form-control\" style=\"width:100px;display:inline;\" type=\"text\" name=\"route[{$v}]\" value=\"".($v=="content_page"?"this.id":$this_id)."\"/>";

    }
}
