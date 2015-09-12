<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 18.8.2015
 * Time: 10:11
 */

namespace Whole\Core\Repositories\MasterPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\MasterPageField;
class MasterPageFieldRepository extends Repository
{

    /**
     * @param MasterPageField $master_page_field
     */
    public function __construct(MasterPageField $master_page_field)
    {
        $this->model = $master_page_field;
    }

    public function getFieldDetails($id)
    {
        return $this->model->where('master_page_id',$id)->with('details')->get();
    }

//    public function __old__getFieldDetails($id)
//    {
//        return $this->model->where('master_page_id',$id)->with([
////            'details',
//            'details.content'=>function($query)
//            {
//                $query->where('status',1);
//            },
//            'details.block'=>function($query)
//            {
//                $query->where('status',1);
//            },
//            'details.component.component',
//            //'details.block.blockDetail',
//            'details.block.blockDetail.componentDetail.component',
//            'details.block.blockDetail.blockDetail',
//            'details.block.blockDetail.blockDetail.blockDetail.pageDetail.component.component',
//            'details.block.blockDetail.blockDetail.blockDetail.contentDetail',
//            'details.block.blockDetail.contentDetail',
//            //'details.block.blockDetail.pageDetail',
//            //'details.block.blockDetail.pageDetail.content',
//            'details.block.blockDetail.pageDetail.component.component',
////            'details.block.blockDetail.pageDetail.content',
//        ])->groupBy('field')->get();
//    }


    public function where($attribute,$value)
    {
        return $this->model->where($attribute,$value)->with('fieldsDetails')->get();
    }


    public function update($data,$master_page_id)
    {

        try {
            $this->model->where('master_page_id',$master_page_id)->delete();
        }
        catch (\Exception $e)
        {
            return false;
        }

        $i = 0;

        foreach(array_except($data, ['_token','_method','template','name','field']) as $key=>$field)
        {
            $field_size = count(json_decode($field,true));
            if ($field_size>0){
                try
                {
                    $master_page_field = $this->model->create(['master_page_id'=>$master_page_id,'field'=>$key]);
                }catch (\Exception $e)
                {
                    return false;
                }

                foreach (json_decode($field,true) as $field)
                {
                    $fields[$i][] = $field+['master_page_field_id'=>$master_page_field->id];
                    try
                    {
                        $master_page_field->fieldsDetails()->attach([$field+['master_page_field_id'=>$master_page_field->id]]);
                    }catch (\Exception $e)
                    {
                        return false;
                    }
                }
            }
            $i++;
        }

        return true;
    }

    public function create($data,$master_page_id)
    {
        $i = 0;
        foreach(array_except($data, ['_token','template','name','field']) as $key=>$field)
        {
            $field_size = count(json_decode($field,true));
            if ($field_size>0){
                try
                {
                    $master_page_field = $this->model->create(['master_page_id'=>$master_page_id,'field'=>$key]);
                }catch (\Exception $e)
                {
                    return false;
                }
            }
            if ($field_size>0)
            {
                foreach (json_decode($field,true) as $field)
                {
                    $fields[$i][] = $field+['master_page_field_id'=>$master_page_field->id];
                    try
                    {
                        $master_page_field->fieldsDetails()->attach([$field+['master_page_field_id'=>$master_page_field->id]]);
                    }catch (\Exception $e)
                    {
                        return false;
                    }
                }
            }
            $i++;
        }

        return true;

    }


}
