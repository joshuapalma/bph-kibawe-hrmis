<?php

namespace App\Repositories;

use App\Models\EmployeeProfile;
use App\Models\Leave;
use Illuminate\Pipeline\Pipeline;
use PDF;

class LeaveRepository
{
    public function getAllLeave($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : null
        ];

        $employeeName = EmployeeProfile::pluck('complete_name');
        $query = Leave::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchLeaveTable::class
            ])->thenReturn();

        $data = $result ? $result : $query;
        $leave = $data->orderBy('created_at', 'ASC')->paginate(10);

        return compact('employeeName', 'leave', 'requestData');
    }

    public function storeLeave($request)
    {
        $query = Leave::insertGetId([
            'name' => $request->name,
            'designation' => $request->designation,
            'date_of_leave' => $request->date_of_leave,
            'nature_of_leave' => $request->nature_of_leave,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return $query;
    }

    public function updateLeave($leaveId, $request)
    {
        $query = Leave::where('id', $leaveId->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'date_of_leave' => $request->date_of_leave,
            'nature_of_leave' => $request->nature_of_leave,
        ]);

        return $query;
    }

    public function deleteLeave($leaveId)
    {
        return Leave::find($leaveId->id)->delete();
    }

    public function generatePdf()
    {
        $query = Leave::get();

        $data = [
            'title' => 'BPH-KIBAWE-HRMIS Leave Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('generate-pdf.leave-pdf', $data);

        return $pdf->download('BPH-KIBAWE-HRMIS Leave Report.pdf');
    }

    public function getDesignationByName($request)
    {
        $query = EmployeeProfile::where('complete_name', $request->employee)->select('designation')->first();
        return compact ('query');
    }
}
