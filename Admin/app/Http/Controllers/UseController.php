<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserService;

class UseController extends Controller
{
    protected $userService;

    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    // Show page login admin
    public function login()
    {
        return view('admin.login');
    }

    // Check login admin
    public function  checklogin(Request $req)
    {   
        $auth = $this->userService->checklogin($req);
        if ($auth){  
        return redirect()->route('category.index')->with('ok', 'Chào mừng trở lại');
        }
        return redirect()->back()->with('no', 'Đăng nhập thất bại');
        return view('admin.login');
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('category.index');
    }
    /**
     * Show page register
     */
    public function dangky()
    {
        return view('use.dangky');
    }

    // Create new user
    public function gui_dangky(Request $request)
    {
        $user = $this->userService->gui_dangky($request);
        if ($user) {
            return redirect()->route('use.homeUse');
        } else {
            return redirect()->back();
        };
    }

    // Show page user login
    public function loginuse()
    {
        return view('use.login');
    }

    // User login
    public function post_loginuse(Request $request)
    {
        $data = $request->only('email', 'password');
        $check = auth()->guard('web')->attempt($data);
        return response()->json($data, 200);
        if ($check) {
            return redirect()->route('use.homeUse');
        }
    }

    // Logout user
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('use.login');
    }

    //Show page profile
    public function profile()
    {
        $user = auth()->guard('')->user();
        return view('use.profile', compact('user'));
    }

    // Update profile user 
    public function postProfile($id, Request $request)
    {
        $this->userService->updateUser($id, $request);
        return redirect()->route('use.profile');
    }

    // // Show page change Password
    public function getPassword()
    {
        return view('use.get_password');
    }

    // Update new password
    public function changePassword($id, Request $request)
    {
        $this->userService->changePassword($id, $request);
        return back();
    }
}