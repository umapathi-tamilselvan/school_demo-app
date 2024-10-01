@extends('layouts.app')

@section('content')

@if (session('status'))
    <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('success'))
    <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('delete'))
    <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Hero Section -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Welcome to SSVM</h1>
        <p class="lead">Manage student details efficiently with our system.</p>
        <a href="/home/student/create" class="btn btn-lg btn-light mt-4">Add Student</a>
    </div>
</section>

<!-- Students Table Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center">
                <h3>Student List</h3>
            </div>
            <div class="card-body p-4">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Roll NO</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="/home/student/{{ $student->id }}/view" class="text-decoration-none">{{ $student->name }}</a></td>
                                <td><small>{{$student->roll_no}}</small></td>
                                <td><a href="/home/student/{{ $student->id }}/edit" class="btn btn-outline-warning">Edit</a>

                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<!-- Footer -->
<footer class="bg-dark text-white py-3 position-fixed w-100 bottom-0">
    <div class="container text-center">
        <p class="mb-0">&copy; 2024 SSVM. All rights reserved.</p>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
