@extends('layouts.app')

@section('title', 'Edit note: ' . $note->title)

@section('header_data')
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
@endsection

@section('script')
<script>
    ClassicEditor
        .create(document.querySelector("#description"), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endsection

@section('content')

<div class="container">
    @include('inc.menu')

    @if(session("success"))
    <div class="alert alert-success">
        {{ session("success") }}
    </div>
    @endif

    <h3>Create note</h3>
    <form action="{{ route("note-edit", $note->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ $note->title }}" name="title" class="form-control" id="title" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="title">Description</label>
            <textarea name="description" id="description">
                {!! $note->description !!}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
