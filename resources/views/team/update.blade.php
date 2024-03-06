@extends('layout')

@section('content')
    <form action="/teams/{{ $team->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-center align-items-center flex-column mb-5">
            <div class="mb-3">
                <input type="text" name="name" placeholder="Name" class="form-control text-center" value="{{ $errors->has('name') ? '' : (old('name') ?: $team->name) }}">
            </div>
            @error('name')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="stadium" placeholder="Stadium" class="form-control text-center" value="{{ $errors->has('stadium') ? '' : (old('stadium') ?: $team->stadium) }}">
            </div>
            @error('stadium')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="numMembers" placeholder="Number of members" class="form-control text-center" value="{{ $errors->has('numMembers') ? '' : (old('numMembers') ?: $team->numMembers) }}">
            </div>
            @error('numMembers')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="text" name="budget" placeholder="Budget" class="form-control text-center" value="{{ $errors->has('budget') ? '' : (old('budget') ?: $team->budget) }}">
            </div>
            @error('budget')
                <div class="text-danger mb-3 text-center">{{ $message }}</div>
            @enderror
            <button class="btn btn-outline-primary mb-3">Update</button>
            <a href="/teams" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>name</th>
                <th>surname</th>
                <th>position</th>
                <th>salary</th>
                <th>Players: {{ count($team->players) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($team->players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->surname }}</td>
                    <td>{{ $player->position }}</td>
                    <td>{{ $player->salary }}</td>
                    <td>
                       <form action="/teams/players/{{ $player->id }}" method="POST" onsubmit="handleSubmit(event, '{{ $player->name }}', '{{ $player->surname }}')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Terminate</button>
                       </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function handleSubmit(event, name, surname) {
            event.preventDefault();

            if (confirm(`Terminate player ${name} ${surname}?`)) {
                event.target.submit();
            }
        }
    </script>
@endsection