<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 5.8.2015
 * Time: 00:33
 */

namespace Whole\Core\Repositories;


interface RepositoryInterface {


    /**
     * @return mixed
     */
    public function all();


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));


    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = array('*'));


    /**
     * @param $type
     * @param array $data
     * @param null $id
     * @return mixed
     */
    public function saveData($type,array $data,$id=null);

}