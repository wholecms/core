<?php

namespace Whole\Core\Http\Controllers\Admin;


use Whole\Core\Logs\Facade\Logs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{


    public function login()
    {
        return view('backend::login.login');
    }

    public function loginAction(Request $request)
    {
        Cache::forget('role_id');
        Cache::forget('this_user');
        $remember = $request->get('remember');
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $remember))
        {
            Logs::add('login',$request->get('email').' Başarıyla Giriş Yaptı');
            return redirect()->route('admin.index');
        }else
        {
            Logs::add('login',"Giriş Yapılamadı! \n Bilgiler:\nEmail: ".$request->get('email')."\nŞifre: ".$request->get('password'));
            Flash::error('Yönetici Bulunamadı!');
            return redirect()->route('admin.login');
        }
    }


    public function logout()
    {
        Cache::forget('role_id');
        Cache::forget('this_user');
        Logs::add('process','Kullanıcı Çıkış Yaptı');
        Auth::logout();
        return redirect()->route('master_page');
    }

}
