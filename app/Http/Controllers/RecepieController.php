<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecepieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $recepies = Recepie::where('user_id', Auth::id())->latest('updated_at')->paginate(3);
        $recepies = Auth::user()->recepies()->latest('updated_at')->paginate(3);
        return view ('recepies.index')->with('recepies', $recepies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recepies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'ingrediants' => 'required',
            'instructions' => 'required'
        ]);

        Recepie::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'ingrediants' => $request->ingrediants,
            'instructions' => $request->instructions
        ]);

        return to_route('recepies.index');


    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        
        $recepie = Recepie::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        // $recepie = Auth::user()->recepies()->latest()
        return view('recepies.show')->with('recepie',$recepie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        $recepie = Recepie::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        return view('recepies.edit')->with('recepie',$recepie);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $recepie = Recepie::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();

        $request->validate([
            'title' => 'required|max:120',
            'ingrediants' => 'required',
            'instructions' => 'required'
        ]);

        $recepie->update([
            'title' => $request->title,
            'ingrediants' => $request->ingrediants,
            'instructions' => $request->instructions
        ]);

        return to_route('recepies.show', $uuid)->with('success', 'Recepie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $recepie = Recepie::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();

        $recepie->delete();

        return to_route('recepies.index')->with('success', 'Recepie deleted successfully.');
    }
}
