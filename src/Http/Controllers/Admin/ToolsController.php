<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Whole\Core\Logs\Facade\Logs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ToolsController extends Controller
{
	public function clearCache()
	{
		Cache::flush();
		Logs::add('process',trans('whole::http/controllers.tools_log_1'));
		Flash::success(trans('whole::http/controllers.tools_flash_1'));
		return redirect()->route('admin.index');
	}
}
