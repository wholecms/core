<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 25.8.2015
 * Time: 01:54
 */
namespace Whole\Core\Render;
use Whole\Core\Repositories\Content\ContentRepository;
use Whole\Core\Repositories\Component\ComponentFileRepository;
use Whole\Core\Repositories\Block\BlockRepository;
use Whole\Core\Repositories\Page\PageRepository;
use Illuminate\Support\Facades\Cache;

class PageRender {


    private static $render;
    protected $content;
    protected $component_file;
    protected $block;
    protected $page;

    public function __construct(ContentRepository $content, ComponentFileRepository $component_file, BlockRepository $block, PageRepository $page)
    {
        $this->content = $content;
        $this->component_file = $component_file;
        $this->block= $block;
        $this->page = $page;
    }


    public function renderFields($page_fields,$isCollect=true,$content_page_id=null)
    {

        if (!Cache::has('_contents'))
        {
            Cache::rememberForever('_contents', function()
            {
                return $this->content->allStatus();
            });
        }


        if (!Cache::has('_components'))
        {
            Cache::rememberForever('_components', function()
            {
                return $this->component_file->allComponent();
            });
        }


        if (!Cache::has('_blocks'))
        {
            Cache::rememberForever('_blocks', function()
            {
                return $this->block->allStatus();
            });
        }


        if (!Cache::has('_pages'))
        {
            Cache::rememberForever('_pages', function()
            {
                return $this->page->allStatus();
            });
        }



        if(self::$render===null)
        {
            if (Cache::get('_contents')->count()>0)
            {
                foreach(Cache::get('_contents')->toArray() as $content)
                {
                    $_contents[$content['id']] = $content;
                }
            }

            if (Cache::get('_components')->count()>0)
            {
                foreach(Cache::get('_components')->toArray() as $component)
                {
                    $_components[$component['id']] = $component;
                }
            }

            if (Cache::get('_blocks')->count()>0)
            {
                foreach(Cache::get('_blocks')->toArray() as $k=>$block)
                {
                    $this_block = $_blocks[$block['id']] = $block;
                    foreach($_blocks[$block['id']]['block_detail'] as $j=>$block_detail)
                    {
                        $_blocks[$block['id']]['block_detail'][$block_detail['id']] = $block_detail;
                        unset($_blocks[$block['id']]['block_detail'][$j]);
                    }
                }
            }

            if (Cache::get('_pages')->count()>0)
            {
                foreach(Cache::get('_pages')->toArray() as $page)
                {
                    $_pages[$page['id']] = $page;
                }
            }

            if (isset($_blocks))
            {
                foreach($_blocks as $i=>$blok)
                {
                    foreach($blok['block_detail'] as $j=>$detay)
                    {
                        switch ($detay['type']) {
                            case "block":
                                $_blocks[$i]['block_detail'][$j]['data'] = &$_blocks[$detay['data_id']];
                                break;
                            case "page":
                                $_blocks[$i]['block_detail'][$j]['data'] = $_pages[$detay['data_id']];
                                break;
                            case "content":
                                $_blocks[$i]['block_detail'][$j]['data'] = $_contents[$detay['data_id']];
                                break;
                            case "component-file":
                                $_blocks[$i]['block_detail'][$j]['data'] = $_components[$detay['data_id']];
                                break;
                        }
                    }
                }

                $this->blockTree($_blocks);
            }

            if ($page_fields->count()>0)
            {
                foreach($page_fields as $page_field)
                {
                    foreach($page_field['details'] as $i=>$field_details)
                    {
                        $field = $_fields[$page_field['field']][] = ['type'=>$field_details['type'],'data_id'=>$field_details['data_id'],'data'=>[]];
                        switch ($field_details['type']) {
                            case "content":
								$_contents[$field['data_id']]['content'] =  $this->reContent($_contents[$field['data_id']]['content']);
                                $_fields[$page_field['field']][$i]['data'] = $_contents[$field['data_id']];
                                break;
                            case "component-file":
                                $_fields[$page_field['field']][$i]['data'] = $_components[$field['data_id']];
                                break;
                            case "block":
                                foreach($_blocks[$field['data_id']]['block_detail'] as $j=>$block_detail)
                                {
                                    if($block_detail['top_block_id']!=null)
                                    {
                                        unset($_blocks[$field['data_id']]['block_detail'][$j]);
                                    }
                                }
                                $_fields[$page_field['field']][$i]['data'] = $_blocks[$field['data_id']];
                                break;
                            case "main-content":
                                if($content_page_id!==null)
                                {
                                    $_fields[$page_field['field']][$i]['data'] = $_pages[$content_page_id];
                                }
                                break;
                        }
                    }
                }

                self::$render = $_fields;
            }
            else
            {
                self::$render = [];
            }
        }

        if($isCollect)
        {
            return json_decode(json_encode(self::$render));

        }else{
            return self::$render;
        }


    }


    public function renderHiddenFields($items)
    {
        $fields = [];
        foreach($items as $item)
        {
            $fields[] = $item['pivot']['field_name'];
        }
        return $fields;
    }

    public function blockTree(&$elements, $parentId = null)
    {
        $branch = [];
        foreach ($elements as $i=>$block_details)
        {
            foreach ($block_details['block_detail'] as $j=>$element)
            {
                if ($element['top_block_id'] == $parentId) {
                    $children = $this->blockTree($elements, $element['id']);
                    if ($children) {
                        $elements[$i]['block_detail'][$j]['children'] = $children;
                        $element['children'] = $children;
                    }
                    $branch[] = $element;
                }
            }
        }
        return $branch;
    }
	
	
	public function reContent($content)
	{
		preg_match_all('/\{\{(.*?)\}\}/i',$content,$new_content);
		foreach($new_content[1] as $v)
		{	
			$content = preg_replace("/{{ ".trim($v)." }}/i",view($v),$content);
		}
		return $content;
	}
}