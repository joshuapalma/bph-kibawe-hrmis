<?php

namespace App\Repositories;

use App\Models\EmployeeProfile;
use App\Models\Tardy;
use Illuminate\Pipeline\Pipeline;
use PDF;

class TardyRepository
{
    public function getAllTardy($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : null
        ];

        $employeeName = EmployeeProfile::pluck('complete_name');
        $query = Tardy::where('month_generated', date('F'));

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchTardyTable::class
            ])->thenReturn();

        $data = $result ? $result : $query;
        $tardy = $data->orderBy('created_at', 'ASC')->paginate(10);
        // {{dd(date('F'),  $row->created_at->format('F'))}}

        return compact('employeeName', 'tardy', 'requestData');
    }

    public function storeTardy($request)
    {
        //Checker if the name is already exists
        $checker = Tardy::where('name', $request->name)->first();
        //If name already exists, just only add the incoming data
        //Check if the total of stored mins and incoming mins is equal to 60 (do computation)     
        if($checker && $checker->month_generated == date('F')) {
            $storedMins = $checker->mins;
            $incomingMins = $request->mins;
            $totalMins = $storedMins + $incomingMins;

            if($totalMins >= 60){
                //For mins, deduct 60 to the total of stored mins and incoming mins, then add 1 to the hours
                $newMins = $totalMins - 60;
                $newHours = ($checker->hours) + ($request->hours) + 1;

                $query = Tardy::where('name', $request->name)->update([
                    'designation' => $request->designation,
                    'tardy' => ($checker->tardy) + ($request->tardy),
                    'undertime' => ($checker->undertime) + ($request->undertime),
                    'hours' => $newHours,
                    'mins' => $newMins,
                ]);

                return $query;
            } else {
                $query = Tardy::where('name', $request->name)->update([
                    'designation' => $request->designation,
                    'tardy' => ($checker->tardy) + ($request->tardy),
                    'undertime' => ($checker->undertime) + ($request->undertime),
                    'hours' => ($checker->hours) + ($request->hours),
                    'mins' => ($checker->mins) + ($request->mins),
                ]);

                return $query;
            }
        } else {
            //Else do this
            $query = Tardy::insertGetId([
                'name' => $request->name,
                'designation' => $request->designation,
                'tardy' => $request->tardy,
                'undertime' => $request->undertime,
                'hours' => $request->hours,
                'mins' => $request->mins,
                'month_generated' => \Carbon\Carbon::now()->format('F'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            return $query;
        }
    }

    public function updateTardy($tardyId, $request)
    {
        $query = Tardy::where('id', $tardyId->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'tardy' => $request->tardy,
            'undertime' => $request->undertime,
            'hours' => $request->hours,
            'mins' => $request->mins,
        ]);

        return $query;
    }

    public function deleteTardy($tardyId)
    {
        return Tardy::find($tardyId->id)->delete();
    }

    public function generatePdf()
    {
        $query = Tardy::get();

        $data = [
            'title' => 'BPH-KIBAWE-HRMIS Tardy Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('generate-pdf.tardy-pdf', $data);

        return $pdf->download('BPH-KIBAWE-HRMIS Tardy Report.pdf');
    }
}
