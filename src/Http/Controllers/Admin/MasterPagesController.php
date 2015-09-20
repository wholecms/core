<?php

namespace Whole\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\MasterPage\MasterPageRepository;
use Whole\Core\Repositories\MasterPage\MasterPageFieldRepository;
use Whole\Core\Repositories\Template\TemplateRepository;
use Whole\Core\Repositories\Block\BlockRepository;
use Whole\Core\Repositories\Content\ContentRepository;
use Whole\Core\Repositories\Component\ComponentRepository;
use Illuminate\Support\Facades\Cache;
class MasterPagesController extends Controller
{
    protected $master_page;
    protected $master_page_field;
    protected $template;
    protected $block;
    protected $content;
    protected $component;


    /**
     * @param MasterPageRepository $master_page
     * @param TemplateRepository $template
     * @param BlockRepository $block
     * @param ContentRepository $content
     * @param ComponentRepository $component
     * @param MasterPageFieldRepository $master_page_field
     */
    public function __construct(MasterPageRepository $master_page, TemplateRepository $template, BlockRepository $block, ContentRepository $content, ComponentRepository $component, MasterPageFieldRepository $master_page_field)
    {
        $this->master_page = $master_page;
        $this->master_page_field = $master_page_field;
        $this->template = $template;
        $this->block = $block;
        $this->content = $content;
        $this->component = $component;
    }




    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $select_master_page = $this->master_page->first();
        if (isset($select_master_page))
        {
            $id = $select_master_page->id;
            $master_page = $this->master_page->select($id);
            $master_page_field = $this->master_page_field->where('master_page_id',$id);
            $template_fields = $this->master_page->templateFields($id);
            $type = ['update','put'];
        }
        else
        {
            $type = ['store','post'];
            $master_page = null;
            $master_page_field = null;
        }

        $components = $this->component->allFile();
        $blocks = $this->block->all();
        $contents = $this->content->all();
        $templates = $this->template->all()->lists('name','id');
        $select_template = $this->template->selectTemplate();
        if(!isset($template_fields)){ $template_fields = $select_template->templateFields; }
        return view('backend::master_pages.index',compact('master_page_field','master_page','components','contents','blocks','templates','select_template','template_fields'))->with('slide_close',true)->with('type',$type);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Cache::forget('master_page');
        Cache::forget('master_page_fields');
		
		Cache::forget('_contents');
		Cache::forget('_components');
		Cache::forget('_blocks');
		Cache::forget('_pages');
		
        return $this->master_page->create($request->all());
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
        Cache::forget('master_page');
        Cache::forget('master_page_fields');
		
		Cache::forget('_contents');
		Cache::forget('_components');
		Cache::forget('_blocks');
		Cache::forget('_pages');
        return $this->master_page->update($request->all(),$id);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function selectTemplate(Request $request)
    {
        return $this->template->find($request->get('id'))?:"false";
    }
}
