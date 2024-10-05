@extends('laravel-ocr.layout')

@section('content')
    <h2>Upload Image</h2>
    <form enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="image" placeholder="Select image">
        <button type="submit">Parse Text</button>
    </form>
@endsection
