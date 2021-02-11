<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\SocialNetwork;
use App\Http\Requests\SocialNetworkRequest;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialNetworks = SocialNetwork::ownedBy(Auth::id())->simplePaginate(5);

        return view('socialNetworks.index', compact('socialNetworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socialNetworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialNetworkRequest $request)
    {
        $socialNetwork = new SocialNetwork();
        $socialNetwork->tipo = $request->input('tipo');
        $socialNetwork->url = $request->input('url');
        $socialNetwork->user_id = Auth::id();
        $socialNetwork->save();

        return redirect(route('socialNetworks.index'))->with('_success', '¡Red Social creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SocialNetwork $socialNetwork)
    {
        return view('socialNetworks.show', compact('socialNetwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialNetwork $socialNetwork)
    {
        return view('socialNetworks.edit', compact('socialNetwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialNetworkRequest $request, socialNetwork $socialNetwork)
    {
        $socialNetwork->tipo = $request->input('tipo');
        $socialNetwork->url = $request->input('url');
        $socialNetwork->save();

        return redirect(route('socialNetworks.index'))->with('_success', '¡Red Social editada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialNetwork $socialNetwork)
    {
        if($socialNetwork->owner->id == Auth::id())
        {
            $socialNetwork->delete();

            return back()->with('_success', '¡Red Social borrada exitosamente!');
        }
        
        return back()->with('_failure', '¡No tiene permiso de borrar ese recurso!');
    }
}
