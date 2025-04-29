<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; // Import the Note model

use Illuminate\View\View; // Import the correct View class
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NoteRequest; // Import the NoteRequest class

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create(): View
    {
        return view('notes.create');
    }
    public function store(NoteRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['done'] = $request->has('done') ? 1 : 0; // Convert checkbox to boolean
        Note::create($data);
        return redirect()->route('note.index')->with('success', 'Nota creada satisfactoriamente.');
    }
    public function edit(Note $note): View
    {
        return view('notes.edit', compact('note'));
    }
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        $data = $request->all();
        $data['done'] = $request->has('done') ? 1 : 0; // Convert checkbox to boolean
        $note->update($data);
        return redirect()->route('note.index')->with('success', 'Nota actualizada satisfactoriamente.');
    }
    public function show(Note $note): View
    {
        return view('notes.show', compact('note'));
    }
    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Nota eliminada satisfactoriamente.');
    }
}
