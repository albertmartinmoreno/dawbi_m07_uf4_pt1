@extends('layout')

@section('title', 'Create')

@section('content')
    <form action="/teams" method="POST">
        @csrf
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control text-center" value="{{ $errors->has('name') ? '' : old('name') }}">
            </div>
            @error('name')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="stadium" placeholder="Stadium" class="form-control text-center" value="{{ $errors->has('stadium') ? '' : old('stadium') }}">
            </div>
            @error('stadium')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="numMembers" placeholder="Number of members" class="form-control text-center" value="{{ $errors->has('numMembers') ? '' : old('numMembers') }}">
            </div>
            @error('numMembers')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="budget" placeholder="Budget" class="form-control text-center" value="{{ $errors->has('budget') ? '' : old('budget') }}">
            </div>
            @error('budget')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <button class="btn btn-outline-primary mb-3">Create</button>
            <a href="/teams" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>
@endsection