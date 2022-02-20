<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use App\Models\Task;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

//get user list
    public function getUserList(Request $request)
    {
        $res = $this->userService->getUserList($request);
        return $res;
    }
    //get user details
    public function getUserDetails($id)
    {
        $res = $this->userService->getUserDetails($id);
        return $res;
    }
    //get update user details
    public function updateUser(Request $request)
    {
        $res = $this->userService->updateUser($request);
        return $res;
    }

//create new user
    public function createUser(Request $request)
    {
        $res = $this->userService->creatUser($request);
        return $res;

    }
}
