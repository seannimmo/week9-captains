<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptainController extends Controller
{
    //
    public function show($captain_slug)
    {
        $captain = \App\Captain::where('slug', $captain_slug)->first();

        if (!$captain) {
            abort(404, 'Captain not found');
        }

        $view = view('captain/show', compact($captain));
        $view->captain = $captain;
        return $view;
    }

    public function index()
    {
        $view = view('captain/index');
        return $view;
    }
}
