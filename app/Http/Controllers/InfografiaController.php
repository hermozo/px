<?php

namespace App\Http\Controllers;

use App\Infografia;
use Illuminate\Http\Request;

class InfografiaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('infografia/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function show(Infografia $infografia) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function edit(Infografia $infografia) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infografia $infografia) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infografia $infografia) {
        //
    }

}
