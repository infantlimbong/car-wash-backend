<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::all();
        return response()->json(['message' => 'Successfully fetched layanans', 'data' => $layanans], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $layanan = Layanan::create($request->all());
        return response()->json(['message' => 'Layanan successfully created', 'data' => $layanan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        return response()->json(['message' => 'Successfully fetched layanan', 'data' => $layanan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $layanan->update($request->all());
        return response()->json(['message' => 'Layanan successfully updated', 'data' => $layanan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return response()->json(['message' => 'Layanan successfully deleted'], 200);
    }
}
