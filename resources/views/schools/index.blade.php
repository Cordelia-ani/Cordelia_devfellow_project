@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>School Management</h2>
    <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">+ Add School</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->email }}</td>
                    <td>{{ $school->address }}</td>
                    <td>
                        <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('schools.destroy', $school) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
