<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LeaveRepository;
use App\Http\Requests\StoreLeaveRequests;
use App\Http\Requests\UpdateLeaveRequests;
use App\Models\Leave;

class LeaveController extends Controller
{
    public $leave;

    public function __construct(LeaveRepository $leave)
    {
        $this->leave = $leave;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->leave->getAllLeave($request);
        return view('pages.leave', $result);
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
    public function store(StoreLeaveRequests $request)
    {
        $this->leave->storeLeave($request);
        return redirect()->route('leave.index')->with('success', 'Leave Created Successfully');
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
    public function update(UpdateLeaveRequests $request, Leave $id)
    {
        $this->leave->updateLeave($id, $request);
        return redirect()->route('leave.index')->with('success', 'Leave Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $id)
    {
        $this->leave->deleteLeave($id);
        return redirect()->route('leave.index')->with('success', 'Leave Deleted Successfully');
    }

    public function generatePDF(Request $request)
    {
        $result = $this->leave->generatePdf($request);
        return $result;
    }

    public function getDesignationByName(Request $request)
    {   
        return $this->leave->getDesignationByName($request);
    }
}
