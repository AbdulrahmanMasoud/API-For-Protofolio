<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestemonialController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testemonials = DB::table('testemonials')->get();
        return response()->json([
            'testemonials' => $testemonials,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('testemonials')->insert([
            'title' => $request->title,
            'descrption' => $request->descrption
        ]);
        return 'added done';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testemonial = DB::table('testemonials')->where('id',$id)->get();
        return response()->json([
            'testemonial' => $testemonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('testemonials')->where('id', $request->id)->update([
            
            'title' => $request->title,
            'descrption' => $request->descrption
        ]);
        return 'updated done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('testemonials')->where('id', $id)->delete();
        return 'deleted done';
    }
}
