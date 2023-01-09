<?php

namespace App\Http\Controllers\api\V1;

use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkerStoreRequest;

class MarkerController extends Controller
{
    private $marker;
    public function __construct(Marker $marker){
        $this->marker = $marker;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $markers = Marker::all();
        return response()->json($markers, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MarkerStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkerStoreRequest $request)
    {
        try {
            $marker = $this->marker::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Marcador creado correctamente', 
                'Marker' => $marker,
            ],Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json(['msg'=>'Error al crear marcador'],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\MarkerStoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkerStoreRequest $request, $id)
    {
        $marker = Marker::find($id);
        $marker->update($request->only('latitude','longitude','name'));
        return response()->json([
            'success' => true,
            'message' => 'Marcador actualizado correctamente',
            'marker' => $marker
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marker = Marker::find($id);
        $marker->delete();
        return response()->json([
            'message' => 'Marcador eliminado correctamente',   
        ],Response::HTTP_OK);
    }
}
