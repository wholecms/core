<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 13.8.2015
 * Time: 01:08
 */

namespace Whole\Core\Repositories\Content;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Content;



class ContentRepository extends Repository
{

    /**
     * @param Content $content
     */
    public function __construct(Content $content)
    {
        $this->model = $content;
    }

    public function newContent($data)
    {
        try
        {
            return $this->model->create($data);
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    public function allStatus()
    {
        return $this->model->where('status',1)->get();
    }

}