<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','title_visibility','status','access','content'];

}
