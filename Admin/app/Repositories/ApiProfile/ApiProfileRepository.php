<?php

namespace App\Repositories\ApiProfile;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use \App\Models\User;

class ApiProfileRepository extends BaseRepository implements ApiProfileRepositoryInterface
{
    //get the corresponding model
    public function getModel()
    {
        return User::class;
    }

    public function createProfile($request)
    {
        $user =  $this->model->find($request->id);
        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'education' => $request->education,
            'location' => $request->location,
            'skills' => $request->skills,
            'birthday' => $request->birthday,
            'notes' => $request->notes,
        ];

        $getImage = $request->file('avatar_url');
        if ($getImage) {
            $nameImage = $getImage->getClientOriginalName();
            $newNameImage = time() . $nameImage;
            $getImage->move('upload', $newNameImage);
        } else {
            $newNameImage = '';
        }

        $dataInsert['avatar_url'] = $newNameImage;
        $user->update($dataInsert);
        $user = $this->model->find($request->id);
        return $user;
    }

    public function showProfile($id) {
        $user = $this->model->find($id);
        return $user;
    }
}