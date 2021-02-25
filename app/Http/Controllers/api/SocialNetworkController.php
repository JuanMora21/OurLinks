<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialNetwork::orderBy('tipo', 'asc')->get();
        return response()->json(['data' => $socials], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $social = SocialNetwork::create($request->all());
    
        return response()->json(['data' => $social], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socialNetwork = SocialNetwork::find($id);
        if($socialNetwork != null){
            return response()->json(['data' => $socialNetwork], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $socialNetwork = SocialNetwork::find($id);

        $socialNetwork->update($request->all());
    
        return response()->json(['data' => $socialNetwork], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialNetwork = SocialNetwork::find($id);
        $socialNetwork->delete();
        return response(null, 204);
    }
}
