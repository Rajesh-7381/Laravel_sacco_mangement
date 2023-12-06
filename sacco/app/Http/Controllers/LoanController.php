<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Loan_Plans;
use App\Models\Loan_Types;
use App\Models\LoanUser;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['meta_title']='Loan';
        $data['getRecord']=Loan::getAllRecord();
        return view('admin.loan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // echo "hii";
        $data['meta_title']='create';
        $data['getStaff']=User::where('is_role','=',0)->where('is_delete','=',0)->get();
        $data['getLoanUser']=LoanUser::get();
        $data['getLoanTypes']=Loan_Types::get();
        $data['getLoanPlans']=Loan_Plans::get();
        $data['getLoanStaff']=User::get();
        return view('admin.loan.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $save=new Loan;
        $save->user_id =trim($request->user_id);
        $save->staff_id =trim($request->staff_id);
        $save->loan_types_id =trim($request->loan_types_id);
        $save->loan_plan_id =trim($request->loan_plan_id);
        $save->loan_amount =trim($request->loan_amount);
        $save->purpose =trim($request->purpose);
        $save->save();
        return redirect('admin/loan/index')->with('success','loan create suessfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['meta_title']='edit';
        $data['getStaff']=User::where('is_role','=',0)->where('is_delete','=',0)->get();
        $data['getLoanUser']=LoanUser::get();
        $data['getLoanTypes']=Loan_Types::get();
        $data['getLoanPlans']=Loan_Plans::get();
        $data['getLoanStaff']=User::get();
        $data['getRecord']=Loan::getSingle($id);
        return view('admin.loan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->all());
        $save= Loan::getSingle($id);
        $save->user_id =trim($request->user_id);
        $save->staff_id =trim($request->staff_id);
        $save->loan_types_id =trim($request->loan_types_id);
        $save->loan_plan_id =trim($request->loan_plan_id);
        $save->loan_amount =trim($request->loan_amount);
        $save->purpose =trim($request->purpose);
        $save->save();
        return redirect('admin/loan/index')->with('success','loan updated suessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $getRecordDelete = Loan::find($id);
        
        if (!$getRecordDelete) {
            return redirect()->back()->with('error', 'Record not found!');
        }
    
        $getRecordDelete->delete();
    
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
