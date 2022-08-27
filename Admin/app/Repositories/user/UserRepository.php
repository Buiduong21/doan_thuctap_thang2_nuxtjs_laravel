<?php

namespace App\Repositories\user;

use App\Repositories\BaseRepository;
use App\Traits\StorageImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    // Lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    // Cập nhập hồ sơ người dùng
    public function updateUser($id, $request)
    {
        $user =  $this->model->find($id);
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
        return $user->update($dataInsert);
    }

    // Khai bao ham doi mat khau  
    public function changePassword($id, $request)
    {
        $request->validate([
            'password' => 'required|min:6|max:10',
            'new_password' => 'required|min:6|max:10',
            're_password' => 'required|same:new_password'
        ]);

        $data = $request->all();
        $user = $this->find($id);

        if (Hash::check($data['password'], $user->password)) {
            $data['password'] = Hash::make($request->new_password);
            $this->update($id, $data);
            Session::flash('success', 'Password was changed successfully');
        } else {
            Session::flash('fail', 'Password incorrect!!!');
        }
    }


    //check login Admin
    public function checklogin($req)
    {
      $error = $req->validate([
            'email' => 'required',
            'password' => 'required',   
        ], [
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
        ]);

        $data = $req->only('email','password');
        $check = Auth()->attempt($data);   
        return $check; 
    }

    //post rigester
    public function gui_dangky($request){
        $request->validate(
            [
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ],
            [
                'password.require' => 'Mật khẩu không được để trống',
                'confirm_password.same' => 'Xác nhận mật khẩu chưa giống nhau'
            ]
        );
        $data = $request->only('name', 'email');
        $data['password'] = bcrypt($request->password);
        return $this->model->create($data);
    }
}