<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 16.9.2015
 * Time: 02:32
 */

namespace Whole\Core\Repositories\AllPage;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\AllPage;


class AllPageRepository extends Repository
{
    public function __construct(AllPage $all_page)
    {
        $this->model = $all_page;
    }
}