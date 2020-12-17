<?php

namespace App\Http\Controllers\Api;

use App\Gitar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GitarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Gitar::all();
        return response()->json($item);
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
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'codemerk' => 'required',
            'resep' => 'required',
        ]);

        $gitar = new Gitar;

        $gitar->codemerk = $request->input('codemerk');
        $gitar->resep = $request->input('resep');
        
        $gitar->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gitar  $gitar
     * @return \Illuminate\Http\Response
     */
    public function show(Gitar $gitar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gitar  $gitar
     * @return \Illuminate\Http\Response
     */
    public function edit(Gitar $gitar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gitar  $gitar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gitar $gitar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gitar  $gitar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gitar $gitar)
    {
        //
    }
}
