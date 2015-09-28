<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Whole\Core\Logs\Facade\Logs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogsController extends Controller
{
    public function login()
    {
        $logs = Logs::read('login');
        return view('backend::logs.login',compact('logs'));
    }

    public function process()
    {
        $logs = Logs::read('process');
        return view('backend::logs.process',compact('logs'));
    }

    public function errors()
    {
        $logs = Logs::read('errors');
        return view('backend::logs.errors',compact('logs'));
    }

    public function clear(Request $request)
    {
        $message = Logs::clear($request->get('type'))?
            ['success',trans('whole::http.controllers.logs_flash_1')] :
            ['error',trans('whole::http.controllers.logs_flash_2')];
        Flash::$message[0]($message[1]);
        return redirect()->back();
    }
}
