<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 5.8.2015
 * Time: 00:36
 */

namespace Whole\Core\Repositories;
use \Whole\Core\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

abstract class Repository implements RepositoryInterface {


    protected $model;


    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }


    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        try
        {
            return $this->model->destroy($id);
        }catch (\Exception $e)
        {
            return false;
        }
    }


    /**
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        return $this->destroy($id);
    }


    /**
     * @param $id
     * @param array $columns
     * @return array
     */
    public function find($id, $columns = array('*'))
    {
        try
        {
            return $this->model->findOrFail($id,$columns);
        }catch (\Exception $e)
        {
            return false;
        }
    }


    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }


    /**
     * @param $type
     * @param array $data
     * @param null $id
     * @return array
     */
    public function saveData($type,array $data,$id=null)
    {
        try {
            $success = !isset($id) ?
                $this->model->$type($this->except($data)) :
                $this->model->find($id)->$type($this->except($data));
        }
        catch(\Exception $e)
        {
            return false;
        }
        return $success;
    }


    /**
     * @param array $data
     * @return array
     */
    protected function except(array $data)
    {
        return array_except($data, ['_token','_method']);
    }

}