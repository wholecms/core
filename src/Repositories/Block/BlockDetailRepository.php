<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 21.8.2015
 * Time: 02:12
 */

namespace Whole\Core\Repositories\Block;
use Laracasts\Flash\Flash;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\BlockDetail;
use Whole\Core\Repositories\Block\BlockRepository;


class BlockDetailRepository extends Repository
{

    protected $block;

    /**
     * @param BlockDetail $block_detail
     * @param BlockRepository $block
     */
    public function __construct(BlockDetail $block_detail, BlockRepository $block)
    {
        $this->model = $block_detail;
        $this->block = $block;
    }

    public function findBlockDetail($id)
    {
        return $this->model->where('block_id',$id)->with('children')->get();
    }



    /**
     * @param $data
     * @param $id
     * @param bool $find_children
     * @param null $parent_id
     * @return array|string
     */
    public function create($data,$id,$find_children=false,$parent_id=null)
    {
        if (!$find_children){
            try {
                $this->model->where('block_id',$id)->delete();
            }
            catch (\Exception $e)
            {
//            Flash::error('Blok Özellikleri Kaydedilirken Hata Meydana Geldi Güncelleme İşlemi İçin Senkronizasyon Yapılamadı ve İşleminiz İptal Edildi');
                return ['false','Blok Özellikleri Kaydedilirken Hata Meydana Geldi Güncelleme İşlemi İçin Senkronizasyon Yapılamadı ve İşleminiz İptal Edildi'];
            }
        }
        if ($find_children==false){$block_items = json_decode($data['block_attribute'],true);}
        else{$block_items = $find_children;}
        foreach($block_items as $item)
        {
            try
            {
                $block_detail = $this->model->create(['top_block_id'=>$parent_id,'block_id'=>$id,'data_id'=>$item['data_id'],'type'=>$item['type']]);
            }
            catch(\Exception $e)
            {
                return ['false','Blok Özellikleriniz Kaydedilemedi Önceki Verileriniz Silinmiş Olabilir'];
            }
            if (isset($item['children'])){
                $this->create(null,$id,$item['children'],isset($block_detail)?$block_detail->id:null);
            }
        }
        if ($find_children==false)
        {
            if ($this->block->editItemJson($data['block_attribute'],$id))
            {
                Flash::success('Blok Özellikleri Başarıyla Kaydedildi');
                return 'true';
            }
            else
            {
                return ['false','Bir Hata Meydana Geldi ve Blok Json Güncellenemedi Verileriniz Silinmiş Olabilir'];
            }

        }

    }


}