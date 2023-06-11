<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourtReservationRequest;
use App\Http\Requests\UpdateCourtReservationRequest;
use App\Models\CourtReservation;

class CourtReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courtReservation = CourtReservation::all();
        $response = ["court_reservations" => $courtReservation];
        return response($courtReservation);
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
     * @param  \App\Http\Requests\StoreCourtReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourtReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourtReservation  $courtReservation
     * @return \Illuminate\Http\Response
     */
    public function show(CourtReservation $courtReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourtReservation  $courtReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(CourtReservation $courtReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourtReservationRequest  $request
     * @param  \App\Models\CourtReservation  $courtReservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourtReservationRequest $request, CourtReservation $courtReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourtReservation  $courtReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourtReservation $courtReservation)
    {
        //
    }
}
