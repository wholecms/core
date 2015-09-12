<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 13.8.2015
 * Time: 18:53
 */

namespace Whole\Core\Repositories\Component;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Component;


class ComponentRepository extends Repository
{
    /**
     * @param Component $component
     */
    public function __construct(Component $component)
    {
        $this->model = $component;
    }

    public function allFile()
    {
        return $this->model->with('file')->get();
    }

    public function allComponentAndFilesLists($value,$key)
    {
        $components = $this->allFile();
        $lists = [];
        foreach($components as $component)
        {
            foreach($component->file as $k=>$file)
            {
                $lists[$component->name][$file->pivot->$key] = $file->pivot->$value;
            }
        }
        return collect($lists);
    }

    public function create($data)
    {
        try
        {
            $component =  $this->model->create($this->except($data));
            $files = isset($data['files']) ? $data['files'] : [];
            if(count($files)>0)
            {
                foreach($files as $k=>$file)
                {
                    $files[$k]['component_id'] = $component->id;
                }
            }
            $component->file()->attach($files);
        }catch (\Exception $e)
        {
            return false;
        }
        return $component;
    }


}