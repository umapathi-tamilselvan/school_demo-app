@extends('layouts.app')

@section('content')

<!-- Alert Messages -->
@if (session('status'))
    <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show fixed-alert" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('success'))
    <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show fixed-alert" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('delete'))
    <div id="autoHideAlert" class="alert alert-danger alert-dismissible fade show fixed-alert" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Hero Section -->
<section class="bg-dark text-white text-center py-2 " style="background: linear-gradient(45deg, #1b1b1b, #343a40);">
    <div class="container">
        <h1 class="display-6 fw-bold">Welcome to SSVM</h1>
        <p class="lead text-muted">A modern solution to manage student details efficiently.</p>
        <a href="/home/student/create" class="btn btn-lg btn-outline-light  shadow-sm">Add Student</a>
    </div>
</section>

<!-- Students Table Section -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient text-black text-center py-3" style="background: linear-gradient(45deg, #6c757d, #343a40);">
                <h3 class="fw-bold">Student List</h3>
            </div>
            <div class="card-body p-4">
                <table class="table table-striped table-hover table-bordered align-middle text-center">
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
                                <td><a href="/home/student/{{ $student->id }}/view" class="text-decoration-none text-dark fw-bold">{{ $student->name }}</a></td>
                                <td><small class="text-muted">{{ $student->roll_no }}</small></td>
                                <td>
                                    <a href="/home/student/{{ $student->id }}/edit" class="btn btn-warning btn-sm text-white">Edit</a>

                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
<footer class="bg-dark text-white py-3 position-fixed w-100 bottom-0">
    <div class="container text-center">
        <p class="mb-0">&copy; 2024 SSVM. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto-hide alerts -->
<script>
    setTimeout(() => {
        let alertBox = document.querySelector('#autoHideAlert');
        if (alertBox) {
            alertBox.classList.remove('show');
        }
    }, 3000);
</script>

<!-- Custom CSS -->
<style>
    .fixed-alert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1050;
        max-width: 500px;
        width: 100%;
    }
</style>

@endsection
