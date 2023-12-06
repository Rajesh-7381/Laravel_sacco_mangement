<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Loan_Types;
use App\Models\LoanUser;
use App\Models\User;
use App\Models\WebsiteLogoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    //
    public function index(Request $request){
        $data['meta_title']='DashBoard';
        if(Auth::user()->is_role==1){
            $data['getStaffAdminCount']=User::count();
            $data['getloantypesCount']=Loan_Types::count();
            $data['getloanplansCount']=Loan_Types::count();
            $data['getloanCount']=Loan::count();
            $data['getloanuserCount']=LoanUser::count();
            
            return view('admin.dashboard.list',$data);
        }else if(Auth::user()->is_role==0){ //staff
            return view('admin.admin_staff.dashboard',$data);
        }
        
    }
    public function profile(){
        $data2['meta_title']='profile';
        $data['getRecord']=User::find(Auth::user()->id);
        // dd($data['getRecord']);
        return view('admin.profile.update',$data,$data2);
    }
    public function update(Request $request){
        
        $save = request()->validate([
            'name' => 'required',
        'lastname' => 'required',
        'surename' => 'required',
        'email' => 'required|unique:users,email,' . Auth::user()->id,
        'mobile_number' => 'required',
        'bdo_date' => 'required',
        'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload if present
        'password' => 'required',
            
        ]);

        $save= User::find(Auth::user()->id);
        $save->name=trim($request->name);
        $save->lastname=trim($request->lastname);
        $save->surename=trim($request->surename);
        $save->email=trim($request->email);
        $save->mobile_number=trim($request->mobile_number);
        $save->bdo_date=trim($request->bdo_date);
        

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
        return redirect('admin/profile')->with('success','profile account sucessfully updated');
        // return view('admin.profile.update');
    }

    // for logo
    public function website_logo(Request $request){
        $data['getRecord']=WebsiteLogoModel::find(1);
        $data['meta_title']='logo';
        return view('admin.logo.update',$data);
    }
    public function website_logo_update(Request $request){
        $save=WebsiteLogoModel::find(1);
        $save->name=trim($request->name);
        if(!empty($request->file('logo'))){
                if(!empty($save->logo) && file_exists('assets/upload/logo/'.$save->logo)){
                    unlink('assets/upload/logo/'.$save->logo);
                }
            $file=$request->file('logo');
            $randomstr=Str::random(30);
            $filename=$randomstr. '.' .$file->getClientOriginalName();
            $file->move('assets/upload/logo/',$filename);
            $save->logo=$filename;

        }
        $save->save();
        // dd($request->all());
        return redirect('admin/logo')->with('success','logo suessfully upadte!');
    }

    public function staff_profile(Request $request){
        $data['meta_title']='profile';
        $data['getRecord']=User::find(Auth::user()->id);
        return  view('admin.admin_staff.staff_profile',$data);
    }
    public function staff_profile_update(Request $request){
        $data['meta_title']='profile';
        // $data['getRecord']=User::find(Auth::user()->id);
        // return  view('admin.admin_staff.staff_profile',$data);
        $save = request()->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,

        ]);
        $save=User::find(Auth::user()->id);
        $save->name=trim($request->name);
        $save->lastname=trim($request->lastname);
        $save->surename=trim($request->surename);
        $save->email=trim($request->email);
        $save->mobile_number=trim($request->mobile_number);
        // staff profile
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
        if(!empty($request->password)){
            $save->password=Hash::make($request->password);
        }
        $save->save();
        return redirect('staff/profile')->with('success','profile update sucessfully!');

    }
}
