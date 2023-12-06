<?php

namespace App\Http\Controllers;

use App\Models\Loan_Types;
use Illuminate\Http\Request;

class LoanTypesController extends Controller
{
    //
    public function index(){
        $data['meta_title']='Loan Types';
        $data['getRecord']=Loan_Types::getAllRecord();
        return view('admin.loan_types.list',$data);
    }
    public function add(){
        $data['meta_title']='
        Add Loan Type';
        return view('admin.loan_types.add');
    }
    public function store(Request $request){
        $data['meta_title']='
        Add Loan Type';
        $save = request()->validate([
            'type_name'=>'required',
        ]);
        // dd($request->all());
        // return view('admin.loan_types.add');
        $save=new Loan_Types;
        $save->type_name=trim($request->type_name);
        $save->description=trim($request->description);
        $save->save();
        return redirect('admin/loan_types/list')->with('success','loan types successfully! create');
    }

    public function delete_loan_types(Request $request, $id){
        $getRecordDelete = Loan_Types::find($id);
        
        if (!$getRecordDelete) {
            return redirect()->back()->with('error', 'Record not found!');
        }
    
        $getRecordDelete->delete();
    
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
    public function edit(Request $request,$id){
        // dd($id);
        $data['meta_title']='edit';
        $data['getRecord']=Loan_Types::getSingle($id);
        return view('admin.loan_types.edit',$data);
    }
    public function edit_update(Request $request,$id){
        $save=Loan_Types::getSingle($id);
        $save->type_name=trim($request->type_name);
        $save->description=trim($request->description);
        $save->save();
        return redirect('admin/loan_types/list')->with('success','loan type edited suessfully!');
    }
    
}
