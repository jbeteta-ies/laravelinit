<div>
    <form wire:submit.prevent="{{ $noteId ? 'update' : 'store' }}">
        <input type="text" wire:model="title" placeholder="Title" />
        <textarea wire:model="description" placeholder="Description"></textarea>
        <button type="submit">{{ $noteId ? 'Update' : 'Create' }}</button>
        <p style="color:red;">{{ $feedback }}</p>
    </form>

    <ul>
        @foreach($notes as $note)
            <li>
                {{ $note->title }} - {{ $note->description }}
                <button wire:click="edit({{ $note->id }})">Edit</button>
                <button wire:click="delete({{ $note->id }})">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
