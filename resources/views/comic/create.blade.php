@extends('layout.layout')


@section('content')
<h1 class="text-uppercase text-primary py-5 text-center">Create New Comic</h1>
<form action="{{route('comics.store')}}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" class="form-control" name="title" aria-describedby="emailHelp" required placeholder="Insert a Title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" required placeholder="Insert a Description">
    </div>
    <div class="mb-3">
        <label for="thumb" class="form-label">Thumb</label>
        <input type="text" class="form-control" name="thumb" id="thumb" placeholder="Insert Thumb" required >
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="Insert a Price" required>
    </div>
    <div class="mb-3">
        <label for="series" class="form-label">Series</label>
        <input type="text" class="form-control" name="series" id="series" placeholder="Insert Series" required>
    </div>
    <div class="mb-3">
        <label for="sale_date" class="form-label">Sale date</label>
        <input type="date" name="sale_date" class="form-control" id="sale_date"  placeholder="Insert Sale Date" required>
    </div>
    <select class="form-select" name="type" id="type" required>
        <option selected>Comic Book</option>
        <option>Graphic Novel</option>
    </select>
    <button type="submit" class="btn btn-primary mt-3">Send</button>
</form>
@endsection