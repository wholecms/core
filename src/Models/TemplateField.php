<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateField extends Model
{
    protected $fillable = ['template_id','name','field'];
}
