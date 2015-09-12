<?php

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPageHiddenField extends Model
{
    protected $table = 'content_page_hidden_field';
    protected $fillable = ['content_page_id','field_name'];

}
