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
	
	public function create($data)
	{
		try
        {
            $template =  $this->model->create($this->except($data));
			$id = $template->id;
			if (isset($data['fields']) && count($data['fields'])>0)
			{
				$i = 0;
				foreach($data['fields'] as $field=>$name)
				{
					$fields[$i]['template_id'] = $id;
					$fields[$i]['name'] = $name;
					$fields[$i]['field'] = $field;
				$i++;}
			}
            $template->fields()->attach($fields);
        }catch (\Exception $e)
        {
            return false;
        }
        return $template;
	}


}