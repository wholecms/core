<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Whole\Core\Http\Requests\TemplateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\Template\TemplateRepository;
use Whole\Core\Repositories\Setting\SettingRepository;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\File;
use Whole\Core\Logs\Facade\Logs;

class TemplatesController extends Controller
{
    protected $template;
    protected $setting;

    /**
     * @param TemplateRepository $template
     * @param SettingRepository $setting
     */
    public function __construct(TemplateRepository $template, SettingRepository $setting)
    {
        $this->template = $template;
        $this->setting = $setting;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $templates = $this->template->all();
        $setting = $this->setting->first();
        return view('backend::templates.index',compact('templates','setting'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend::templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TemplateRequest $request
     * @return Response
     */
    public function store(TemplateRequest $request)
    {
        ini_set('max_execution_time', 0);
        File::delete(base_path('resources/views/Template.php'));
        File::delete(storage_path('tmp/Template.php'));
        File::deleteDirectory(storage_path('tmp/'));

        $file_path = storage_path('tmp/');
        $orginal_name = $request->file('file')->getClientOriginalName();
        if ($request->file('file')->move($file_path,$orginal_name))
        {
            Zipper::make($file_path.$orginal_name)->extractTo(storage_path('tmp'));
            $template = require_once(storage_path('tmp/Template.php'));
            $assets =  File::move(storage_path('tmp/assets/'.$template['folder']),public_path('assets/'.$template['folder']));
            $template_file =  File::move(storage_path('tmp/'.$template['folder']),base_path('resources/views/'.$template['folder']));
            if (!$assets || !$template_file)
            {

                File::delete(base_path('resources/views/Template.php'));
                File::delete(storage_path('tmp/Template.php'));
                File::deleteDirectory(storage_path('tmp/'));
                Flash::error('Tema Dosyası Yüklendi ama Dizinler Tasinamadi! Tüm İşlemleriniz İptal Edildi.');
                return redirect()->route('admin.template.index');
            }

            $message = $this->template->create($template) ?
                ['success','Başarıyla Kaydedildi']:
                ['error','Bir Hata Meydana Geldi ve Kaydedilemedi'];
            File::delete(base_path('resources/views/Template.php'));
            File::delete(storage_path('tmp/Template.php'));
            File::deleteDirectory(storage_path('tmp/'));
            Flash::$message[0]($message[1]);
            if ($message[0]=="success")
            {
                Logs::add('process',"Şablon Eklendi\n{$template['name']}");
            }else
            {
                Logs::add('errors',"Şablon Eklenemedi!");
            }
            return redirect()->route('admin.template.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        try{
            $folder = $this->template->find($id)->folder;
			File::deleteDirectory(storage_path('tmp'));
			File::deleteDirectory(public_path('assets/'.$folder));
            File::deleteDirectory(base_path('resources/views/'.$folder));
        }catch (\Exception $e)
        {
            Flash::error('Şablon Dosyası Silinemedi İşlem İptal Edildi');
            return redirect()->route('admin.template.index');
        }

        $message = $this->template->delete($id)?
            ['success','Başarıyla Silindi'] :
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',"Şablon Silindi\nID:{$id}");
        }else
        {
            Logs::add('errors',"Şablon Silinemedi!\nID:{$id}");
        }
        return redirect()->route('admin.template.index');
    }
}
