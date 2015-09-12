<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPageHiddenField extends Model
{
    protected $table = 'master_page_hidden_field';
    protected $fillable = ['master_page_id','field_name'];
    
}
