<?php

namespace App\Repositories;

use App\Models\EmployeeProfile;

class EmployeeProfileRepository
{
    public function getAllEmployeeProfile()
    {
        $employeeProfile = EmployeeProfile::orderBy('created_at', 'DESC')->paginate(10);
        return compact('employeeProfile');
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
