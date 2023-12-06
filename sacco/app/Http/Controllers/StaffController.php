<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    //
    public function index(){
        $data['meta_title']='Staff';
        $data['getRecord'] = User::getAllRecord();
        return  view('admin.staff.list',$data);
    }
    public function add(Request $request){
        $data['meta_title']='Add Staff';
        return view('admin.staff.add');
    }
    public function add_store(Request $request){
        $save = request()->validate([
            'name' => 'required',
            'surename' => 'required',
            
            'email' => 'required|unique:users',
            'is_role' => 'required',
            'password' => 'required',
            
        ]);
        // dd($request->all());
        $save=new User;
        $save->name=trim($request->name);
        $save->lastname=trim($request->lastname);
        $save->surename=trim($request->surename);
        $save->email=trim($request->email);
        $save->mobile_number=trim($request->mobile_number);
        $save->bdo_date=trim($request->bdo_date);
        $save->is_role=trim($request->is_role);

        if(!empty($request->file('profile_image'))){
            $file=$request->file('profile_image');
            $randomstr=Str::random(30);
            $filename=$randomstr. '.' .$file->getClientOriginalName();
            $file->move('image/upload/profile/',$filename);
            $save->profile_image=$filename;
        }
        $save->remember_token=Str::random(30);
        $random_password=$request->password;
        $save->password = Hash::make($random_password);

        
    
    // return 'Email sent successfully!';
        $save->save();
        $save->$random_password=$random_password;
        Mail::to($save->email)->send(new SendMail($save));

        return redirect('admin/staff/list')->with('success','my account sucessfully create');
        

    }
    public function staff_edit(Request $request, $id) {
        $data['meta_title']='Staff Edit';
        $user = User::getSingle($id);
    
        if (!$user) {
            // Handle the case where the user with the given ID is not found.
            return redirect()->route('error_page')->with('error', 'User not found');
            // Replace 'error_page' with the route or view you want to display for this error.
        }
    
        $data['getRecord'] = $user;
        return view('admin.staff.edit', $data);
    }
    public function staff_edit_update(Request $request, $id){
        $save = request()->validate([
            'name' => 'required',
            'surename' => 'required',
            
            // 'email' => 'required|unique:users',
            'is_role' => 'required',
            'password' => 'required',
            
        ]);

        $save= User::getSingle($id);
        $save->name=trim($request->name);
        $save->lastname=trim($request->lastname);
        $save->surename=trim($request->surename);
        $save->email=trim($request->email);
        $save->mobile_number=trim($request->mobile_number);
        $save->bdo_date=trim($request->bdo_date);
        $save->is_role=trim($request->is_role);

        if(!empty($request->file('profile_image'))){
            if(!empty($save->profile_image) && file_exists('image/upload/profile/'.$save->profile_image)){
                unlink('image/upload/profile/'.$save->profile_image);
            }
            $file=$request->file('profile_image');
            $randomstr=Str::random(30);
            $filename=$randomstr. '.' .$file->getClientOriginalName();
            $file->move('image/upload/profile/',$filename);
            $save->profile_image=$filename;
        }
        $save->remember_token=Str::random(30);
        $random_password=$request->password;
        $save->password = Hash::make($random_password);

        
    
    // return 'Email sent successfully!';
        $save->save();
        $save->$random_password=$random_password;
        return redirect('admin/staff/list')->with('success','my account sucessfully update');
    }
    
    public function staff_delete(Request $request, $id){
        $getRecordDelete = User::getSingle($id);
        
        if (!$getRecordDelete) {
            return redirect()->back()->with('error', 'Record not found!');
        }
    
        $getRecordDelete->is_delete = 1;
        $getRecordDelete->save();
    
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
    public function staff_view($id){
        $data['meta_title']='Staff View';
        $data['getRecord']=User::getSingle($id);
        return view('admin.staff.view_staff',$data);
    }
    
}
