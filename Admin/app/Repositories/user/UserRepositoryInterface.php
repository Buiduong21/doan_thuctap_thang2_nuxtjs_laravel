<?php

namespace App\Repositories\user;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function checklogin($req);
    public function gui_dangky($request);
    public function updateUser($id, $request);
    public function changePassword($id, $request);
}