<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 9.9.2015
 * Time: 03:18
 */

namespace Whole\Core\Injections;
use Whole\Core\Repositories\Setting\SettingRepository;
use Illuminate\Support\Facades\Cache;

class SettingsInjection
{
    protected $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    public function get()
    {
        if (!Cache::has('settings'))
        {
            Cache::rememberForever('settings', function()
            {
                return $this->setting->first();
            });
        }
        return Cache::get('settings');

    }
}