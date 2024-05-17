<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return response()->json(['message' => 'Successfully fetched pembayarans', 'data' => $pembayarans], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembayaran = Pembayaran::create($request->all());
        return response()->json(['message' => 'Pembayaran successfully created', 'data' => $pembayaran], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return response()->json(['message' => 'Successfully fetched pembayaran', 'data' => $pembayaran], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update($request->all());
        return response()->json(['message' => 'Pembayaran successfully updated', 'data' => $pembayaran], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return response()->json(['message' => 'Pembayaran successfully deleted'], 200);
    }
}
