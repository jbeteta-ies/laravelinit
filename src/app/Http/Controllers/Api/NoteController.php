<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\NoteResource;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json ([
            'success' => true,
            'message' => 'Notas encontradas correctamente',
            'data' => NoteResource::Collection(Note::all()),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // creamos la nueva nota
        $note  = Note::create($request->all());
        // Devolvemos la respuesta con la nota
        return response()->json([
            'success' => true,
            'message' => 'Nota creada correctamente',
            'data' => new NoteResource($note),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $nota = Note::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Nota encontrada correctamente',
            'data' => new NoteResource($nota),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse      
    {
        $nota = Note::find($id);
        $nota->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Nota actualizada correctamente',
            'data' => new NoteResource($nota),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Note::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Nota eliminada correctamente',
        ], 200);
    }
}
