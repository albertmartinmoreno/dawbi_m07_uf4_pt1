@extends('layout')

@section('content')
    @if(session('status'))
        <div class="alert alert-success mb-5">{{ session('status') }}</div>
    @endif
    <a href="/teams/create" class="btn btn-outline-primary mb-5">Create</a>
    <table class="table table-striped mb-5 text-center">
        <thead>
            <tr>
                <th>name</th>
                <th>stadium</th>
                <th>numMembers</th>
                <th>budget</th>
                <th></th>
                <th></th>
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
                        <form action="/teams/{{ $team->id }}" method="POST" onsubmit="handleSubmit(event)">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $teams->links() }}
    <script>
        function handleSubmit(event) {
            event.preventDefault();

            if (confirm("Delete team {{ $team->name }}?")) {
                event.target.submit();
            }
        }
    </script>
@endsection