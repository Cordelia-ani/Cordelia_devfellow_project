@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Welcome, SuperAdmin 👋</h1>

    <div class="row mt-4">
        <!-- School Management Card -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">School Management</h5>
                    <p class="card-text">Add, edit, and manage school records.</p>
                    <a href="{{ route('schools.index') }}" class="btn btn-primary">Go to Schools</a>
                </div>
            </div>
        </div>

        <!-- You can add other admin features here -->
    </div>
</div>
@endsection
