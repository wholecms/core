<?php

namespace Whole\Core\Http\Controllers\Admin;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
class MainController extends Controller
{
    public function itemsClearCache()
    {
        Cache::forget('master_page');
        Cache::forget('master_page_fields');

        Cache::forget('_contents');
        Cache::forget('_components');
        Cache::forget('_blocks');
        Cache::forget('_pages');
    }

    public function userClearCache()
    {
        Cache::forget('role_id');
        Cache::forget('this_user');
    }

    public function settingsClearCache()
    {
        Cache::forget('settings');
    }

    public function cacheFlush()
    {
        Cache::flush();
    }
}
