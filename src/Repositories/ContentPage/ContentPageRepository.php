<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 17.8.2015
 * Time: 04:01
 */

namespace Whole\Core\Repositories\ContentPage;
use Laracasts\Flash\Flash;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\ContentPage;
use Whole\Core\Repositories\ContentPage\ContentPageFieldRepository;
use Whole\Core\Repositories\ContentPage\ContentPageHiddenFieldRepository;
use Whole\Core\Logs\Facade\Logs;

class ContentPageRepository extends Repository
{

    protected $content_page_field;
    protected $content_page_hidden_field;

    /**
     * @param ContentPage $content_page
     * @param ContentPageFieldRepository $content_page_field
     * @param ContentPageHiddenFieldRepository $content_page_hidden_field
     */
    public function __construct(ContentPage $content_page, ContentPageFieldRepository $content_page_field, ContentPageHiddenFieldRepository $content_page_hidden_field)
    {
        $this->model = $content_page;
        $this->content_page_field = $content_page_field;
        $this->content_page_hidden_field = $content_page_hidden_field;
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
            $content_page = $this->model->create(['template_id'=>$data['template'],'name'=>$data['name']]);
        }
        catch (\Exception $e)
        {
            return ['false','Bir Hata Meydana Geldi ve İçerik Sayfası Kaydedilemedi'];
        }

        if (isset($data['field']) && count($data['field'])>0)
        {
            foreach($data['field'] as $field)
            {
                $hidden_field[] = ['content_page_id'=>$content_page->id,'field_name'=>$field];
            }
            try
            {
                $this->model->hiddenFields()->attach($hidden_field);
            }
            catch (\Exception $e)
            {
                $this->model->find($content_page->id)->delete();
                return ['false','Bir Hata Meydana Geldi ve İçerik Alanları Kaydedilemedi İşleminiz İptal Edildi'];
            }
        }

        if(!$this->content_page_field->create($data,$content_page->id))
        {
            $this->model->find($content_page->id)->delete();
            return ['false','Bir Hata Meydana Geldi ve İçerik Alan Detaylarınız Eklenemedi İşleminiz İptal Edildi'];
        }

        Flash::success('Başarıyla Kaydedildi');
        Logs::add('process',"İçerik Sayfası Oluşturuldu\n ID:{$content_page->id}");
        return 'true';

    }




    public function update($data,$id)
    {
        try
        {
            $content_page = $this->model->find($id)->update(['template_id'=>$data['template'],'name'=>$data['name']]);
            $this->content_page_hidden_field->deleteAll();
        }
        catch (\Exception $e)
        {
            return ['false','Bir Hata Meydana Geldi ve İçerik Sayfası Güncellenemedi'];
        }

        if (isset($data['field']) && count($data['field'])>0)
        {
            foreach($data['field'] as $field)
            {
                $hidden_field[] = ['content_page_id'=>$id,'field_name'=>$field];
            }

            try
            {
//                $this->model->hiddenFields()->detach();
                $this->model->hiddenFields()->sync($hidden_field);

            }
            catch (\Exception $e)
            {
                //$this->model->find($content_page->id)->delete();
                return ['false','Bir Hata Meydana Geldi ve İçerik Alanları Güncellenemedi İşleminiz İptal Edildi'];
            }
        }

        if(!$this->content_page_field->update($data,$id))
        {
            //$this->model->find($content_page->id)->delete();
            return ['false','Bir Hata Meydana Geldi ve İçerik Alan Detaylarınız Güncellenemedi İşleminiz İptal Edildi'];
        }

        Logs::add('process',"İçerik Sayfası Düzenlendi\n ID:{$id}");
        Flash::success('Başarıyla Kaydedildi');
        return 'true';

    }


}