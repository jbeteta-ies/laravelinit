<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Models\File;
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
        $file->move(public_path('files'), $fileName);

        File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'description' => $request->description,
            'url' => $fileName,
        ]);
        return redirect()->route('files.index');
    }
}
