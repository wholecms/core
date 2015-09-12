<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 19.8.2015
 * Time: 20:42
 */

namespace Whole\Core\Repositories\Page;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Page;

class PageRepository extends Repository
{
    /**
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    public function all()
    {
        return $this->model->with('contentPage','content','component.component')->get();
    }

    public function allStatus()
    {
        return $this->model->where('status',1)->with('content','component.component')->get();
    }


}