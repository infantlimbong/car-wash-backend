<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobils = Mobil::all();
        return response()->json(['message' => 'Successfully fetched mobils', 'data' => $mobils], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['user_id'] = auth()->id();
        $mobil = Mobil::create($requestData);
        return response()->json(['message' => 'Mobil successfully created', 'data' => $mobil], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        return response()->json(['message' => 'Successfully fetched mobil', 'data' => $mobil], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $mobil->update($request->all());
        return response()->json(['message' => 'Mobil successfully updated', 'data' => $mobil], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        return response()->json(['message' => 'Mobil successfully deleted'], 200);
    }
}
