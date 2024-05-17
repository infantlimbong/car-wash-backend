<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permintaans = Permintaan::all();
        return response()->json(['message' => 'Successfully fetched permintaans', 'data' => $permintaans], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $permintaan = Permintaan::create($request->all());
        $requestData = $request->all();
        $requestData['user_id'] = auth()->id();
        $permintaan = Permintaan::create($requestData);
        return response()->json(['message' => 'Permintaan successfully created', 'data' => $permintaan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permintaan $permintaan)
    {
        return response()->json(['message' => 'Successfully fetched permintaan', 'data' => $permintaan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permintaan $permintaan)
    {
        $permintaan->update($request->all());
        return response()->json(['message' => 'Permintaan successfully updated', 'data' => $permintaan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permintaan $permintaan)
    {
        $permintaan->delete();
        return response()->json(['message' => 'Permintaan successfully deleted'], 200);
    }
}
