<?php

namespace Whole\Core\Http\Controllers\Admin;

use Whole\Core\Http\Controllers\Admin\MainController;
use Laracasts\Flash\Flash;
use Whole\Core\Logs\Facade\Logs;
use Illuminate\Http\Request;
use App\Http\Requests;

class ToolsController extends MainController
{
	public function clearCache()
	{
		$this->cacheFlush();
		Logs::add('process',trans('whole::http/controllers.tools_log_1'));
		Flash::success(trans('whole::http/controllers.tools_flash_1'));
		return redirect()->route('admin.index');
	}
}
