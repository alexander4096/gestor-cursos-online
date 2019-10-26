<?php

namespace cursos\Http\Controllers;

use Illuminate\Http\Request;

class MiInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return "<h3>LLada a un invoke</h3>";
    }
}
