<?php

namespace Whole\Core\Http\Controllers\Admin;

use Whole\Core\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends MainController
{
    public function index()
    {
        return view('backend::index.index');
    }
}
