@extends('layout')

@section('title', 'Teams')

@section('content')
    <a href="/teams/create" class="btn btn-outline-primary mb-5">Create</a>
    <table class="table table-striped mb-5 text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Stadium</th>
                <th>Number of members</th>
                <th>Budget</th>
                <th></th>
                <th>Teams: {{ count($teams) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->stadium }}</td>
                    <td>{{ $team->numMembers }}</td>
                    <td>{{ $team->budget }}</td>
                    <td>
                        <a href="/teams/update/{{ $team->id }}" class="btn btn-outline-secondary">Update</a>
                    </td>
                    <td>
                        <form action="/teams/{{ $team->id }}" method="POST" onsubmit="handleSubmit(event, '{{ $team->name }}')">
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
        function handleSubmit(event, name) {
            event.preventDefault();

            if (confirm(`Delete team ${name}?`)) {
                event.target.submit();
            }
        }
    </script>
@endsection