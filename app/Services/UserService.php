<?php


namespace App\Services;


use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserService
{

    public function creatUser($request)
    {
//        return $request->first_name;
//        $validator = Validator::make($request->all(), [
//            'title' => 'required|unique:tasks',
//            'first_name' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::FAILED,$validator->messages()->first());
//        }
        try {
            $user = new User();
            $user->title = $request->title;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->postcode = $request->postcode;
            $user->picture = $request->picture;
            $user->save();
            return (new GlobalApiResponse())->success('User created Succesfully', 1,$user);

        } catch (\Exception $e) {
            return (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::FAILED, "Something went wrong");

        }

    }

    public function getUserDetails($id)
    {
        $user = User::find($id);
        return (new GlobalApiResponse())->success('User Details', 1, $user);
    }

    public function updateUser($request)
    {

        try {
            $user = User::find($request->id);
            $user->title = $request->title;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->postcode = $request->postcode;
            $user->save();
            return (new GlobalApiResponse())->success('User Updated Succesfully', 1);

        } catch (\Exception $e) {
            return (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::FAILED, "Something went wrong");

        }

    }

    public function getUserList($request)
    {
        $no_of_records_per_page = 5;
        $offset = ($request->per_page - 1) * $no_of_records_per_page;
        $users = User::skip($offset)->take($no_of_records_per_page)->orderBy('created_at', 'DESC')->get();

        $datatable = Datatables::of($users)->rawColumns(['content']);
        return (new GlobalApiResponse())->success('User List', 1, collect($datatable->make(true)->getData()));
    }


}
