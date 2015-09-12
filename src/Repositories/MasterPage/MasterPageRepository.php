<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 6.8.2015
 * Time: 23:04
 */

namespace Whole\Core\Repositories\MasterPage;
use Laracasts\Flash\Flash;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\MasterPage;
use Whole\Core\Repositories\MasterPage\MasterPageFieldRepository;
use Whole\Core\Repositories\MasterPage\MasterPageHiddenFieldRepository;
use Whole\Core\Logs\Facade\Logs;
class MasterPageRepository extends Repository
{
    protected $master_page_field;
    protected $master_page_hidden_field;

    /**
     * @param MasterPage $master_page
     * @param MasterPageFieldRepository $master_page_field
     * @param MasterPageHiddenFieldRepository $master_page_hidden_field
     */
    public function __construct(MasterPage $master_page, MasterPageFieldRepository $master_page_field, MasterPageHiddenFieldRepository $master_page_hidden_field)
    {
        $this->model = $master_page;
        $this->master_page_field = $master_page_field;
        $this->master_page_hidden_field = $master_page_hidden_field;
    }


    public function getMasterPage()
    {
        return $this->model->with('template','hiddenFields')->first();
    }


    public function first()
    {
        return $this->model->first();
    }

    public function templateFields($id)
    {
        return $this->model->find($id)->templateFields;
    }


    public function select($id)
    {

        return $this->model->with('template','hiddenFields')->find($id);
    }

    public function all()
    {
        return $this->model->with('template')->get();
    }


    public function create($data)
    {
        try
        {
            $master_page = $this->model->create(['template_id'=>$data['template'],'name'=>$data['name']]);
        }
        catch (\Exception $e)
        {
            return ['false','Bir Hata Meydana Geldi ve İçerik Sayfası Kaydedilemedi'];
        }
        if (isset($data['field']) && count($data['field'])>0)
        {
            foreach($data['field'] as $field)
            {
                $hidden_field[] = ['master_page_id'=>$master_page->id,'field_name'=>$field];
            }
            try
            {
                $this->model->hiddenFields()->attach($hidden_field);
            }
            catch (\Exception $e)
            {
                $this->model->find($master_page->id)->delete();
                return ['false','Bir Hata Meydana Geldi ve İçerik Alanları Kaydedilemedi İşleminiz İptal Edildi'];
            }

        }

        if(!$this->master_page_field->create($data,$master_page->id))
        {
            $this->model->find($master_page->id)->delete();
            return ['false','Bir Hata Meydana Geldi ve İçerik Alan Detaylarınız Eklenemedi İşleminiz İptal Edildi'];
        }
        Logs::add('process',"Master Page Oluşturuldu");
        Flash::success('Başarıyla Kaydedildi');
        return 'true';
    }




    public function update($data,$id)
    {

        try
        {
            $master_page = $this->model->find($id)->update(['template_id'=>$data['template'],'name'=>$data['name']]);
            $this->master_page_hidden_field->deleteAll();
//            $this->model->destroy($id);
//            $master_page = $this->model->create(['template_id'=>$data['template'],'name'=>$data['name']]);
//            $id = $master_page->id;
        }
        catch (\Exception $e)
        {
            return ['false','Bir Hata Meydana Geldi ve İçerik Sayfası Güncellenemedi'];
        }

        if (isset($data['field']) && count($data['field'])>0)
        {
            foreach($data['field'] as $field)
            {
                $hidden_field[] = ['master_page_id'=>$id,'field_name'=>$field];
            }

            try
            {
                $this->model->hiddenFields()->sync($hidden_field);
            }
            catch (\Exception $e)
            {
                //$this->model->find($content_page->id)->delete();
                return ['false','Bir Hata Meydana Geldi ve İçerik Alanları Güncellenemedi İşleminiz İptal Edildi'];
            }
        }


        if(!$this->master_page_field->update($data,$id))
        {
            //$this->model->find($content_page->id)->delete();
            return ['false','Bir Hata Meydana Geldi ve İçerik Alan Detaylarınız Güncellenemedi İşleminiz İptal Edildi'];
        }
        Logs::add('process',"Master Page Güncellendi");
        Flash::success('Başarıyla Kaydedildi');
        return 'true';

    }



}