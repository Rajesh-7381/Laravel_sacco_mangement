<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table='loan';

    public static function getAllRecord(){
        return self::get();
    }
    public static function getSingle($id){
        return self::find($id);
    }
    public function getUserName(){
        return $this->belongsTo(LoanUser::class,'user_id');
    }
    public function getStaffName(){
        return $this->belongsTo(User::class, 'staff_id', 'id'); // Make sure the foreign key and local key are specified correctly
    }
    
    public function getLoanType(){
        return $this->belongsTo(Loan_Types::class,'loan_types_id');
    }
    public function getLoanPlan(){
        return $this->belongsTo(Loan_Plans::class,'loan_plan_id');
    }

    
    // Inside the Loan model
    public static function getLoanStaff($staff_id){
        // Selecting specific columns from multiple tables using Eloquent ORM
        return self::select('loan.*', 'users.name', 'users.lastname', 'users.lastname', 'loan_type.type_name', 'loan_plans.months')
    
            // Joining 'users' table based on 'id' columns between 'users' and 'loan' tables
            ->join('users', 'users.id', '=', 'loan.user_id')
    
            // Joining 'loan_type' table based on 'id' columns between 'loan_type' and 'loan' tables
            ->join('loan_type', 'loan_type.id', '=', 'loan.loan_types_id')
    
            // Joining 'loan_plans' table based on 'id' columns between 'loan_plans' and 'loan' tables
            ->join('loan_plans', 'loan_plans.id', '=', 'loan.loan_plan_id')
    
            // Filtering results where 'staff_id' matches the provided value
            ->where('staff_id', $staff_id)
    
            // Ordering the results by 'id' column in descending order
            ->orderByDesc('id')
    
            // Fetching the resulting data as a collection
            ->get();
    }
    
    

    
}