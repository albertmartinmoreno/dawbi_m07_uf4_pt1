@extends('layout')

@section('title', 'Players')

@section('content')
    <a href="/players/create" class="btn btn-outline-primary mb-5">Create</a>
    <table class="table table-striped mb-5 text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Position</th>
                <th></th>
                <th></th>
                <th>Players: {{ count($players) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->surname }}</td>
                    <td>{{ $player->position }}</td>
                    <td>
                        <a href="/teams/update/{{ $player->team_id }}" class="btn btn-outline-success">Transfer</a>
                    </td>
                    <td>
                        <a href="/players/update/{{ $player->id }}" class="btn btn-outline-secondary">Update</a>
                    </td>
                    <td>
                        <form action="/players/{{ $player->id }}" method="POST" onsubmit="handleSubmit(event, '{{ $player->name }}', '{{ $player->surname }}', '{{ $player->team ? $player->team->name : null }}')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function handleSubmit(event, name, surname, team) {
            event.preventDefault();

            if (!team && !confirm(`Delete player ${name} ${surname}?`)) {
                return;
            }

            event.target.submit();
        }
    </script>
@endsection