<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employer;


class BlogsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('blogs')->get();
        return response()->json([
            'blogs' => $blogs,
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
        DB::table('blogs')->insert([
            'content' => $request->content,
            'thumbnil' => $request->thumbnil,
            'likes' => 0,
            'comments' => 0,
            'author' => Employer::find(1)->name,
            'author_avater' => Employer::find(1)->avater
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
        $blogs = DB::table('blogs')->where('id',$id)->get();
        return response()->json([
            'blogs' => $blogs,
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
        DB::table('blogs')->where('id', $request->id)->update([
            
            'content' => $request->content,
            'thumbnil' => $request->thumbnil
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
        DB::table('blogs')->where('id', $id)->delete();
        return 'deleted done';
    }
}
