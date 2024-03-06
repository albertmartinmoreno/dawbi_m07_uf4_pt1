@extends('layout')

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
                        <form action="/teams/players/{{ $team->id }}/{{ $player->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-success">Transfer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection