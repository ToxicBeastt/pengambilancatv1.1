<?php

namespace App\Http\Controllers\Api;

use App\Gitar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
            'cat' => 'required',
            'pemakaian' => 'required',
        ]);

        $gitar = new Gitar;

        $gitar->codemerk = $request->input('codemerk');
        $gitar->cat = $request->input('cat');
        $gitar->pemakaian = $request->input('pemakaian');

        $gitar->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $gitar
     * @return \Illuminate\Http\Response
     */
    public function show($gitar)
    {
        $resep = DB::table('gitars')->where('codemerk',$gitar)->get();
        return response()->json($resep);
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
     * @param  int  $gitar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DB::table('gitars')->where('id', $id)->first();
        if($item){
            DB::table('gitars')->where('id', $id)->delete();
        }
    }
}
