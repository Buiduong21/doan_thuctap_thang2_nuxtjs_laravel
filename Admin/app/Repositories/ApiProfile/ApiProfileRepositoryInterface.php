<?php

namespace App\Repositories\ApiProfile;

use App\Repositories\RepositoryInterface;

interface ApiProfileRepositoryInterface extends RepositoryInterface
{
   public function createProfile($request);

   public function showProfile($id);
}