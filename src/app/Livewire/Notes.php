<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Note;

class Notes extends Component
{
<<<<<<< HEAD
    public $title, $description, $noteId;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ];

=======
    public $title;
    public $description;
    public $noteId;
    public $feedback;
>>>>>>> b9ff7d0f2b7e959007ad855f611ab67518b4adb9

    public function render()
    {
        $notes = Note::all();
<<<<<<< HEAD
        return view('livewire.notes', compact('notes'));
=======
        return view('livewire.notas', compact('notes'));
>>>>>>> b9ff7d0f2b7e959007ad855f611ab67518b4adb9
    }

    public function store()
    {
<<<<<<< HEAD
        $this->validate();

        // Create a new note
=======
>>>>>>> b9ff7d0f2b7e959007ad855f611ab67518b4adb9
        Note::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
<<<<<<< HEAD
        
=======
        $this->feedback = 'Note created successfully!';
>>>>>>> b9ff7d0f2b7e959007ad855f611ab67518b4adb9
        $this->resetInputFields();
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $this->validate();

=======
>>>>>>> b9ff7d0f2b7e959007ad855f611ab67518b4adb9
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
