<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\user;
use Illuminate\Support\Facades\Auth;



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
        $people = Home::all();
        
        return view('home', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeRequest $request)
    {  
      
        $id = Auth::user()->id;

        $people = new Home;
        $people->user_id = $id;
        $people->name = $request->name;
        $people->age = $request->age;
        $people->save();

        return redirect()->route('home.index')->with('msg', 'Cadastro realizado com sucesso!', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $people = Home::findOrFail($id);
        
        return view('people', compact('people', 'id'));
      
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
     
        $people['name'] = $request->name;
        $people['age'] = $request->age;
     
        $save = $add->update($people);

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
