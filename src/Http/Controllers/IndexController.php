<?php
namespace Whole\Core\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\MasterPage\MasterPageRepository;
use Whole\Core\Repositories\MasterPage\MasterPageFieldRepository;
use Whole\Core\Repositories\Page\PageRepository;
use Whole\Core\Repositories\ContentPage\ContentPageRepository;
use Whole\Core\Repositories\ContentPage\ContentPageFieldRepository;
use Whole\Core\Render\PageRender;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    protected $master_page;
    protected $master_page_field;
    protected $page;
    protected $content_page;
    protected $content_page_field;
    protected $render;

    public function __construct(MasterPageRepository $master_page, MasterPageFieldRepository $master_page_field, PageRepository $page, ContentPageRepository $content_page, ContentPageFieldRepository $content_page_field, PageRender $render)
    {
        $this->master_page = $master_page;
        $this->master_page_field = $master_page_field;
        $this->page = $page;
        $this->content_page = $content_page;
        $this->content_page_field = $content_page_field;
        $this->render = $render;
    }



    public function index()
    {
        if (!Cache::has('master_page'))
        {
            Cache::rememberForever('master_page', function()
            {
                return $this->master_page->getMasterPage();
            });
        }

        $master_page = Cache::get('master_page');
		if ($master_page===null)
		{
			return view('index::welcome');
		}
        $hidden_fields = $this->render->renderHiddenFields($master_page->hiddenFields);

        if (!Cache::has('master_page_fields'))
        {
            Cache::rememberForever('master_page_fields', function() use ($master_page)
            {
                return $this->master_page_field->getFieldDetails($master_page->id);
            });
        }
        $master_page_fields = Cache::get('master_page_fields');
        $field_details = $this->render->renderFields($master_page_fields,false);
        return view($master_page->template->folder.'.master_page.index',compact('field_details','master_page_fields','hidden_fields'));
    }



    public function contentPages($slug,$id)
    {

        if (!($page = $this->page->find($id)))
        {
            return abort(404);
        }else
        {
            if($page->content_type=="link"){ return redirect($page->external_link); }
        }

        $content_page = $this->content_page->find($page->content_page_id);
        $hidden_fields = $this->render->renderHiddenFields($content_page->hiddenFields);
        $content_page_fields = $this->content_page_field->getFieldDetails($content_page->id);
        $field_details = $this->render->renderFields($content_page_fields,false,$id);

        return view($content_page->template->folder.'.content_page.index',compact('field_details','content_page_fields','hidden_fields'))
            ->with('title',$page->meta_title)
            ->with('keywords',$page->meta_keywords)
            ->with('description',$page->meta_description);
    }


}
