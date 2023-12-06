<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['meta_title']='Loan User';
        $data['getRecord']=LoanUser::getAllRecord();
        return view('admin.loan_user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['meta_title']='create';
        return view('admin.loan_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkemail = LoanUser::where('email', '=', $request->email)->first();
        if ($checkemail) {
            return redirect('admin/loan_user/index')->with('error', 'loan user email already created!');
        } else {


            $save = request()->validate([
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'contact' => 'required',
                'email' => 'required|unique:loan_user',
                'tax_id' => 'required',
            ]);
            //
            // dd($request->all());
            $save = new LoanUser;
            $save->first_name = trim($request->first_name);
            $save->middle_name = trim($request->middle_name);
            $save->last_name = trim($request->last_name);
            $save->address = trim($request->address);
            $save->contact = trim($request->contact);
            $save->email = trim($request->email);
            $save->tax_id = trim($request->tax_id);
            $save->save();
            return redirect('admin/loan_user/index')->with('success', 'loan plans edited suessfully!');
        }
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
        $data['getRecord']=LoanUser::getSingle($id);
        return view('admin.loan_user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $save=LoanUser::getSingle($id);
        $save->first_name=trim($request->first_name);
        $save->middle_name=trim($request->middle_name);
        $save->last_name=trim($request->last_name);
        $save->address=trim($request->address);
        $save->contact=trim($request->contact);
        $save->email=trim($request->email);
        $save->tax_id=trim($request->tax_id);
        
        $save->save();
        return redirect('admin/loan_user/index')->with('success','loanuser edited suessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $getRecordDelete = LoanUser::find($id);
        
        if (!$getRecordDelete) {
            return redirect()->back()->with('error', 'Record not found!');
        }
    
        $getRecordDelete->delete();
    
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }


    // for staff
    public static function staff_loan_user(Request $request){
        // Check if the user is authenticated
        if(Auth::check()) {
            $staff_id = Auth::user()->id;
            // dd($staff_id); // Check the value of $staff_id
    
            $data['getRecord2'] = Loan::getLoanStaff($staff_id);
            // dd($data['getRecord2']);
            return view('admin.admin_staff.staff_loan_user', $data);
        } else {
            // Handle the case when the user is not authenticated
            // Redirect or display an error message
            echo "data";
        }
    }
    public function delteLoanUser($id){
        $getRecordDelete = Loan::find($id);
        if (!$getRecordDelete) {
            return redirect()->back()->with('error', 'Record not found!');
        }
    
        $getRecordDelete->delete();
    
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
    
    
}
