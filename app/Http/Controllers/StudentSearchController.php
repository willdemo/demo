<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\StudentList;
use App\Http\Resources\ClassroomList;



class StudentSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
    { 
 	
    	if($request->classroom_id) {
    		$classroom= Classroom::find($request->classroom_id);
    		if ($classroom) {
    			return new ClassroomList($classroom);
    		} else {
    			return response()->json([
    					'data' =>"Data no found !"
    			],Response::HTTP_OK);
    		}
    	};
    	
    	if ($request->school_id) {
    		$classroom= Classroom::where('school_id','=',$request->school_id)->get();
    		if (count($classroom)) {
    			return ClassroomList::collection($classroom);
    		} else {
    			return response()->json([
    					'data' =>"Data no found !"
    			],Response::HTTP_OK);
    		}
    	}
    	
    	if ($request->first_name) {
    		$students=Student::where('first_name','=',$request->first_name)->get();
    		if (count($students)) {
    			return StudentList::collection($students);
    		} else {
    			return response()->json([
    					'data' =>"Data no found !"
    			],Response::HTTP_OK);
    		}
    	}
    	
    	if ($request->last_name) {
    		$students=Student::where('last_name','=',$request->last_name)->get();
    		if (count($students)) {
    			return StudentList::collection($students);
    		} else {
    			return response()->json([
    					'data' =>"Data no found !"
    			],Response::HTTP_OK);
    		}
    	}

    }
 
}
