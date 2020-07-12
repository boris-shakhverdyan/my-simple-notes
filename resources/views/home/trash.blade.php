@extends('layouts.app')

@section('title', 'Trash')

@section('content')
<div class="container">
    @include('inc.menu')

    @foreach($notes as $note)
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <div class="modal text-dark fade" id="deleteModal{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $note->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $note->id }}">Are you sure you want to delete this note <b>permanently</b>?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route("note-delete", $note->id) }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{ $note->title }}
            <button class="btn btn-info justify-content-end" type="button" data-toggle="collapse" data-target="#collapse{{ $note->id }}" aria-expanded="false" aria-controls="collapse{{ $note->id }}">
                More
            </button>
            <a class="btn btn-warning" href="{{ route("edit", $note->id) }}">
                Edit
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $note->id }}">
                Delete
            </button>
            <a class="btn btn-success" href="{{ route("note-restore", $note->id) }}">
                Restore
            </a>
        </div>

        <div class="collapse" id="collapse{{ $note->id }}">
            <div class="card card-body">
                {!! $note->description !!}
            </div>
        </div>
        <div class="card-footer bg-secondary text-white">
            Updated at {{ $note->updated_at }}
        </div>
    </div>
    @endforeach


</div>
@endsection
