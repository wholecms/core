<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 13.8.2015
 * Time: 02:41
 */

//$this->user->find($this->auth->user()->id)->hasRole(1)

require __DIR__.'/../../bootstrap/autoload.php';
$app = require_once __DIR__.'/../../bootstrap/app.php';

$app->make('Illuminate\Contracts\Http\Kernel')
    ->handle(Illuminate\Http\Request::capture());
$user = $app->make('Whole\Core\Repositories\User\UserRepository');

$isAuthorized = Auth::check();
if (!$isAuthorized){
    header('location:'.URL::route('admin.login'));
    exit("Erişim Engellendi");
}else{
    if (!($user->find(Auth::user()->id)->hasRole(1)))
    {
        header('location:'.URL::route('admin.login'));
        exit("Erişim Engellendi");
    }
}
