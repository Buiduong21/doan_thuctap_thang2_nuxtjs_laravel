<?php

namespace App\Services;

use App\Repositories\user\UserRepositoryInterface;

class UserService extends BaseService
{
    public function getRepository()
    {
        return UserRepositoryInterface::class;
    }

    public function  updateUser($id, $request)
    {
        return $this->repository->updateUser($id, $request);
    }

    public function  changePassword($id, $request)
    {
        return $this->repository->changePassword($id, $request);
    }

    public function checklogin($req)
    {
        return $this->repository->checklogin($req);
    }

    public function gui_dangky($request){
        return $this->repository->gui_dangky($request);
    }
}