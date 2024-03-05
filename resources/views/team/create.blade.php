@extends('layout')

@section('content')
    <form action="/teams" method="POST">
        @csrf
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="mb-3">
                <input type="text" name="name" placeholder="name" class="form-control text-center" value="{{ $errors->has('name') ? '' : old('name') }}">
            </div>
            @error('name')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="stadium" placeholder="stadium" class="form-control text-center" value="{{ $errors->has('stadium') ? '' : old('stadium') }}">
            </div>
            @error('stadium')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="numMembers" placeholder="numMembers" class="form-control text-center" value="{{ $errors->has('numMembers') ? '' : old('numMembers') }}">
            </div>
            @error('numMembers')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="budget" placeholder="budget" class="form-control text-center" value="{{ $errors->has('budget') ? '' : old('budget') }}">
            </div>
            @error('budget')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <button class="btn btn-outline-primary mb-3">Create</button>
            <a href="/teams" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>
@endsection