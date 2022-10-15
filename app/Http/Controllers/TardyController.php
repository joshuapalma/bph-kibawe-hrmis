<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tardy;
use App\Http\Requests\StoreTardyRequests;
use App\Http\Requests\UpdateTardyRequests;
use App\Repositories\TardyRepository;

class TardyController extends Controller
{
    public $tardy;

    public function __construct(TardyRepository $tardy)
    {
        $this->tardy = $tardy;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->tardy->getAllTardy($request);
        return view('pages.tardy', $result);
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
    public function store(StoreTardyRequests $request)
    {
        $this->tardy->storeTardy($request);
        return redirect()->route('tardy')->with('success', 'Tardy Created Successfully');
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
    public function update(Request $request,Tardy $id)
    {
        $this->tardy->updateTardy($id, $request);
        return redirect()->route('tardy')->with('success', 'Tardy Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tardy $id)
    {
        $this->tardy->deleteTardy($id);
        return redirect()->route('tardy')->with('success', 'Tardy Deleted Successfully');
    }

    public function generatePDF()
    {
        $result = $this->tardy->generatePdf();
        return $result;
    }
}
