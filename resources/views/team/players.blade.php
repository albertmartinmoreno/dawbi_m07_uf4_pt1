@extends('layout')

@section('title', 'Players')

@section('content')
    <table class="table table-striped mb-5 text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Team</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->surname }}</td>
                    <td>
                        @if($player->team)
                            {{ $player->team->name }}
                        @else
                            Free agent
                        @endif
                    </td>
                    <td>
                        <form action="/teams/players/{{ $team->id }}/{{ $player->id }}" method="POST" onsubmit="handleSubmit(event, '{{ $player->team ? $player->team->name : null }}', '{{ $player->name }}', '{{ $player->surname }}', '{{ $team->name }}')">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-success">Transfer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function handleSubmit(event, actual_team, name, surname, transfer_team) {
            event.preventDefault();

            if (actual_team && actual_team !== transfer_team && !confirm(`${actual_team} player. Transfer ${name} ${surname} to ${transfer_team} team?`)) {
                return;
            }

            event.target.submit();
        }
    </script>
@endsection