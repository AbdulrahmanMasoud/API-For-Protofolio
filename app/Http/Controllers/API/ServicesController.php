<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('services')->get();
        return response()->json([
            'services' => $services,
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
        DB::table('services')->insert([
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc,
            'service_link' => 'services/'
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
        $services = DB::table('services')->where('id',$id)->select('id','service_name','service_desc')->get();
        return response()->json([
            'services' => $services,
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
        DB::table('services')->where('id', $request->id)->update([
            
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc
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
        DB::table('services')->where('id', $id)->delete();
        return 'deleted done';
    }
}
