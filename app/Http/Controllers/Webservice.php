<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Qualification;
use App\Student;
use Validator;
use Response;
use DB;
use Carbon\Carbon;
use PushNotification;
use App\AcceptTutor;
use App\Demo;
use App\Grade;
use App\Location;
use App\Subject;
use App\Hire;
use App\TakeDemo;
use App\AcceptDemo;
use App\Day;

class Webservice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request){

        $content = json_decode($request->getContent());

        $count_user = User::where('email',$content->email)->count();
        $count_user_mobile = User::where('mobile',$content->mobile)->count();

        $address = str_replace (" ", "+", urlencode($content->address));
        
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$address."&sensor=false";
         
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
         
        // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
        
         
        $geometry = $response['results'][0]['geometry'];
 
        $latitude = $geometry['location']['lat'];

        $longitude = $geometry['location']['lng'];

        // return $latitude." ".$longitude;

        if($count_user == 0){

            if($count_user_mobile == 0){

                if($content->user_type_id=='1'){
                
                    $base = $content->image;
                    $filename = $content->filename;

                    $binary = base64_decode($base);

                    header('Content-Type: bitmap; charset=utf-8');

                    $file = fopen(public_path('uploads/profiles').'/'.$filename,'wb');
                    
                    $user = User::Create([
                        'name' => $content->name,
                        'profile_image' => $filename,
                        'email' =>  $content->email,
                        'mobile' => $content->mobile,
                        'dob' => $content->dob,
                        'gender' => $content->gender,
                        'address' => $content->address,
                        'user_type_id' => $content->user_type_id,
                        'device_id' => $content->device_id,
                        'device_type' =>$content->device_type,
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                        'gcm_id' => $content->gcm_id,
                    ]);

                    return Response::json([
                        'info' => [[
                                    'success' => true,
                                    'message' => 'Account created',
                                    'user_id' => $user->id,
                                ]]
                    ]);
                }
                else if($content->user_type_id=='2'){
            
                    $user = User::Create([
                        'name' => $content->name,
                        'email' =>  $content->email,
                        'mobile' => $content->mobile,
                        'dob' => $content->dob,
                        'gender' => $content->gender,
                        'address' => $content->address,
                        'user_type_id' => $content->user_type_id,
                        'device_id' => $content->device_id,
                        'device_type' =>$content->device_type,
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                        'gcm_id' => $content->gcm_id,
                    ]);

                    return Response::json([
                        'info' => [[
                                    'success' => true,
                                    'message' => 'Account created',
                                    'user_id' => $user->id,
                                ]]
                    ]);
                }
            }
            else{
                return Response::json([
                    'info' => [[
                                'success' => false,
                                'message' => 'Mobile number already exist'
                            ]]
                ]);
            }
            
        }
        else
        {
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Email already exist'
                        ]]
            ]);
        }
    }

    /*public function login(Request $request){
        $content = json_decode($request->getContent());

        $email = $content->email;
        $password = $content->password;
        $device_id = $content->device_id;
        $gcm_id = $content->gcm_id;

        $credentials  = [
            'email'  =>   $email,
            'password'  =>   $password,
        ];
        $auth = auth()->guard('web');
        
        if(!$auth->attempt($credentials)) {

            
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Failed cyrus_authenticate(connection)'
                        ]]
            ]);

        }
        else{
            
            $user = User::find(auth()->guard('web')->user()->id);
            
            $user->update([
                'device_id' => $device_id,
                'gcm_id' => $gcm_id,
            ]);

            return Response::json([
                'info' => [[
                            'success' => true,
                            'message' => 'Successfully login',
                            'user_id' => auth()->guard('web')->user()->id
                        ]]
            ]);
        }


        // return $count_user;
    }*/

    public function insertPassword(Request $request){

        $content = json_decode($request->getContent());
        $count_user = User::where('id',$content->user_id)->count();
    
        if($count_user == 1){

            $user = User::find($content->user_id);
            
            $user->update([
                'password' => bcrypt($content->password),  
            ]);

            return Response::json([
                'info' => [[
                            'success' => true,
                            'message' => 'Account created',
                            'user_id' => $user->id,
                        ]]
            ]);
        }
        else
        {
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Error Occured'
                        ]]
            ]);
        }
    }

    public function login(Request $request){
        $content = json_decode($request->getContent());

        $email = $content->email;
        $password = $content->password;
        $device_id = $content->device_id;
        $gcm_id = $content->gcm_id;

        $credentials  = [
            'email'  =>   $email,
            'password'  =>  $password,
        ];

        $auth = auth()->guard('web');
        
        if(!$auth->attempt($credentials)) {
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Email or password is incorrect'
                        ]]
            ]);
        }
        else{
            $user = User::find(auth()->guard('web')->user()->id);
            
            $user->update([
                'device_id' => $device_id,
                'gcm_id' => $gcm_id,
            ]);

            return Response::json([
                'info' => [[
                            'success' => true,
                            'message' => 'Successfully login',
                            'user_id' => auth()->guard('web')->user()->id
                        ]]
            ]);
        }
    }

    public function updateQualifications(Request $request)
    {
        $content = json_decode($request->getContent());

        $check_user = User::where('id',$content->user_id)->count();

        if($check_user==1) 
        {
            $count_user = Qualification::where('user_id',$content->user_id)->count();
            if($count_user== 1) {

                Qualification::where('user_id',$content->user_id)->update([
                    // 'qualifications' => $content->qualifications,
                    'tenth_marks' => $content->tenth_marks,
                    'twelfth_marks' => $content->twelfth_marks,
                    'college' => $content->college,
                    'course' => $content->course,
                    'batch' => $content->batch
                ]);

                return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Qualification Update'
                            ]]
                ]);
            }

            else
            {
                $qualification = Qualification::Create([
                    'user_id' => $content->user_id,
                    // 'qualifications' => $content->qualifications,
                    'tenth_marks' => $content->tenth_marks,
                    'twelfth_marks' => $content->twelfth_marks,
                    'college' => $content->college,
                    'course' => $content->course,
                    'batch' => $content->batch
                ]);

                return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Qualification Update'
                            ]]
                ]);
            }
        }
        else
        {
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Access Denied'
                        ]]
            ]);
        }    
    }

    public function addStudent(Request $request)
    {
        $content = json_decode($request->getContent());

        $check_user = User::where('id',$content->parent_id)->count();

        if($check_user==1) 
        {
            $qualification = Student::Create([
                'name' => $content->name,
                'parent_id' => $content->parent_id,
                'gender' => $content->gender,
                'dob' => $content->dob,
                'grade' => $content->grade,
                'subjects' => $content->subjects,
                'days' => $content->days,
                'times' => $content->times,
                'location' => $content->location
            ]);

            $days = explode(',', $content->days);

            foreach ($days as $value) {
                Day::create([
                    'student_id' => $qualification->id,
                    'day' => $value,
                ]);
            }

            $this->pushNotificationGCMToTutor($qualification->id,$content->parent_id);   

            return Response::json([
                'info' => [[
                            'success' => true,
                            'message' => 'Student Added'
                        ]]
            ]);
            
        }
        else
        {
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Access Denied'
                        ]]
            ]);
        }
    }

    public function updateStudent(Request $request)
    {
        $content = json_decode($request->getContent());

        $check_user = User::where('id',$content->parent_id)->count();

        if($check_user==1) 
        {
            $count_student = Student::where([
                            'id' => $content->id,
                            'parent_id' => $content->parent_id
                        ])->count();

            if($count_student==1) {
                Student::where('id',$content->id)->update([
                    'name' => $content->name,
                    'parent_id' => $content->parent_id,
                    'gender' => $content->gender,
                    'dob' => $content->dob,
                    'grade' => $content->grade,
                    'subjects' => $content->subjects,
                    'days' => $content->days,
                    'times' => $content->times,
                    'location' => $content->location
                ]);

                return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Student Update'
                            ]]
                ]);
            }
            else
            {
                return Response::json([
                    'info' => [[
                                'success' => false,
                                'message' => 'Access Denied'
                            ]]
                ]);
            }
        }
        else
        {
            return Response::json([
                'info' => [[
                            'success' => false,
                            'message' => 'Access Denied'
                        ]]
            ]);
        }
    }

    public function tutor_request(Request $request){

        $content = json_decode($request->getContent());
        
        $student_id = $content->student_id;
        $parent_id = $content->parent_id;

        // $student = Student::where('id',$student_id)->select('name','gender','dob','subjects','loca');


        $student = DB::table('students')
            ->join('grades', 'students.grade', '=', 'grades.id')
            ->select('students.*','grades.grade')
            ->where('students.id','=',$student_id)
            ->get();

        $parent = User::find($parent_id);

        $data = [
                'student' => $student
                            , 
                'parent' => [
                                $parent
                            ], 
                ];

        return $data;
    }

    /**
    Accept student when tutor click on interested button;

    AcceptTutor act as a interested
    */

    public function accept_student(Request $request){

        $content = json_decode($request->getContent());

        $accept_tutors_count = AcceptTutor::where([
                    'student_id' => $content->student_id,
                    'tutor_id' => $content->tutor_id,
                ])->count();

        if($accept_tutors_count  == 0){

            $user = AcceptTutor::Create([
                    'student_id' => $content->student_id,
                    'tutor_id' => $content->tutor_id,
                ]);

            return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Accepted Successfully'
                            ]]
                ]);
        }
        else{
            return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Accepted Successfully'
                            ]]
                ]);
        }
        
    }

    public function get_student(Request $request){

        $content = json_decode($request->getContent());

        $user_id = $content->user_id;

        $user = User::where('id',$user_id)->get();

        if($user[0]->id == 1){

            $student = DB::table('accept_tutors')
            ->join('students', 'accept_tutors.student_id', '=', 'students.id')
            ->select('students.*')
            ->where('students.id','=',$user_id)
            ->get();

            return Response::json([
                'info' => [[
                                    'user_type' => $user[0]->user_type_id,
                                    'data' => $user,
                                    'student' => $student,
                                ]]
            ]);

        }else{

            $student = Student::where('parent_id',$user_id)->get();

            return Response::json([
                'info' => [[
                                    'user_type' => $user[0]->user_type_id,
                                    'data' => $user,
                                    'student' => $student,
                                ]]
            ]);

        }

        
    }

    public function get_accepted_tutor(Request $request){

        $content = json_decode($request->getContent());

        $student_id = $content->student_id;

        $result = DB::table('accept_tutors')
                        ->join('users', 'accept_tutors.tutor_id', '=', 'users.id')
                        ->select('users.id','users.name','users.profile_image','users.email','users.mobile','users.gender','users.user_type_id','users.dob','users.address','users.device_id','users.device_type','users.gcm_id','users.latitude','users.longitude','accept_tutors.id as actid','accept_tutors.student_id')
                        ->where('accept_tutors.student_id' ,'=',$student_id)
                        ->get();
        /**
            Get Distance
        */

        foreach ($result as $key => $value) {
            $data[] = array(
                'id' => $value->id, 
                'name' => $value->name, 
                'profile_image' => $value->profile_image, 
                'email' => $value->email, 
                'mobile' => $value->mobile, 
                //'password' => $value->password, 
                'user_type_id' => $value->user_type_id, 
                'gender' => $value->gender, 
                'dob' => $value->dob, 
                'address' => $value->address, 
                'device_id' => $value->device_id, 
                'device_type' => $value->device_type, 
                'gcm_id' => $value->gcm_id, 
                'latitude' => $value->latitude, 
                'longitude' => $value->longitude, 
                'time' => $this->geStudentTime($value->student_id), 
                'qualifications' => $this->getTutorQualification($value->id), 
                'distance' => $this->getDistanceAcceptedTutor($student_id,$value->latitude,$value->longitude), 
                );
        }

        return Response::json([
                // 'info' => $result,
                'info' => $data,
                
            ]);
    }

    public function getDistanceAcceptedTutor($student_id,$d_latitude,$d_longitude){
        $student = Student::find($student_id);

        $parent_id = $student->parent_id;

        $user = User::find($parent_id);

        $s_latitude = $user->latitude;
        $s_longitude = $user->longitude;

        /*$details_url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='+$s_latitude.','+$s_longitude+'&destinations='+$d_latitude.','+$d_longitude;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);*/
         
        // echo "<pre>",print_r($response),"</pre>";

        // return $response['rows']['elements']['distance']['text'];
        return '12 km';
    }

    public function getTutorQualification($tutor_id){
        $tutor = Qualification::where('user_id',$tutor_id)
                ->select('qualifications','tenth_marks','twelfth_marks','college','course','batch')->get();
        return $tutor;
    }
    
    public function geStudentTime($student_id){
        $student = Student::find($student_id);
        return $student->times;
    }


    public function profile(Request $request){
        $content = json_decode($request->getContent());
        $id = $content->id;
        $student_id = $content->student_id;


        $user = User::find($id);

        if($user->user_type_id == 1){

            return Response::json([
                // 'info' => $result,
                'info' => [[
                            'tutor' => [$user],
                            'qualifications' => $this->getTutorQualification($id),
                            'days' => $this->getStudentDay($student_id),
                        ]],
                
            ]);

        }
        else{

            return Response::json([
                // 'info' => $result,
                'info' => [$user],
                'days' => [],
                
            ]);

        }

        
    }

    public function getStudentInfo($student_id){
        $student = Student::find($student_id);
        
        return $student;
    }

    public function getStudentDay($student_id){
        $student = Student::find($student_id);
        
        $day = array($student->days);

        $data = '';

        foreach ($day as $value) {

            $timestamp1 = date("d-m-y");
            $timestamp2 = $value;
            /*if($timestamp1 < $timestamp2){
                $data .= $value.",";
            }*/


            /*if(date("d/m/y") > $value){
                $data = array($value);
            }*/
            // $data = array($value);
            $data .= $value.",";
            
        }
        return $data;
    }

    public function demo_tutor(Request $request){

        $content = json_decode($request->getContent());
        
        $student_id = $content->student_id;
        $tutor_id = $content->tutor_id;
        $parent_id = $content->parent_id;

        $demo_count = Demo::where([
            'student_id' => $student_id,
            'tutor_id' => $tutor_id,
            ])->count();

        if($demo_count <= 4 ){

            $demo = Demo::Create([
                    'student_id' => $student_id,
                    'tutor_id' => $tutor_id,
                ]);

            $this->pushNotificationGCMToTutor($student_id,$content->parent_id);

            return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Demo Successfully'
                            ]]
                ]);

        }else{

            return Response::json([
                    'info' => [[
                                'success' => false,
                                'message' => 'Cannot add more 4 demo'
                            ]]
                ]);

        }

        
    }

    public function grade(Request $request){
        
        $demo = Grade::all();

        return Response::json([
                'info' => $demo
            ]);
    }

    public function getStudent(Request $request){

        $content = json_decode($request->getContent());
        
        $grade_id = $content->grade_id;

        $subject = Subject::where('grade_id',$grade_id)->select('subjects')->get();

        $location = Location::all();

        return Response::json([
                'info' => [[
                                    'subject' => $subject,
                                    'location' => $location,
                                ]]
            ]);
    }

    public function getDemoDate(Request $request){
        $content = json_decode($request->getContent());
        
        $student_id = $content->student_id;
        $tutor_id = $content->tutor_id;

        $accepted_count = AcceptTutor::where([
            'student_id' => $student_id,
            'tutor_id' => $tutor_id,
        ])->count();

        if($accepted_count != 0){
            $student = Student::where('id',$student_id)->select('days')->get();

            return Response::json([
                // 'info' => $result,
                'info' => $student,
                
            ]);
        }
    }

    public function hireData(Request $request){

        $content = json_decode($request->getContent());
        
        $student_id = $content->student_id;
        $user_id = $content->user_id;

        $user = User::find($user_id);

        $student = Student::find($student_id);

        if($user->user_type_id == 1){

            if($student_id == 0){
                return Response::json([
                    'info' => [[
                                        'user_type' => 1,
                                        'tutor' => [$user],
                                        'student' => [],
                                    ]]
                ]);
            }else{

                $hire_count = Hire::where([
                'student_id' => $student_id,
                'tutor_id' => $user_id,
                ])->count();

                if($hire_count == 0){
                    $demo = Hire::Create([
                            'student_id' => $student_id,
                            'tutor_id' => $user_id,
                        ]);
                }

                return Response::json([
                    'info' => [[
                                        'user_type' => 1,
                                        'tutor' => [$user],
                                        'student' => [$student],
                                    ]]
                ]);
            }
            
        }
        else{

            return Response::json([
                'info' => [[
                                    'user_type' => 2,
                                    'parent' => [$user],
                                    'student' => [$student],
                                ]]
            ]);

        }

    }

    /**
    When parent goes to tutor profile and click hire
    */

    public function takeDemo(Request $request){
        $content = json_decode($request->getContent());
        
        $student_id = $content->student_id;
        $tutor_id = $content->tutor_id;
        $demo_date = $content->demo_date;

        // echo "<pre>",print_r($this->pushNotificationGCMToDemoTutor($student_id,$tutor_id)),"</pre>";

        $demo_count = TakeDemo::where([
            'student_id' => $student_id,
            'tutor_id' => $tutor_id,
            ])->count();

        if($demo_count < 4 ){

            $demo = TakeDemo::Create([
                    'student_id' => $student_id,
                    'tutor_id' => $tutor_id,
                    'demo_date' => $demo_date
                ]);

            $this->pushNotificationGCMToDemoTutor($student_id,$tutor_id,$demo_date);

            return Response::json([
                    'info' => [[
                                'success' => true,
                                'message' => 'Demo Successfully'
                            ]]
                ]);

        }else{

            return Response::json([
                    'info' => [[
                                'success' => false,
                                'message' => 'Cannot add more demo'
                            ]]
                ]);

        }
    }

    public function demoTutorDate(Request $request){

        $content = json_decode($request->getContent());

        $student_id = $content->student_id;
        $tutor_id = $content->tutor_id;

        $date = TakeDemo::where([
                    'student_id' => $student_id,
                    'tutor_id' => $tutor_id,
                ])
                ->select('demo_date')
                ->get();

        $student = DB::table('take_demos')
                        ->join('students', 'take_demos.student_id', '=', 'students.id')
                        ->join('grades', 'students.grade', '=', 'grades.id')
                        ->join('users', 'students.parent_id', '=', 'users.id')
                        ->select('students.name','students.gender','students.dob','students.grade','students.subjects','students.times','students.location','take_demos.demo_date as days','grades.grade','users.name as parent')
                        ->where('take_demos.student_id' ,'=',$student_id)
                        ->get();


        $parent = DB::table('students')
                        ->join('users', 'students.parent_id', '=', 'users.id')
                        ->select('users.*')
                        ->where('students.id' ,'=',$student_id)
                        ->get();



        /*return Response::json([
                    'info' => $result,
                ]);*/

        $data = [
                'student' => $student, 
                'parent' => $parent, 
                ];

        return $data;

    }

    public function acceptDemo(Request $request){
        $content = json_decode($request->getContent());

        $student_id = $content->student_id;
        $tutor_id = $content->tutor_id;
        // echo "<pre>",print_r($this->pushNotificationGCMToDemoTutor($student_id,$tutor_id)),"</pre>";

        $demo_count = AcceptDemo::where([
            'student_id' => $student_id,
            'tutor_id' => $tutor_id,
            ])->count();

        if($demo_count == 0 ){

            /*$demo = AcceptDemo::Create([
                    'student_id' => $student_id,
                    'tutor_id' => $tutor_id,
                ]);*/

            TakeDemo::where([
                'student_id' => $student_id,
                'tutor_id' => $tutor_id,
                ])
            ->update([
                    'status' => 1
                ]);

            $parent = DB::table('students')
                        ->join('users', 'students.parent_id', '=', 'users.id')
                        ->select('students.parent_id')
                        ->where('students.id' ,'=',$student_id)
                        ->get();

            $this->pushNotificationGCMToDemoTutorAccept($student_id,$tutor_id,$parent[0]->parent_id);

            return Response::json([
                    'info' => [[
                                'success' => true,
                                'data' => $parent[0]->parent_id,
                                'message' => 'Demo accepted successfully'
                            ]]
                ]);

        }else{

            return Response::json([
                    'info' => [[
                                'success' => false,
                                'message' => 'Demo accepted failed'
                            ]]
                ]);

        }
    }

    public function tutorDemoInfo(Request $request){

        $content = json_decode($request->getContent());

        $student_id = $content->student_id;
        $tutor_id = $content->tutor_id;

        $data = DB::table('take_demos')
                        ->join('users', 'take_demos.tutor_id', '=', 'users.id')
                        ->join('students', 'take_demos.student_id', '=', 'students.id')
                        ->select('students.name','students.dob','students.times','students.location','take_demos.demo_date','users.name as tutor_name','users.mobile')
                        ->where('take_demos.tutor_id' ,'=',$tutor_id)
                        ->where('take_demos.student_id' ,'=',$student_id)
                        
                        ->get();

        $parent = DB::table('students')
                        ->join('users', 'students.parent_id', '=', 'users.id')
                        ->select('users.name')
                        ->where('students.id' ,'=',$student_id)
                        
                        ->get();

        if(count($data) != 0){
            foreach ($data as $value) {
                $result = array(
                    'name' => $value->name, 
                    'dob' => $value->dob, 
                    'times' => $value->times, 
                    'location' => $value->location, 
                    'demo_date' => $value->demo_date, 
                    'tutor' => $value->tutor_name, 
                    'mobile' => $value->mobile, 
                    'parent' => $parent[0]->name, 
                    );
            }

            return Response::json([
                    'info' => [$result]
                ]);
        }else{
            return Response::json([
                    'info' => []
                ]);
        }

        /*$data = TakeDemo::where('take_demos')
                    ->where('tutor_id' ,'=',$tutor_id)
                    ->where('student_id' ,'=',$student_id)
                    
                    ->get();*/

        return Response::json([
                    'info' => $result
                ]);
    }

    public function calenderDates(Request $request){

        $content = json_decode($request->getContent());

        $student_id = $content->student_id;
        $user_id = $content->user_id;

        $user = User::find($user_id);

        $date = Day::where('student_id',$student_id)
                    ->select('day as date')
                    ->get();

        return Response::json([
                    
                    'info' => [[
                                'dates' => $date,
                                'user_type' => $user->user_type_id,
                            ]],
                ]);


    }

    public function userSession(Request $request){
        $content = json_decode($request->getContent());

        $student_id = $content->student_id;
        $user_id = $content->user_id;
        $demo_date = $content->demo_date;

        $user = User::find($user_id);

        if($user->user_type_id == 1){
            $student = DB::table('take_demos')
                        ->join('students', 'take_demos.student_id', '=', 'students.id')
                        ->select('students.name','students.gender','students.dob','students.subjects','students.times','students.location','students.image','take_demos.demo_date')
                        ->where('take_demos.student_id' ,'=',$student_id)
                        ->where('take_demos.demo_date' ,'=',$demo_date)
                        
                        ->get();
            return Response::json([
                    
                    'info' => $student,
                ]);
        }
        else{
            $tutor = DB::table('take_demos')
                        ->join('users', 'take_demos.tutor_id', '=', 'users.id')
                        ->join('students', 'take_demos.student_id', '=', 'students.id')
                        ->select('users.*','students.name','students.gender','students.dob','students.subjects','students.times','students.location','students.image','take_demos.demo_date')
                        ->where('take_demos.student_id' ,'=',$student_id)
                        ->where('take_demos.demo_date' ,'=',$demo_date)
                        
                        ->get();

            return Response::json([
                    
                    'info' => $tutor,
                ]);
        }
    }

    public function pushNotificationGCMToTutor($id,$parent_id)
    {
        $teacher_count = User::where('user_type_id',1)->count();
        $teacher = User::where('user_type_id',1)->get();

        if($teacher_count != 0){

            $respJson = array(
                'notification_type' => 'tutor_request',
                'notification_title' => 'New invitation',
                'notification_message' => 'An parent looking for tutor nearby your area',
                'student_id' => $id,
                'parent_id' => $parent_id,
            );
        

            $message = array('message' => $respJson);

            /*$message = PushNotification::Message('message',array(
                
                'notification_type' => 'tutor_request',
                'notification_type' => 'Title',
                'student_id' => $id,
                'parent_id' => $parent_id,
            ));*/

            foreach ($teacher as $value) {
                $gcmToken[] = PushNotification::Device($value->gcm_id);
            }

            $devices = PushNotification::DeviceCollection($gcmToken);

            $collection = PushNotification::app('appNameAndroid')
                        ->to($devices)
                        ->send($message);
        }
        
    }

    public function pushNotificationGCMToDemoTutorAccept($student_id,$tutor_id,$parent_id)
    {
        $parent_count = User::where('id',$parent_id)->count();
        $parent = User::where('id',$parent_id)->get();

        if($parent_count != 0){

            $respJson = array(
                'notification_type' => 'demo_accepted',
                'notification_title' => 'Request Accepted',
                'notification_message' => 'Your demo request accepted by tutor',
                'student_id' => $student_id,
                'parent_id' => $parent_id,
                'tutor_id' => $tutor_id,
            );

            $message = array('message' => $respJson);

            /*$message = PushNotification::Message('message',array(
                
                'notification_type' => 'tutor_request',
                'notification_type' => 'Title',
                'student_id' => $id,
                'parent_id' => $parent_id,
            ));*/

            foreach ($parent as $value) {
                $gcmToken[] = PushNotification::Device($value->gcm_id);
            }

            $devices = PushNotification::DeviceCollection($gcmToken);

            $collection = PushNotification::app('appNameAndroid')
                        ->to($devices)
                        ->send($message);

            return $collection;
        }
        
    }

    public function pushNotificationGCMToDemoTutor($student_id,$tutor_id,$demo_date)
    {
        $tutor = User::where('id',$tutor_id)->get();
        $student = Student::find($student_id);

        $respJson = array(
            'notification_type' => 'demo_request',
            'notification_title' => 'New invitation',
            'notification_message' => 'You have new demo request.',
            'student_id' => $student_id,
            'parent_id' => $student->parent_id,
            'tutor_id' => $tutor_id,
            'demo_date' => $demo_date,
        );
    

        $message = array('message' => $respJson);

        foreach ($tutor as $value) {
            $gcmToken[] = PushNotification::Device($value->gcm_id);
        }

        $devices = PushNotification::DeviceCollection($gcmToken);

        $collection = PushNotification::app('appNameAndroid')
                    ->to($devices)
                    ->send($message);

        return $collection;
        
        
    }




    public function pushNotificationGCMToTutorDemo($id,$parent_id)
    {
        $teacher_count = User::where('user_type_id',1)->count();
        $teacher = User::where('user_type_id',1)->get();

        if($teacher_count != 0){

            $respJson = array(
                'notification_type' => 'tutor_demo',
                'notification_title' => 'New invitation',
                'notification_message' => 'An parent looking for tutor nearby your area',
                'student_id' => $id,
                'parent_id' => $parent_id,
            );
        

            $message = array('message' => $respJson);

            /*$message = PushNotification::Message('message',array(
                
                'notification_type' => 'tutor_request',
                'notification_type' => 'Title',
                'student_id' => $id,
                'parent_id' => $parent_id,
            ));*/

            foreach ($teacher as $value) {
                $gcmToken[] = PushNotification::Device($value->gcm_id);
            }

            $devices = PushNotification::DeviceCollection($gcmToken);

            $collection = PushNotification::app('appNameAndroid')
                        ->to($devices)
                        ->send($message);
        }
        
    }

}
