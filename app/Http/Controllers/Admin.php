<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artist;
use App\Concert;

class Admin extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $concerts = Concert::orderBy('created_at', 'asc')->get();

      return view('admin_list', [
        'concerts' => $concerts
      ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $concerts = Concert::orderBy('created_at', 'asc')->get();
        $currentConcert = Concert::where('id', $id)->first();
        $artists = Artist::orderBy('created_at', 'asc')->get();
        $lieux = array();
        foreach ($concerts as $concert) {
            if (!in_array($concert->lieu, $lieux)){
              $lieux[] = $concert->lieu;
            }
        }

        return view('admin_edit', [
          'lieux' => $lieux,
          'artists' => $artists,
          'currentConcert' => $currentConcert,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      Concert::destroy($id);
    }
}
