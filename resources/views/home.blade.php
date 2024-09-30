@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="bg-primary text-white text-center py-5">
    <div class="container">
      <h1>Welcome to  SSVM</h1>
      <p class="lead">Maintaining student details.</p>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-5 ">
    <div class="container text-center">
        <div class="card-body">
            <a href="/create" class="btn btn-success">Add Student</a>


            <table class="table">
                <thead>
                 <tr>
                     <th>S.No</th>
                     <th>Name</th>
                     <th>Edit</th>
                     <th>Delete</th>
                 </tr>
                </thead>

                <tbody>
                      @foreach ($students as $student)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="/home/view/{{$student->id}}">{{$student->name}}</a></td>
                        <td><a class="button is-outlined" href="/home/edit/{{$student->id}}">Edit</a></td>
                        <td>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button is-outlined" onclick="return confirm('Are you sure?')">Delete</button>
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
  <footer class="bg-light py-3 fixed-bottom">
    <div class="container text-center">
      <p class="mb-0">&copy; 2024 My Website. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
