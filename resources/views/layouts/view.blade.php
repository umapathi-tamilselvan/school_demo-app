@extends('layouts.app')

@section('content')

<title>Student Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Profile Card -->
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h3>Student Profile</h3>
            </div>
            <div class="card-body">
                <!-- Student Image -->
                <div class="text-center">
                    @if($student->image)
                        <img src="{{ asset('images/students/' . $student->image) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Default Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    @endif
                </div>

                <!-- Student Details -->
                <h5 class="card-title text-center mt-3">{{ $student->name }}</h5>
                <p class="text-muted text-center">{{ $student->email }}</p>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>
                        <p><strong>Class:</strong> {{ $student->class }}</p>
                        <p><strong>Section:</strong> {{ $student->section }}</p>
                        <p><strong>Blood Group:</strong> {{ $student->blood_group }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
                        <p><strong>Contact:</strong> {{ $student->contact }}</p>
                        <p><strong>Address:</strong> {{ $student->address }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mt-4">
            <a href="/home" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</body>

<footer class="bg-dark text-white py-3 position-fixed w-100 bottom-0">
    <div class="container text-center">
        <p class="mb-0">&copy; 2024 SSVM. All rights reserved.</p>
    </div>
</footer>

@endsection
