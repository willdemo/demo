<?php
namespace App\Http\Controllers;

use App\Http\Resources\StudentList;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Symfony\Component\HttpFoundation\Response;



class StudentController extends Controller
{
	/* 
	 * No required in the assignment, it should use Passport package to control users access to store, update,and destroy methods! 
	 
	public function __construct()
	{
		$this->middleware('auth:api')->except('index','show');
	}
	*/
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return StudentList::collection(Student::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//apiResource: do not need the method
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
    	$student= new Student;
    	$student->student_number= $request->student_number;
    	$student->first_name= $request->first_name;
    	$student->last_name= $request->last_name;
    	$student->classroom_id= $request->classroom_id;
    	$student->save();
    	return response([
    			'data' => $student
    	],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$student= Student::find($id);
    	return response([
    			'data' =>$student
    	],Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	//apiResource: do not need the method
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$student= Student::find($id);
    	if ($request->first_name) {
    		$student->first_name= $request->first_name;
    	}
    	if ($request->last_name) {
    		$student->last_name= $request->last_name;
    	}
    	if ($request->classroom_id) {
    		$student->classroom_id= $request->classroom_id;
    	}
    	$student->save();
    	return response([
    			'data' =>$student
    	],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$student= Student::find($id);
    	$student->delete();
    	return response([
    			'data' => $student
    	],Response::HTTP_OK);
    }
    

}
