<?php

namespace App\Http\Controllers\backend;

use App\Models\SubjectList;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class subjectListController extends Controller
{
    public function index()
    {
        return view('backend.subjectList.subjectList');
    }

    public function all_data()
    {
        try {
            $data = SubjectList::all();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function getSome($subject_id)
    {
        try {
            $data = SubjectList::find($subject_id);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e->getMessage()
            ]);
        }
    }
    public function store(Request $request)
    {
        try {
            $db = SubjectList::create([
                'subject_id' => $request->subject_id,
                'class' => $request->class,
                'subject_name' => $request->subject_name,
                'teach_by' => $request->teach_by,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $db->save();

            return response()->json([
                'message' => "INSERT SUCCESS",
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function update(Request $request, $subject_id)
    {
        try {
            //GET DATA
            $data = SubjectList::find($subject_id);

            //PREPARE UPDATE
            $data->subject_id = $request->subject_id;
            $data->class = $request->class;
            $data->subject_name = $request->subject_name;
            $data->teach_by = $request->teach_by;
            $data->updated_at = Carbon::now();

            //UPDATED
            $data->save();

            //RESPONSE TO FRONTEND
            return response()->json([
                'message' => "UPDATE SUCCESS",
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e->getMessage()
            ]);
        }
    }
    public function delete($subject_id)
    {
        try {
            SubjectList::destroy($subject_id);
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
    public function get_single_col_name($subject_id)
    {
        try {
            $data = SubjectList::find($subject_id);
            return response()->json($data->name);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_class($subject_id)
    {
        try {
            $data = SubjectList::find($subject_id);
            return response()->json($data->class);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_teach_by($subject_id)
    {
        try {
            $data = SubjectList::find($subject_id);
            return response()->json($data->teach_by);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
}
