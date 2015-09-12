<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 25.8.2015
 * Time: 01:56
 */

namespace Whole\Core\Repositories\Component;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\ComponentFile;


class ComponentFileRepository extends Repository
{
    /**
     * @param ComponentFile $component_file
     */
    public function __construct(ComponentFile $component_file)
    {
        $this->model = $component_file;
    }

    public function allComponent()
    {
        return $this->model->with('component')->get();
    }


}