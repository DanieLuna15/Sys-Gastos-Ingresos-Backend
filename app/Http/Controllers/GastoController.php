<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $gastos = Gasto::latest()->get();
        //dd($gastos);
        return response()->json($gastos, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveGastoRequest $request): JsonResponse
    {
        $gasto = Gasto::create($request->validated());
        return response()->json($gasto, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $gasto= Gasto::findOrFail($id);
        return response()->json($gasto, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveGastoRequest $request, $id): JsonResponse
    {
        $gasto= Gasto::findOrFail($id);

        $gasto->update($request->validated());

        return response()->json($gasto, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $gasto= Gasto::findOrFail($id);

        $gasto->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
