<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 17.8.2015
 * Time: 16:33
 */

namespace Whole\Core\Repositories\MasterPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\MasterPageHiddenField;


class MasterPageHiddenFieldRepository extends Repository
{

    /**
     * @param MasterPageHiddenField $master_page_hidden_field
     */
    public function __construct(MasterPageHiddenField $master_page_hidden_field)
    {
        $this->model = $master_page_hidden_field;
    }

    public function deleteAll()
    {
        $this->model->where('master_page_id','>','0')->delete();
    }

}
