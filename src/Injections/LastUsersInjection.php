<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 3.9.2015
 * Time: 01:15
 */

namespace Whole\Core\Injections;
use Whole\Core\Repositories\User\UserRepository;

class LastUsersInjection
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function lastUsers()
    {
        return $this->user->lastUsers(5);
    }
}