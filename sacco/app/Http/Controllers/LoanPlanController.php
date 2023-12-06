<?php

namespace App\Http\Controllers;

use App\Models\Loan_Plans;
use Illuminate\Http\Request;

class LoanPlanController extends Controller
{
    //
    public function index(){
        $data['meta_title']='Loan Plan';
        $data['getRecord']=Loan_Plans::getAllRecord();
        return view('admin/loan_plans/list',$data);
    }
    public function add(){
        return view('admin/loan_plans/add');
    }
    public function store(Request $request){
        // dd($request->all());
        

        $save=new Loan_Plans;
        $save->months =trim($request->months);
        $save->intrest_percentage =trim($request->intrest_percentage);
        $save->penalty_rate =trim($request->penalty_rate);
        $save->save();
        return redirect('admin/loan_plans/list')->with('success','added suessfully!');
        // return view('admin/loan_plans/add');
    }
    public function delete_loan_plans(Request $request ,$id){
        $getRecordDelete = Loan_Plans::find($id);
        
        if (!$getRecordDelete) {
            return redirect()->back()->with('error', 'Record not found!');
        }
    
        $getRecordDelete->delete();
    
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }

    public function edit(Request $request ,$id){
        // dd($id);
        $data['meta_title']='edit';
        $data['getRecord']=Loan_Plans::getSingle($id);
        return view('admin.loan_plans.edit',$data);
    }
    public function edit_update(Request $request ,$id){
        $save=Loan_Plans::getSingle($id);
        $save->months=trim($request->months);
        $save->intrest_percentage=trim($request->intrest_percentage);
        $save->penalty_rate=trim($request->penalty_rate);
        $save->save();
        return redirect('admin/loan_plans/list')->with('success','loan plans edited suessfully!');
    }
}
