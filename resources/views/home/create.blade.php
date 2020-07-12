@extends('layouts.app')

@section('title', 'Create note')

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

    <h3>Create note</h3>
    <form action="{{ route("note-create") }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="title">Description</label>
            <textarea name="description" id="description">
                <p>Your note</p>
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
