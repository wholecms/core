<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 6.8.2015
 * Time: 23:08
 */

namespace Whole\Core\Repositories\Role;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\Role;



class RoleRepository extends Repository
{

    /**
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }


}