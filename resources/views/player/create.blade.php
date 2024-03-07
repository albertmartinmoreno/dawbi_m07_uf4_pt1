@extends('layout')

@section('title', 'Create')

@section('content')
    <form action="/players" method="POST">
        @csrf
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control text-center" value="{{ $errors->has('name') ? '' : old('name') }}">
            </div>
            @error('name')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="surname" placeholder="Surname" class="form-control text-center" value="{{ $errors->has('surname') ? '' : old('surname') }}">
            </div>
            @error('surname')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="position" placeholder="Position" class="form-control text-center" value="{{ $errors->has('position') ? '' : old('position') }}">
            </div>
            @error('position')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="salary" placeholder="Salary" class="form-control text-center" value="{{ $errors->has('salary') ? '' : old('salary') }}">
            </div>
            @error('salary')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <button class="btn btn-outline-primary mb-3">Create</button>
            <a href="/players" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>
@endsection