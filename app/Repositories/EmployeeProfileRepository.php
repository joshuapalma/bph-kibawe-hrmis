<?php

namespace App\Repositories;

use App\Models\EmployeeProfile;
use Illuminate\Pipeline\Pipeline;

class EmployeeProfileRepository
{
    public function getAllEmployeeProfile($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : null
        ];

        $query = EmployeeProfile::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchEmployeeProfileTable::class
            ])->thenReturn();

        $data = $result ? $result : $query;
        $employeeProfile = $data->orderBy('complete_name')->paginate(10);

        return compact('employeeProfile', 'requestData');
    }

    public function storeEmployeeProfile($request)
    {
        $query = EmployeeProfile::insertGetId([
            'complete_name' => $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'designation' => $request->designation,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return $query;
    }

    public function updateEmployeeProfile($employeeProfileId, $request)
    {
        $query = EmployeeProfile::where('id', $employeeProfileId->id)->update([
            'complete_name' => $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'designation' => $request->designation,
        ]);

        return $query;
    }

    public function deleteEmployeeProfile($employeeProfileId)
    {
        return EmployeeProfile::find($employeeProfileId->id)->delete();
    }
}
