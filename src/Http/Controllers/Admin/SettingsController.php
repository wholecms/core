<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\Setting\SettingRepository;
use Whole\Core\Repositories\Template\TemplateRepository;
use Illuminate\Support\Facades\Cache;
use Whole\Core\Logs\Facade\Logs;

class SettingsController extends Controller
{
    protected $setting;
    protected $template;

    /**
     * @param SettingRepository $setting
     * @param TemplateRepository $template
     */
    public function __construct(SettingRepository $setting, TemplateRepository $template)
    {
        $this->setting = $setting;
        $this->template = $template;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $setting = $this->setting->first();
        $templates = $this->template->all()->lists('name','id');
        return view('backend::settings.edit',compact('setting','templates'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Cache::forget('settings');
        $message = $this->setting->saveData('update',$request->all(),$id) ?
            ['success',trans('whole::http.controllers.settings_flash_1')] :
            ['error',trans('whole::http.controllers.settings_flash_2')];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',trans('whole::http.controllers.settings_log_1'));
        }else
        {
            Logs::add('errors',trans('whole::http.controllers.settings_log_2'));
        }
        return redirect()->route('admin.setting.index');
    }

}
