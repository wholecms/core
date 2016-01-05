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
use Whole\Core\Repositories\Setting\SettingRepository;

class PageRender {


    private static $render;
    protected $content;
    protected $component_file;
    protected $block;
    protected $page;
    protected $setting;
    protected $id;

    public function __construct(ContentRepository $content, ComponentFileRepository $component_file, BlockRepository $block, PageRepository $page, SettingRepository $setting)
    {
        $this->content = $content;
        $this->component_file = $component_file;
        $this->block= $block;
        $this->page = $page;
        $this->setting = $setting;

    }


    public function renderFields($page_fields,$isCollect=true,$content_page_id=null)
    {
        if(isset($content_page_id))
        {
            $this->id = $content_page_id;
        }

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
                                $_pages[$detay['data_id']]['menu_title'] = $this->reContent($_pages[$detay['data_id']]['menu_title']);
                                $_blocks[$i]['block_detail'][$j]['data'] = $_pages[$detay['data_id']];
                                break;
                            case "content":
                                $_contents[$detay['data_id']]['content'] = $this->reContent($_contents[$detay['data_id']]['content']);
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
                                    if (isset($_pages[$content_page_id]['content']))
                                    {
                                        $_pages[$content_page_id]['content']['content'] = $this->reContent($_pages[$content_page_id]['content']['content']);
                                    }
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
	
	
	public function reContent($text)
	{

        preg_match_all('/\{\{ components::(.*?)\}\}/i',$text,$view);
        preg_match_all('/\{\{ date(.*?)\}\}/i',$text,$date);
        preg_match_all('/\{\{ session.(.*?)\}\}/i',$text,$session);
        preg_match_all('/\{\{ auth.(.*?)\}\}/i',$text,$auth);
        preg_match_all('/\{\{ content::(.*?)::(.*?) }\}/i',$text,$content);
        preg_match_all('/\{\{ page::(.*?)::(.*?) }\}/i',$text,$page);
        preg_match_all('/\{\{ settings::(.*?) }\}/i',$text,$settings);


        if (count($settings[1])>0)
        {
            foreach($settings[1] as $v)
            {
                $text = preg_replace("/{{ settings::".trim($v)." }}/i",$this->reContent($this->setting->first()->{trim($v)}),$text);
            }
        }


        if (count($page[1])>0)
        {
            foreach($page[1] as $k=>$v)
            {
                if($v=="this"){
                    preg_match_all("/(.*?):(.*?):/i",$page[2][$k],$default_text);
                    $default_text = $default_text[2][0];
                    if (isset($this->id))
                    {
                        $default_text = $this->page->find($this->id)->{explode(":",$page[2][$k])[0]};
                    }
                    $text = preg_replace("/{{ page::".trim($v)."::".$page[2][$k]." }}/i",$this->reContent($default_text),$text);
                }
                else{
                    $text = preg_replace("/{{ page::".trim($v)."::".$page[2][$k]." }}/i",$this->reContent($this->page->find($v)->{$page[2][$k]}),$text);
                }
            }
        }

        if (count($content[1])>0)
        {
            foreach($content[1] as $k=>$v)
            {
                $text = preg_replace("/{{ content::".trim($v)."::".$content[2][$k]." }}/i",$this->reContent($this->content->find($v)->{$content[2][$k]}),$text);
            }
        }


        if (count($auth[1])>0)
        {
            foreach($auth[1] as $v)
            {
                if(\Auth::user()===null)
                {
                    $default_text = isset(explode(":",trim($v))[1]) ? explode(":",trim($v))[1]:"";
                }else
                {
                    $default_text = \Auth::user()->{explode(":",trim($v))[0]};
                }
                $text = preg_replace("/{{ auth.".trim($v)." }}/i",$default_text,$text);
            }

        }

        if (count($session[1])>0)
        {
            foreach($session[1] as $v)
            {
                $text = preg_replace("/{{ session.".trim($v)." }}/i",session(trim($v)),$text);
            }
        }


        if (count($date[1])>0)
        {
            foreach($date[1] as $v)
            {
                $v = trim(preg_replace("/\((.*?)\)/i","$1",$v));
                $text = preg_replace("#{{ ".preg_quote("date($v)")." }}#i",date($v),$text);
            }
        }



        if (count($view[1])>0)
        {
            foreach($view[1] as $v)
            {
                $text = preg_replace("/{{ components::".trim($v)." }}/i",view('components::'.trim($v)),$text);
            }
        }



		return $text;
	}
}