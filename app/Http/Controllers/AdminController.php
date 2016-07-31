<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Qualification;
use App\Student;
use App\Grade;
use App\Admin;
use App\Subject;
use Validator;
use Response;
use DB;
use Carbon\Carbon;
use PushNotification;
use App\AcceptTutor;
use App\Location;
use Auth;
use Excel;

class AdminController extends Controller
{
 	public function index()
    {
        return view('admin.pages.login')->with([
            'title' => "Admin login",
        ]);
    } 

    public function postLogin(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials  = [
            'username'  =>   $request->input('username'),
            'password'  =>   $request->input('password'),
        ];

        $auth = auth()->guard('admin');

        if(!$auth->attempt($credentials)) {
            return redirect('admin/login')
                ->with('info','<div class="alert alert-danger">Could not sign you in with those details.</div>');
        }
        else{
            return redirect('admin/dashboard');
        }
    }

    public function dashboard()
    {
        $grade = Grade::all();
        return view('admin.pages.grades')->with([
            'title' => "Admin login",
            'grade' => $grade,
        ]);
    }  

    public function allGrade()
    {
        $grade = Grade::all();
        return view('admin.pages.grades')->with([
            'title' => "Admin login",
            'grade' => $grade,
        ]);
    } 

    public function allparent()
    {
        $user = User::where('user_type_id','2')->orderBy('id','desc')->get();
        return view('admin.pages.parent')->with([
            'title' => "Admin login",
            'user' => $user,
        ]);
    }  

    public function allTutor()
    {
        $tutor = User::where('user_type_id','1')->orderBy('id','desc')->get();
        return view('admin.pages.tutor')->with([
            'title' => "Admin login",
            'tutor' => $tutor
        ]);
    }  

    public function allSubject()
    {
        $subject = Subject::all();
        return view('admin.pages.subject')->with([
            'title' => "Admin login",
            'subject' => $subject
        ]);
    }

    public function student($id)
    {
        $student = Student::where('parent_id',$id)->get();
        return view('admin.pages.student')->with([
            'title' => "Admin login",
            'student' => $student
        ]);
    }

    public function managehome(){

        $content = DB::table('contents')->get();
        return view('admin.pages.managehome')->with([
            'title' => "Admin login",
            'content' => $content,
        ]);
    }

    public function postTabContent(Request $request){

        DB::table('contents')
            ->where('id', 1)
            ->update([
                'about_tabone' => $request->input('about_tabone'),
                'about_tabtwo' => $request->input('about_tabtwo'),
                'about_tabthree' => $request->input('about_tabthree'),
                'about_tabone_heading' => $request->input('about_tabone_heading'),
                'about_tabtwo_heading' => $request->input('about_tabtwo_heading'),
                'about_tabthree_heading' => $request->input('about_tabthree_heading'),
                ]);
            
        return redirect('admin/manage-home');
    }

    public function postTabPrice(Request $request){

        DB::table('contents')
            ->where('id', 1)
            ->update([
                'first_price' => $request->input('first_price'),
                'first_grade' => $request->input('first_grade'),
                'second_price' => $request->input('second_price'),
                'second_grade' => $request->input('second_grade'),
                'third_price' => $request->input('third_price'),
                'third_grade' => $request->input('third_grade'),

                'first_price_link' => $request->input('first_price_link'),
                'second_price_link' => $request->input('second_price_link'),
                'third_price_link' => $request->input('third_price_link'),
                ]);
            
        return redirect('admin/manage-home');
    }

    public function postTabDownloadImage(Request $request){
        if($request->hasFile('downloadimage')){
            $file = $request->file('downloadimage');
            $destination_path = 'uploads/home';
            $filename = str_random(15).'.'.$file->getClientOriginalExtension();

            $file->move($destination_path, $filename);  

            DB::table('contents')
            ->where('id', 1)
            ->update([
                'download_image' => $filename,
                ]);
        }

        return redirect('admin/manage-home');
    }

