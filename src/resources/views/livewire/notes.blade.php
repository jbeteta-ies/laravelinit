<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="{{ $noteId ? 'update' : 'store' }}">
        <input type="text" wire:model="title" placeholder="Title" />
        <textarea wire:model="description" placeholder="Description"></textarea>
        <button type="submit">{{ $noteId ? 'Update' : 'Create' }}</button>
    </form>

    <ul>
        @foreach ($notes as $note)
            <li>
                {{ $note->title }} - {{ $note->description }}
                <button wire:click="edit({{ $note->id }})">Edit</button>
                <button wire:click="delete({{ $note->id }})">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
