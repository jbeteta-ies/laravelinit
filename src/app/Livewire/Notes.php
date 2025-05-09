<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Note;

class Notes extends Component
{
    public $title;
    public $description;
    public $noteId;
    public $feedback;

    public function render()
    {
        $notes = Note::all();
        return view('livewire.notas', compact('notes'));
    }

    public function store()
    {
        Note::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->feedback = 'Note created successfully!';
        $this->resetInputFields();
    }

    public function edit($id)
    {
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