    public function postTabSlider(Request $request){
        if($request->hasFile('slider_image')){
            $file = $request->file('slider_image');
            $destination_path = 'uploads/home';
            $filename = str_random(15).'.'.$file->getClientOriginalExtension();

            $file->move($destination_path, $filename);  

            DB::table('contents')
            ->where('id', 1)
            ->update([
                'slider_title' => $request->input('slider_title'),
                'slider_content' => $request->input('slider_content'),
                'slider_image' => $filename,
                ]);
        }
        else{
            DB::table('contents')
            ->where('id', 1)
            ->update([
                'slider_title' => $request->input('slider_title'),
                'slider_content' => $request->input('slider_content'),
                ]);
        }

        return redirect('admin/manage-home');   
    }

    public function addParent(){
        return view('admin.pages.add_new_parent')->with([
            'title' => "Admin login",
        ]);
    }

    public function addNewParent(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $user = User::Create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' =>  $request->input('email'),
            'mobile' => $request->input('mobile'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'user_type_id' => 2,
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return redirect('admin/add-parent')
                ->with('info','<div class="alert alert-info">Added Successfully..</div>');
    }

    public function editParent($id){
        $parent = User::find($id);
        return view('admin.pages.edit_parent')->with([
            'title' => "Admin login",
            'content' => $parent,
            'id' => $id,
        ]);
    }

    public function postEditParent(Request $request){
        $id = $request->input('id');
        User::where('id', $id)
          ->update([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'mobile' => $request->input('mobile'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'user_type_id' => 2,
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            ]);

        return redirect('admin/edit-parent/'.$id)
                ->with('info','<div class="alert alert-info">Edited Successfully..</div>');
    }

    public function deleteParent($id){
        $delete = User::find($id)->delete();
        return redirect('admin/parent')
                ->with('info','<div class="alert alert-info">Deleted Successfully..</div>');
    }

    public function addNewGrade(){
        return view('admin.pages.add_grade')->with([
            'title' => "Admin login",
        ]);
    }

    public function postAddNewGrade(Request $request){
        Grade::create([
            'grade' => $request->input('grade')
        ]);

         return redirect('admin/add-grade')
                ->with('info','<div class="alert alert-info">Added Successfully..</div>');
    }

    public function deleteGrade($id){
        $delete = Grade::find($id)->delete();
        return redirect('admin/all-grade')
                ->with('info','<div class="alert alert-info">Deleted Successfully..</div>');
    }

    public function editGrade($id){

        $grade = Grade::find($id);
        return view('admin.pages.edit_grade')->with([
            'title' => "Admin login",
            'grade' => $grade,
        ]);
    }

    public function postEditGrade(Request $request){
        $id = $request->input('id');
        Grade::where('id', $id)
          ->update([
            'grade' => $request->input('grade'),
            ]);

        return redirect('admin/edit-grade/'.$id)
                ->with('info','<div class="alert alert-info">Edited Successfully..</div>');
    }

    public function deleteSubject($id){
        $delete = Subject::find($id)->delete();
        return redirect('admin/subject')
                ->with('info','<div class="alert alert-info">Deleted Successfully..</div>');
    }

    public function addSUbject(){
        $grade = Grade::all();
        return view('admin.pages.add_subject')->with([
            'title' => "Admin login",
            'grade' => $grade,
        ]);
    }

    public function addNewSubject(Request $request){

        Subject::create([
            'subjects' => $request->input('subjects'),
            'grade_id' => $request->input('grade_id'),
        ]);

        return redirect('admin/add-subject')
                ->with('info','<div class="alert alert-info">Added Successfully..</div>');
    }

    public function editSUbject($id){

        $subject = Subject::find($id);
        $grade = Grade::all();

        return view('admin.pages.edit_subject')->with([
            'title' => "Admin login",
            'grade' => $grade,
            'subject' => $subject,
            'id' => $id,
        ]);
    }


    public function postEditSubject(Request $request){
        $id = $request->input('id');
        Subject::where('id', $id)
          ->update([
            'subjects' => $request->input('subjects'),
            ]);

        return redirect('admin/edit-subject/'.$id)
                ->with('info','<div class="alert alert-info">Edited Successfully..</div>');
    }

    public function manageLocation(){
        $location = Location::all();

        return view('admin.pages.location')->with([
            'title' => "Admin login",
            'location' => $location,
        ]);
    }

    public function addLocation(){
        
        return view('admin.pages.add_location')->with([
            'title' => "Admin login",
        ]);
    }

    public function postAddLocation(Request $request){

        Location::Create([
            'location' => $request->input('location')
        ]);

        return redirect('admin/add-location')
                ->with('info','<div class="alert alert-info">Add Successfully..</div>');
    }

    public function editLocation($id){
        $location = Location::find($id);

        return view('admin.pages.edit_location')->with([
            'title' => "Admin login",
            'location' => $location,
            'id' => $id,
        ]);
    }

    public function postEditLocation(Request $request){
        
        $id = $request->input('id');
        Location::where('id', $id)
          ->update([
            'location' => $request->input('location'),
            ]);

        return redirect('admin/edit-location/'.$id)
                ->with('info','<div class="alert alert-info">Edited Successfully..</div>');
    }

    public function deleteLocation($id){
        $delete = Location::find($id)->delete();
        return redirect('admin/manage-location')
                ->with('info','<div class="alert alert-info">Deleted Successfully..</div>');
    }


    public function importLocation(){

        return view('admin.pages.import-location')->with([
            'title' => "Admin login",
        ]);
    }

    public function postImportLocation(Request $request){
        if( $request->hasFile('xlsfilename') ){

            $file = $request->file('xlsfilename');
            $destination_path = 'uploads/xlsDocument';
            $filename = str_random(15).'.'.$file->getClientOriginalExtension();
            $file->move($destination_path, $filename);  

        
            $data = Excel::load('uploads/xlsDocument/'.$filename, function($reader) {
            })->get();

            // echo "<pre>",print_r($data),"</pre>";

            foreach ($data as $values) {

                $location_count = Location::where('location',$values->location)->count();

                if($location_count == 0){
                    Location::create([
                        'location' => $values->location,
                    ]);
                }
                
            }

            return redirect('admin/import-location')
                ->with('info','<div class="alert alert-info">Uploaded Successfully..</div>');
        }
    }

    public function importGrade(){

        return view('admin.pages.import-grade')->with([
            'title' => "Admin login",
        ]);

    }

    public function postImportGrade(Request $request){
        if( $request->hasFile('xlsfilename') ){

            $file = $request->file('xlsfilename');
            $destination_path = 'uploads/xlsDocument';
            $filename = str_random(15).'.'.$file->getClientOriginalExtension();
            $file->move($destination_path, $filename);  

        
            $data = Excel::load('uploads/xlsDocument/'.$filename, function($reader) {
            })->get();

            // echo "<pre>",print_r($data),"</pre>";

            foreach ($data as $values) {

                $grade_count = Grade::where('grade',$values->grade)->count();

                if($grade_count == 0){
                    Grade::create([
                        'grade' => $values->grade,
                    ]);
                }
                
            }

            return redirect('admin/import-grade')
                ->with('info','<div class="alert alert-info">Uploaded Successfully..</div>');
        }
    }

     public function importSubject(){

        return view('admin.pages.import-subject')->with([
            'title' => "Admin login",
        ]);

    }

    public function postImportSubject(Request $request){
        if( $request->hasFile('xlsfilename') ){

            $file = $request->file('xlsfilename');
            $destination_path = 'uploads/xlsDocument';
            $filename = str_random(15).'.'.$file->getClientOriginalExtension();
            $file->move($destination_path, $filename);  

        
            $data = Excel::load('uploads/xlsDocument/'.$filename, function($reader) {
            })->get();

            // echo "<pre>",print_r($data),"</pre>";

            foreach ($data as $values) {

                // echo $values->subjects." ".$values->grade_id;
                $subject_count = Subject::where([
                    'subjects' => $values->subjects,
                    'grade_id' => $values->grade_id,
                ])->count();

                if($subject_count == 0){
                    Subject::create([
                        'subjects' => $values->subjects,
                        'grade_id' => $values->grade_id,
                    ]);
                }
                
            }

            return redirect('admin/import-grade')
                ->with('info','<div class="alert alert-info">Uploaded Successfully..</div>');
        }
    }   

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
