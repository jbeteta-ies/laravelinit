<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Note;

class Notes extends Component
{
    public $title, $description, $noteId;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ];


    public function render()
    {
        $notes = Note::all();
        return view('livewire.notes', compact('notes'));
    }

    public function store()
    {
        $this->validate();

        // Create a new note
        Note::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->validate();

        $note = Note::find($id);
        $this->noteId = $id;
        $this->title = $note->title;
        $this->description = $note->description;
    }

    public function update()
    {
        $note = Note::find($this->noteId);
        $note->update([
            'title' => $this->title,
            'description' => $this->description
        ]);
        
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Note::find($id)->delete();
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->noteId = null;
    }
}
