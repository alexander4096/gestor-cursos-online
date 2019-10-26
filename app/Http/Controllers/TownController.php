<?php

namespace cursos\Http\Controllers;

use DummyFullModelClass;
use cursos\CityController;
use Illuminate\Http\Request;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \cursos\CityController  $cityController
     * @return \Illuminate\Http\Response
     */
    public function index(CityController $cityController)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \cursos\CityController  $cityController
     * @return \Illuminate\Http\Response
     */
    public function create(CityController $cityController)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cursos\CityController  $cityController
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CityController $cityController)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \cursos\CityController  $cityController
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show(CityController $cityController, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \cursos\CityController  $cityController
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(CityController $cityController, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cursos\CityController  $cityController
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityController $cityController, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \cursos\CityController  $cityController
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityController $cityController, DummyModelClass $DummyModelVariable)
    {
        //
    }
}
