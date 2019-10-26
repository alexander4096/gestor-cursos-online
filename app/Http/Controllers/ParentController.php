<?php

namespace cursos\Http\Controllers;

use DummyFullModelClass;
use cursos\Father;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \cursos\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function index(Father $father)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \cursos\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function create(Father $father)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cursos\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Father $father)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \cursos\Father  $father
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show(Father $father, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \cursos\Father  $father
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(Father $father, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cursos\Father  $father
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Father $father, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \cursos\Father  $father
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Father $father, DummyModelClass $DummyModelVariable)
    {
        //
    }
}
