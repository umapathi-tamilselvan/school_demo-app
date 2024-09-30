<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <!-- Student Photo (Optional) -->
                <div class="text-center mb-4">
                    <img src="https://via.placeholder.com/150" alt="Profile Photo" class="rounded-circle">
                </div>
                <!-- Student Information -->
                <h5 class="card-title text-center">{{ $student->name }}</h5>
                <p class="text-muted text-center">{{ $student->email }}</p>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>
                        <p><strong>Class:</strong> {{ $student->class }}</p>
                        <p><strong>Section:</strong> {{ $student->section }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
                        <p><strong>Contact:</strong> {{ $student->contact}}</p>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

