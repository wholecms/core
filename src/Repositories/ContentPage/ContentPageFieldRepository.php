<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 17.8.2015
 * Time: 16:33
 */

namespace Whole\Core\Repositories\ContentPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\ContentPageField;

class ContentPageFieldRepository extends Repository
{

    /**
     * @param ContentPageField $content_page_field
     */
    public function __construct(ContentPageField $content_page_field)
    {
        $this->model = $content_page_field;
    }

    public function getFieldDetails($id)
    {
        return $this->model->where('content_page_id',$id)->with('details')->get();
    }

    public function where($attribute,$value)
    {
        return $this->model->where($attribute,$value)->with('fieldsDetails')->get();
    }


    public function update($data,$content_page_id)
    {
        try {
            $this->model->where('content_page_id',$content_page_id)->delete();
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
                    $content_page_field = $this->model->create(['content_page_id'=>$content_page_id,'field'=>$key]);
                }catch (\Exception $e)
                {
                    return false;
                }

                foreach (json_decode($field,true) as $field_array)
                {
                    $fields[$i][] = $field_array+['content_page_field_id'=>$content_page_field->id];
                    try
                    {
                        $content_page_field->fieldsDetails()->attach([$field_array+['content_page_field_id'=>$content_page_field->id]]);
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

    public function create($data,$content_page_id)
    {
        $i = 0;
        foreach(array_except($data, ['_token','template','name','field']) as $key=>$field)
        {
            $field_size = count(json_decode($field,true));
            if ($field_size>0){
                try
                {
                    $content_page_field = $this->model->create(['content_page_id'=>$content_page_id,'field'=>$key]);
                }catch (\Exception $e)
                {
                    return false;
                }
            }
            if ($field_size>0)
            {
                foreach (json_decode($field,true) as $field)
                {
                    $fields[$i][] = $field+['content_page_field_id'=>$content_page_field->id];
                    try
                    {
                        $content_page_field->fieldsDetails()->attach([$field+['content_page_field_id'=>$content_page_field->id]]);
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
