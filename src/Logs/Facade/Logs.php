<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 1.9.2015
 * Time: 00:18
 */

namespace Whole\Core\Logs\Facade;
use Illuminate\Support\Facades\Facade;

class Logs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'logs';
    }
}