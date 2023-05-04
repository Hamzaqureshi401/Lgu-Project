<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\DegreeBatche;
use App\Models\Degree;

use App\Models\Semester;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    public function validation($request)
    {

        $this->validate($request, [
            'DegreeBatches_ID'        => 'required|numeric',
            'Sem_ID'                  => 'required|numeric',
            'PerCourseFee'            => 'required|numeric',
            'PerSemesterFee'          => 'required|numeric',

        ]);
    }

    public function addFee()
    {

        $button = "Add Fees";
        $title  = 'Add Fees';
        $route  = '/storeFee';
        $degreeBatche = DegreeBatche::get();
        $semesters = Semester::get();
        return
            view(
                'fee.addFees',
                compact(
                    'button',
                    'title',
                    'route',
                    'degreeBatche',
                    'semesters'
                )
            );
    }

    public function storeFee(Request $request)
    {

        // dd($request);

        $unique = $this->uniqueDigreeBatchAndSemeseter($request);
        $validator = $this->validation($request);


        if ($unique == true) {
            return redirect()->back()->with(['errorToaster' => 'Degree Batches ans Semester Must Be Unique', 'title' => 'Warning']);
        } else {
            $submit = DB::update("EXEC sp_InsertFee

            @DegreeBatches_ID  ='$request->DegreeBatches_ID',
            @Sem_ID            ='$request->Sem_ID',
            @PerCourseFee      ='$request->PerCourseFee',
            @PerSemesterFee    ='$request->PerSemesterFee'

           ;");
            return redirect()->back()->with(['successToaster' => 'Fee Added SuccessFully', 'title' => 'Success']);
        }
    }

    public function allFees()
    {

        $fees = Fee::paginate(10);
        $title         = 'All Fees';
        $route         = 'updateFee';
        $getEditRoute  = 'editFee';
        $modalTitle    = 'Edit Fee';

        // dd($fees);



        return
            view(
                'Fee.allFees',
                compact(
                    'fees',
                    'title',
                    'modalTitle',
                    'route',
                    'getEditRoute'
                )
            );
    }

    public function editFee($id)
    {

        $button = "Update Degree Batch";
        $title  = 'Edit Degree Batch';
        $route  = '/updateFee';
        $degrees = Degree::get();
        $batches  = Semester::get();
        $fees = Fee::where('ID', $id)->first();

        return
            view(
                'Fee.editFee',
                compact(
                    'fees',
                    'button',
                    'title',
                    'route',
                    'degrees',
                    'batches'
                )
            );
    }
    public function updateFee(Request $request)
    {


        $submit = DB::update("EXEC sp_UpdateFees
            @ID                    = '$request->id',
            @Degree_ID             = '$request->Degree_ID',
            @Batch_ID             = '$request->Batch_ID'
            ;");

        return redirect()->back()->with(['successToaster' => 'Degree Batches Updated', 'title' => 'Success']);
    }

    public function uniqueDigreeBatchAndSemeseter($request)
    {

        return Fee::where(['DegreeBatches_ID' => $request->DegreeBatches_ID, 'Sem_ID' => $request->Sem_ID])->exists();
    }
}
