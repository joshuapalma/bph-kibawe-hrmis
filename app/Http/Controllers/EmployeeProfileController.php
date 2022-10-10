<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeProfileRequests;
use App\Http\Requests\UpdateEmployeeProfileRequests;
use Illuminate\Http\Request;
use App\Models\EmployeeProfile;
use App\Repositories\EmployeeProfileRepository;

class EmployeeProfileController extends Controller
{
    public $employeeProfile;

    public function __construct(EmployeeProfileRepository $employeeProfile)
    {
        $this->employeeProfile = $employeeProfile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->employeeProfile->getAllEmployeeProfile();
        return view('pages.employee-profile', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeProfileRequests $request)
    {
        $this->employeeProfile->storeEmployeeProfile($request);
        return redirect()->route('employee-profile')->with('success', 'Employee Profile Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeProfileRequests $request, EmployeeProfile $id)
    {
        $this->employeeProfile->updateEmployeeProfile($id, $request);
        return redirect()->route('employee-profile')->with('success', 'Employee Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeProfile $id)
    {
        $this->employeeProfile->deleteEmployeeProfile($id);
        return redirect()->route('employee-profile')->with('success', 'Employee Profile Deleted Successfully');
    }
}
