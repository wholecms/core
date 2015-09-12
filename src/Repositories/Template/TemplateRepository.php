<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 6.8.2015
 * Time: 23:04
 */

namespace Whole\Core\Repositories\Template;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Template;
use Whole\Core\Repositories\Setting\SettingRepository;

class TemplateRepository extends Repository
{

    protected $setting;


    /**
     * @param Template $template
     * @param SettingRepository $setting
     */
    public function __construct(Template $template, SettingRepository $setting)
    {
        $this->model = $template;
        $this->setting = $setting;
    }

    public function templateFields($id)
    {
        return $this->model->where('id',$id)->with('templateFields')->first();
    }

    public function selectTemplate()
    {
        return $this->setting->first()->template;
//        return  $this->model->where('published',1)->with('templateFields')->first();
    }


}