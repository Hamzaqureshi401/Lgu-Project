<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Degree;


class Department extends Model
{
    use HasFactory;

    public function getDegree($id){
        return Degree::where('ID' , $id)->first();
    }
    public function countStudent($ids , $type){
        return Student::where('Degree_ID' , $ids)->where('Category' , $type)->pluck('ID')->count() ?? '';
    }
    public function hod(){
          return $this->belongsTo('App\Models\Employee' , 'HODUID');
   }
   public function dean(){
          return $this->belongsTo('App\Models\Employee' , 'DeanUID');
   }

   public function countStudentsByDpt($id){

   $degreesID = Degree::where('Dpt_ID' , $id)->pluck('ID')->toArray();
     return Student::whereIn('Degree_ID' , $degreesID);
   }
   public function AmountBooked($id){
    $year = date('Y');
   $degreesID = Degree::where('Dpt_ID' , $id)->pluck('ID')->toArray();
            $amount = 
            Student::
            join('registrations', 'registrations.Std_ID', '=', 'students.ID')
            ->join('challans', 'challans.Reg_ID', '=', 'registrations.ID')
            ->whereIn('students.AdmissionSession', ['Fa-2023','Sp-2023'])
           ->whereIn('students.degree_ID', $degreesID)->get();

        
        return $amount;
     
   }
//    select * from students 
// inner join registrations on registrations.Std_ID = students.ID 
// inner join challans on challans.Reg_ID = registrations.ID
}
