<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 5.8.2015
 * Time: 18:34
 */

namespace Whole\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['role_name','permits'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Whole\Core\Models\User');
    }


}
