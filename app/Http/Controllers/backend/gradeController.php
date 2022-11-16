<?php

namespace App\Http\Controllers\backend;

use App\Models\StudentData;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class gradeController extends Controller
{
    public function index()
    {
        return view('backend.grade.grade');
    }
    public function getSome($user_id)
    {
        try {
            $data = studentData::find($user_id);
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
        try {
            $data = studentData::create([
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
                'error' => $e
            ]);
        }
    }
    public function update(Request $request)
    {
        try {
            foreach ($request->all() as $data) {
                $data = DB::table('studentdata')->where('name', $data[]);

                $data->name = $request->name;
                $data->email = $request->email;
                $data->username = $request->username;
                $data->can_dograde = $request->can_dograde;
                $data->can_manage_user = $request->can_manage_user;
                $data->updated_at = Carbon::now();
                $data->save();
            }


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
            studentData::destroy($user_id);
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
            $data = studentData::find($user_id);
            return response()->json($data->name);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
}
