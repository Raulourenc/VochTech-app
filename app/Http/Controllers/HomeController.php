<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\State;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;



class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     */
    public function index()
    {
        $address = Home::all();
        
        return view('home', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        
        return view('address', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeRequest $request)
    {
        $address = new Home;
        $address->address = $request->address;
        $address->number = $request->number;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->save();

        return redirect()->route('home.index')->with('msg', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::all();
        $address = Home::findOrFail($id);
        
        return view('address', compact('states', 'address', 'id'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeRequest  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request)
    {   
        $id = $request->id;
        $add = Home::find($id);

        $address['address'] = $request->address;
        $address['number'] = $request->number;
        $address['city'] = $request->city;
        $address['state'] = $request->state;
        
        $save = $add->update($address);

        return redirect()->route('home.edit', $id)->with('msg', 'Atualização realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $destroy = Home::find($id);
 
        $destroy->delete();

        return redirect()->route('home.index')->with('msg', 'Endereço excluido com sucesso!');
    }
}
