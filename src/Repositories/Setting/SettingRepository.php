<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 31.8.2015
 * Time: 02:24
 */

namespace Whole\Core\Repositories\Setting;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Setting;



class SettingRepository extends Repository
{

    /**
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function first()
    {
        return $this->model->with('template')->first();
    }

}