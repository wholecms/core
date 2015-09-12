<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 31.8.2015
 * Time: 17:54
 */

namespace Whole\Core\Repositories\PermittedPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\AllPage;


class AllPageRepository extends Repository
{

    public function __construct(AllPage $all_page)
    {
        $this->model = $all_page;
    }


}