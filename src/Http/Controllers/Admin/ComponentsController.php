<?php

namespace Whole\Core\Http\Controllers\Admin;

use Whole\Core\Http\Controllers\Admin\MainController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Requests;
use Whole\Core\Repositories\Component\ComponentRepository;
use Whole\Core\Http\Requests\ComponentRequest;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\File;
use Whole\Core\Repositories\PageSidebarMenu\PageSidebarMenuRepository;
use Whole\Core\Repositories\PageSidebarMenu\PageSidebarMenuLangRepository;
use Whole\Core\Repositories\AllPage\AllPageRepository;
use Whole\Core\Logs\Facade\Logs;
class ComponentsController extends MainController
{
    protected $component;
    protected $sidebar;
	protected $sidebar_lang;
	protected $all_page;

    /**
     * @param ComponentRepository $component
     * @param PageSidebarMenuRepository $sidebar
	 * @param PageSidebarMenuLangRepository $sidebar_lang
	 * @param AllPageRepository $all_page
     */
    public function __construct(ComponentRepository $component, PageSidebarMenuRepository $sidebar,PageSidebarMenuLangRepository $sidebar_lang, AllPageRepository $all_page)
    {
        $this->component = $component;
        $this->sidebar = $sidebar;
		$this->sidebar_lang = $sidebar_lang;
		$this->all_page = $all_page;
		
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $components = $this->component->allFile();
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
        $this->itemsClearCache();
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
                {$ok = false;
					if (trim($line)=='"App\\\": "app/"' || trim($line)=='"App\\\": "app/",')
					{
						if (count($component['composer'])>0)
						{
							foreach($component['composer'] as $composer)
							{
								$lines[] = "            ".$composer.",\r\n";
							}
						}
						$lines[] = $line;
						$ok = true;
					}
					else
					{
						if (!$ok){$lines[] = $line;}
					}
                }
                file_put_contents($composer_file_path,$lines);
                unset($lines);
                exec("cd ".base_path()." && composer update",$sonuc);
				exec("cd ".base_path()." && composer dump-autoload",$sonuc);
                Logs::add('process',trans('whole::http/controllers.components_log_1'));
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
				exec("cd ".base_path()." && composer dump-autoload",$sonuc);
            }

            if ($component['migrate'])
            {
				exec("cd ".base_path()." && composer dump-autoload",$sonuc);
                exec("php ".base_path("artisan")." migrate",$sonuc);
                Logs::add('process',trans('whole::http/controllers.components_log_2'));
            }

            if (isset($component['settings']) && count($component['settings'])>0)
            {
                $message = $this->component->create($component['settings']) ?
                    ['success',trans('whole::http/controllers.components_flash_1')]:
                    ['error',trans('whole::http/controllers.components_flash_2')];
                if ($message[0]=="success")
                {
                    Logs::add('process',trans('whole::http/controllers.components_log_3',['name'=>$component['settings']['name']]));
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
				
				foreach($component['pages'] as $page)
				{
					$this->all_page->saveData('create',['path'=>$page]);
				}
                if($sidebar_menu = $this->sidebar->saveData('create',$component['sidebar']))
                {
                    Logs::add('process',trans('whole::http/controllers.components_log_4',['name'=>$component['settings']['name']]));
                }else
                {
                    Logs::add('errors',trans('whole::http/controllers.components_log_5',['name'=>$component['settings']['name']]));
                }
				
				foreach($component['sidebar_lang'] as $sidebar_menu_lang)
				{
					$sidebar_menu_lang['admin_page_sidebar_menu_id'] = $sidebar_menu->id;
					if($this->sidebar_lang->saveData('create',$sidebar_menu_lang))
					{
						Logs::add('process',trans('whole::http/controllers.components_log_8',['name'=>$component['settings']['name']]));
					}else
					{
						Logs::add('errors',trans('whole::http/controllers.components_log_9',['name'=>$component['settings']['name']]));
					}
				}
				
            }

            File::delete(base_path('components/Component.php'));
            File::deleteDirectory(base_path('components/tmp'));
            return redirect()->route('admin.component.index');
        }
        Flash::error(trans('whole.http.controllers.components_flash_3'));
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
        $this->itemsClearCache();
        #TODO:Composer Remove işlemlerini yaptırt;
        $message = $this->component->delete($id) ?
            ['success','Başarıyla Silindi']:
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',trans('whole.http.controllers.components_log_6',['id'=>$id]));
        }else
        {
            Logs::add('errors',trans('whole.http.controllers.components_log_7',['id'=>$id]));
        }
        return redirect()->route('admin.component.index');

    }
}
