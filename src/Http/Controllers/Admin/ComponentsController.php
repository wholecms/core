<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\Component\ComponentRepository;
use Whole\Core\Http\Requests\ComponentRequest;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Whole\Core\Repositories\PageSidebarMenu\PageSidebarMenuRepository;
use Whole\Core\Logs\Facade\Logs;
class ComponentsController extends Controller
{
    protected $component;
    protected $sidebar;

    /**
     * @param ComponentRepository $component
     * @param PageSidebarMenuRepository $sidebar
     */
    public function __construct(ComponentRepository $component, PageSidebarMenuRepository $sidebar)
    {
        $this->component = $component;
        $this->sidebar = $sidebar;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $components = $this->component->all();
        return view('backend::components.index',compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend::components.create');
    }


    /**
     * @param ComponentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ComponentRequest $request)
    {
        Cache::forget('_components');
        ini_set('max_execution_time', 0);

        File::delete(base_path('components/Component.php'));
        File::deleteDirectory(base_path('components/tmp'));

        $file_path = base_path('components/tmp/');
        $orginal_name = $request->file('file')->getClientOriginalName();
        if ($request->file('file')->move($file_path,$orginal_name))
        {
            Zipper::make($file_path.$orginal_name)->extractTo(base_path('components'));
            $component = require_once(base_path('components/Component.php'));

            $composer_file_path = base_path('composer.json');
            $composer_file = file($composer_file_path);

            if (isset($component['composer']) && count($component['composer'])>0)
            {
                foreach($composer_file as $line)
                {
                    $lines[] = $line;
                    if (count($component['composer'])>0){
                        if (trim($line)=='"App\\\": "app/",')
                        {
                            foreach($component['composer'] as $composer)
                            {
                                $lines[] = "            ".$composer.",\r\n";
                            }
                        }
                    }
                }
                file_put_contents($composer_file_path,$lines);
                unset($lines);
                exec("cd .. && composer update",$sonuc);
                exec("cd .. && composer dump-autoload",$sonuc);
                Logs::add('process',"Composer Update Edildi");
            }
            unset($lines);

            $app_file_path = base_path('config/app.php');
            $app_file = file($app_file_path);
            foreach($app_file as $line)
            {
                $lines[] = $line;
                if (isset($component['providers']) && count($component['providers'])>0){
                    if (trim($line)=="//include components providers")
                    {
                        foreach($component['providers'] as $provider)
                        {
                            $lines[] = "\t\t".$provider.",\n";
                        }
                    }
                }

                if (isset($component['aliases']) && count($component['aliases'])>0)
                {
                    if (trim($line)=="//include components aliases")
                    {
                        foreach($component['aliases'] as $alias)
                        {
                            $lines[] = "\t\t".$alias.",\n";
                        }
                    }
                }
            }
            file_put_contents($app_file_path,$lines);
            unset($lines);

            if ($component['vendor'])
            {
                exec("php ".base_path("artisan")." vendor:publish",$sonuc);
            }

            if ($component['migrate'])
            {
                exec("php ".base_path("artisan")." migrate",$sonuc);
                Logs::add('process',"DB Migrate Edildi");
            }

            if (isset($component['settings']) && count($component['settings'])>0)
            {
                $message = $this->component->create($component['settings']) ?
                    ['success','Başarıyla Kaydedildi']:
                    ['error','Bir Hata Meydana Geldi ve Kaydedilemedi'];
                if ($message[0]=="success")
                {
                    Logs::add('process',"Bileşen Eklendi \n{$component['settings']['name']}");
                }else
                {
                    Logs::add('errors',"Bileşen Eklenemedi");
                }
                Flash::$message[0]($message[1]);
            }

            if (isset($component['sidebar']) && count($component['sidebar'])>0)
            {
                $component['sidebar']['top_id'] = isset($component['sidebar']['top_id'])?$component['sidebar']['top_id']:"10";
                $component['sidebar']['children_menu'] = isset($component['sidebar']['children_menu'])?$component['sidebar']['children_menu']:"0";
                if($this->sidebar->saveData('create',$component['sidebar']))
                {
                    Logs::add('process',"Bileşen Menüye Eklendi\n{$component['settings']['name']}");
                }else
                {
                    Logs::add('errors',"Bileşen Menüye Eklenemedi!\n{$component['settings']['name']}");
                }
            }

            File::delete(base_path('components/Component.php'));
            File::deleteDirectory(base_path('components/tmp'));
            return redirect()->route('admin.component.index');
        }
        Flash::error('Bir Hata Meydana Geldi ve Bileşen Dosyası Yüklenemedi');
        return redirect()->route('admin.component.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Cache::forget('_components');
        #TODO:Composer Remove işlemlerini yaptırt;
        $message = $this->component->delete($id) ?
            ['success','Başarıyla Silindi']:
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',"Bileşen Silindi \nBileşen ID:{$id}");
        }else
        {
            Logs::add('errors',"Bileşen Silinemedi! \nBileşen ID:{$id}");
        }
        return redirect()->route('admin.component.index');

    }
}
