<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 1.9.2015
 * Time: 00:17
 */

namespace Whole\Core\Logs;


use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Whole\Core\Repositories\User\UserRepository;

class Logs
{
    protected $errors;
    protected $process;
    protected $login;
    protected $auth;
    protected $user;

    public function __construct(Guard $auth,UserRepository $user)
    {
        $this->auth = $auth;
        $this->user = $user;

        $this->errors = storage_path('logs\errors.log');
        $this->login = storage_path('logs\login.log');
        $this->process = storage_path('logs\process.log');

        $this->fileControl([$this->errors,$this->login,$this->process]);
    }

    public function read($type)
    {
        if (isset($this->$type))
        {
            return file_get_contents($this->$type);
        }else
        {
            return false;
        }
    }

    public function getUser()
    {

        if (isset($this->auth->user()->id))
        {
            $user = $this->user->find($this->auth->user()->id);
            return "ID: ".$user->id."\nEmail: ".$user->email;
        }else
        {
            return 'Kullanıcı Yok (Giriş Yapılmamış Olabilir)';
        }
    }

    public function add($type,$msj="")
    {
        if (isset($this->$type))
        {
            $stamp = "\n\nKullanıcı Bilgileri: \n".$this->getUser()."\nTarih: ".Carbon::now()." \n------------------------------------------------------- \n\n\n";
            if (file_put_contents($this->$type,$msj.$stamp.file_get_contents($this->$type)))
            {
                return true;
            }else
            {
                return false;
            }
        }else
        {
            return false;
        }
    }

    public function clear($type="*")
    {
        if (is_array($type))
        {
            foreach($type as $file)
            {
                if (isset($this->$file))
                {
                    file_put_contents($this->$file,'');
                }
            }
            return true;
        }
        else
        {
            if ($type=="*")
            {
                file_put_contents($this->errors,'');
                file_put_contents($this->login,'');
                file_put_contents($this->process,'');
                return true;
            }else
            {
                if (isset($this->$type))
                {
                    file_put_contents($this->$type,'');
                    return true;
                }else
                {
                    return false;
                }
            }
        }
    }

    public function fileControl($files)
    {
        foreach($files as $file)
        {
            if (!file_exists($file))
            {
                touch($file);
            }
        }
    }


}