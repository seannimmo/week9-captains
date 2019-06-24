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
        $captains = \App\Captain::orderBy('name', 'asc')->get();
        $view = view('captain/index', compact('captains'));
        return $view;
    }

    public function store($captain_slug, Request $request)
    {
        $captain = \App\Captain::where('slug', $captain_slug)->first();
        $assignment = new \App\Assignment();
        $assignment->subject = $request->subject;
        $assignment->description = $request->description;
        $assignment->save();
        var_dump($assignment);
        
        return redirect(action('CaptainController@show', ['captain_slug' => 'kirk']));
    }
}
