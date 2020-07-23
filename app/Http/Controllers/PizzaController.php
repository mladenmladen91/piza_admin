<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function __construct() {
        $this->middleware('auth', ['except' => [
            'showPizzas'
        ]]);
    }
	
    public function index()
    {
        $pizzas = Pizza::all();
        return view('admin.pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pizza.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
            'name' => 'required|string',
			"amount" => "required|numeric|min:1",
            'price' => 'required|numeric|min:1'
        ]);
		
        $input = $request->all();
        $pizza = Pizza::create($input);
        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $pizza['avatar']= $name;
        }
        $pizza->save();
        
        return redirect(route('pizza.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view("admin.pizza.edit", compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $input = $request->all();
        $pizza = Pizza::find($id);
        
        if ($file = $request->file('avatar')) {
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            unlink(public_path().'/images/'.$pizza->avatar);
            $input['avatar'] = $name;
        }
        
        $pizza->update($input);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);
	    if($pizza->avatar){	
            unlink(public_path().'/images/'.$pizza->avatar);
	    }
        $pizza->delete();
        return redirect(route('pizza.index'));
    }
	
	public function showPizzas(){
		$pizzas = Pizza::where("amount",">",0)->get();
		return $pizzas;
	}
}
