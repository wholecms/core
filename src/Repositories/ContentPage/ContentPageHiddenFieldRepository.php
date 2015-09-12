<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 17.8.2015
 * Time: 16:33
 */

namespace Whole\Core\Repositories\ContentPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\ContentPageHiddenField;


class ContentPageHiddenFieldRepository extends Repository
{

    public function __construct(ContentPageHiddenField $content_page_hidden_field)
    {
        $this->model = $content_page_hidden_field;
    }

    public function deleteAll()
    {
        $this->model->where('content_page_id','>','0')->delete();
    }

}
