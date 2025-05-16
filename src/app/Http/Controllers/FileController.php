<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Psy\Readline\Hoa\FileRead;

class FileController extends Controller
{
    public function index()
    {
        // todo
        $files = File::all();
        return view('files.index', compact('files'));
    }
    public function create()
    {
        // todo
        return view('files.create');
    }
    public function store(FileRequest $request)
    {
        $file = $request->file('file');
        $fileName = time() . '_' . uniqId() .  '.' . $file->getClientOriginalExtension();
        //$file->move(public_path('files'), $fileName);
        //$file->storeAs('files', $fileName);
        Storage::disk('local')->putFileAs('files', $file, $fileName);

        File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'description' => $request->description,
            'url' => $fileName,
        ]);
        return redirect()->route('files.index');
    }

    public function download($id)
    {
        $file = File::findOrFail($id);

        // Ruta relativa dentro del disco 'local'
        $filePath = 'files/' . $file->url;

        // Verifica que el archivo existe antes de intentar descargarlo
        if (!Storage::disk('local')->exists($filePath)) {
            abort(404, 'Archivo no encontrado.');
        }

        // Devuelve el archivo como descarga
        $absolutePath = Storage::disk('local')->path($filePath);
        return response()->download($absolutePath, $file->name);
    }

    public function destroy($id)
{
    $file = File::findOrFail($id);
    $filePath = 'files/' . $file->url;

    // Verifica que el archivo existe antes de intentar eliminarlo
    if (Storage::disk('local')->exists($filePath)) {
        Storage::disk('local')->delete($filePath);
    }
    // elimina el registro de la base de datos
    $file->delete();
    return redirect()->route('files.index');
}
}
