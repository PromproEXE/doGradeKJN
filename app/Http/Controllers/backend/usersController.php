<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class usersController extends Controller
{
    public function index()
    {
        return view('backend.users.users');
    }

    public function all_data()
    {
        try {
            $data = User::all();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function getSome($user_id)
    {
        try {
            $data = User::find($user_id);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'forbidden',
                'message' => $validator->getMessageBag()
            ]);
        }
        try {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $data->save();

            return response()->json([
                'message' => "INSERT SUCCESS",
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e->getMessage()
            ]);
        }
    }
    public function update(Request $request, $user_id)
    {
        //VALIDATE REQUEST
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'forbidden',
                'message' => $validator->getMessageBag()
            ]);
        }

        //RETURN ERROR IF HAS PASSWORD BUT EMPTY
        // if ($request->has('password') && $request->password == '') {
        //     return response()->json([
        //         'status' => 'forbidden',
        //         'message' => [
        //             'password' => ["The password field is required"]
        //         ]
        //     ]);
        // }

        //UPDATE
        try {
            $data = User::find($user_id);

            $data->name = $request->name;
            $data->email = $request->email;
            $data->username = $request->username;
            $data->can_dograde = $request->can_dograde;
            $data->can_manage_user = $request->can_manage_user;
            $data->updated_at = Carbon::now();

            //CHECK REQUEST HAS PASSWORD
            if ($request->has('password') && $request->password != '') {
                $data->password = Hash::make($request->password);
            }

            $data->save();

            return response()->json([
                'message' => "UPDATE SUCCESS",
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function delete($user_id)
    {
        try {
            User::destroy($user_id);
            return response()->json([
                'message' => "DELETE SUCCESS",
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_name($user_id)
    {
        try {
            $data = User::find($user_id);
            return response()->json($data->name);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
}
