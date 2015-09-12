<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class PermittedPage extends Model
{
    protected $fillable = ['role_id','path','access','process'];
}
