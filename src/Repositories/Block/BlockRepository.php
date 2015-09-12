<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 10.8.2015
 * Time: 23:42
 */

namespace Whole\Core\Repositories\Block;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Block;


class BlockRepository extends Repository
{


    /**
     * @param Block $block
     */
    public function __construct(Block $block)
    {
        $this->model = $block;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function exceptMe($id)
    {
        return $this->model->whereNotIn('id',[$id])->get();
    }

    public function allStatus()
    {
        return $this->model->where('status',1)->with('blockDetail')->get();
    }


    public function createAttribute($data,$id,$find_children=false,$parent_id=null)
    {
        if ($find_children==false){$block_items = json_decode($data['block_attribute'],true);}
        else{$block_items = $find_children;}
        foreach($block_items as $item)
        {
            if (!isset($item['children'])){
                $block_detail = $this->model->detail()->attach(['top_block_id'=>$parent_id,'block_id'=>$id,'data_id'=>$item['data_id'],'type'=>$item['type']]);
            }
            else
            {
                $this->createAttribute(null,$id,$item['children'],isset($block_detail)?$block_detail->id:null);
            }
        }
//        print_r(json_decode($data['block_attribute'],true));

    }


    public function editItemJson($json,$id)
    {
        try
        {
            return $this->model->find($id)->update(['item_json'=>$json]);
        }
        catch(\Exception $e)
        {
            return false;
        }
    }

}