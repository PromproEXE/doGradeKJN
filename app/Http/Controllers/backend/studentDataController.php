<?php

namespace App\Http\Controllers\backend;

use App\Models\StudentData;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentDataController extends Controller
{
    public function index()
    {
        $html = file_get_contents('https://stackoverflow.com/questions/ask');
        return view('backend.studentData.studentData', $html);
    }

    public function all_data()
    {
        try {
            $data = StudentData::all();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function getSome($std_id)
    {
        try {
            $data = StudentData::find($std_id);
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
            //INSERT DATA
            foreach ($request->all() as $data) {
                //VALIDATE DATA
                $validator = Validator::make($data, [
                    'std_id' => 'required|unique:studentdata',
                    'name' => 'required|unique:studentdata',
                    'class' => 'required',
                    'room' => 'required',
                    'number' => 'required',
                ]);

                //RETURN IF VALIDATE FAIL
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 'forbidden',
                        'message' => $validator->getMessageBag(),
                    ]);
                }

                $db = StudentData::create([
                    'std_id' => $data['std_id'],
                    'name' => $data['name'],
                    'class' => $data['class'],
                    'room' => $data['room'],
                    'number' => $data['number'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                $db->save();
            }

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
    public function update_std(Request $request, $std_id)
    {
        try {
            //GET DATA
            $data = StudentData::find($std_id);

            //PREPARE UPDATE
            $data->std_id = $request->std_id;
            $data->name = $request->name;
            $data->class = $request->class;
            $data->room = $request->room;
            $data->grade_term_1 = $request->grade_term_1;
            $data->grade_term_2 = $request->grade_term_2;
            $data->grade_term_3 = $request->grade_term_3;
            $data->grade_term_4 = $request->grade_term_4;
            $data->grade_term_5 = $request->grade_term_5;
            $data->grade_term_6 = $request->grade_term_6;
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
    public function update_class(Request $request)
    {
        try {
            //UPDATE CLASS
            foreach ($request->all() as $data) {
                //GET DATA
                $preData = StudentData::find($data['std_id']);

                //PREPARE UPDATE
                $preData->std_id = $data['std_id'];
                $preData->name = $data['name'];
                $preData->class = $data['class'];
                $preData->room = $data['room'];
                $preData->grade_term_1 = $data['grade_term_1'];
                $preData->grade_term_2 = $data['grade_term_2'];
                $preData->grade_term_3 = $data['grade_term_3'];
                $preData->grade_term_4 = $data['grade_term_4'];
                $preData->grade_term_5 = $data['grade_term_5'];
                $preData->grade_term_6 = $data['grade_term_6'];
                $preData->updated_at = Carbon::now();

                //UPDATE
                $preData->save();
            }

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
    public function delete_std_id($std_id)
    {
        try {
            StudentData::destroy($std_id);
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
    public function delete_grade($grade)
    {
        try {
            DB::table('studentdata')->where('class', $grade)->delete();
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
    public function get_single_col_name($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->name);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_class($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->class);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_room($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->room);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_grade_term_1($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->grade_term_1);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_grade_term_2($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->grade_term_2);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_grade_term_3($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->grade_term_3);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_grade_term_4($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->grade_term_4);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_grade_term_5($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->grade_term_5);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
    public function get_single_col_grade_term_6($std_id)
    {
        try {
            $data = StudentData::find($std_id);
            return response()->json($data->grade_term_6);
        } catch (Exception $e) {
            return response()->json([
                'status' => "forbidden",
                'error' => $e
            ]);
        }
    }
}
