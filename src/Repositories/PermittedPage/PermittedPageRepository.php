<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 31.8.2015
 * Time: 17:50
 */

namespace Whole\Core\Repositories\PermittedPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\PermittedPage;


class PermittedPageRepository extends Repository
{

    public function __construct(PermittedPage $permitted_page)
    {
        $this->model = $permitted_page;
    }

    public function save($data)
    {
        try{$this->model->where('role_id','>',0)->delete();}
        catch(\Exception $e)
        {
            return [false,trans('whole::http/controllers.permitted_pages_flash_2')];
        }
        if (isset($data['path']))
        {
            foreach($data['path'] as $role_id=>$paths)
            {
                if (is_array($paths))
                {
                    foreach($paths as $path)
                    {
                        try{$this->model->create(['role_id'=>$role_id,'path'=>$path,'path'=>$path,'access'=>$data['access'],'process'=>$data['process']]);}
                        catch(\Exception $e)
                        {
                            return [false,trans('whole::http/controllers.permitted_pages_flash_3')];
                        }
                    }
                }
            }
        }

        return true;
    }

    public function permittedPages($role_id)
    {
        if(($first = $this->model->first())!==null)
        {
            $pages['access'] = $first['access'];
            $pages['process'] = $first['process'];
        }
        foreach($this->model->where('role_id',$role_id)->get() as $page)
        {
            $pages[] = $page->path;
        }

        return $pages;
    }


}