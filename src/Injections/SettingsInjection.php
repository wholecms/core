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
use Whole\Core\Render\PageRender;

class SettingsInjection
{
    protected $setting;
    protected $page_render;
    public function __construct(SettingRepository $setting, PageRender $page_render)
    {
        $this->setting = $setting;
        $this->page_render = $page_render;
    }

    public function get()
    {
        if (!Cache::has('settings'))
        {
            Cache::rememberForever('settings', function()
            {
                $setting = $this->setting->first();
                $setting->title = $this->page_render->reContent($setting->title);
                $setting->meta_keywords = $this->page_render->reContent($setting->meta_keywords);
                $setting->meta_description = $this->page_render->reContent($setting->meta_description);
                $setting->rss_title = $this->page_render->reContent($setting->rss_title);
                $setting->rss_description = $this->page_render->reContent($setting->rss_description);
                $setting->offline_message = $this->page_render->reContent($setting->offline_message);
                $setting->logo_title = $this->page_render->reContent($setting->logo_title);
                $setting->logo_description = $this->page_render->reContent($setting->logo_description);
                $setting->copyright = $this->page_render->reContent($setting->copyright);

                return $setting;
            });
        }
        return Cache::get('settings');
    }
}