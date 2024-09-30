@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container mt-5">
                        <h2 class="mb-4">Add Student Details</h2>
                        <form action="/create/submit" method="POST">
                            @csrf



                            <div class="form-group mt-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="class">Class</label>
                                <input type="text" class="form-control" id="class" name="class" placeholder="Enter class" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="address">Roll no</label>
                                <input type="text" class="form-control" id="address" name="roll_no" placeholder="Enter roll no" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="address">Section</label>
                                <input type="text" class="form-control" id="address" name="section" placeholder="Enter section" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="address">Contact</label>
                                <input type="text" class="form-control" id="address" name="contact" placeholder="Enter contact" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>


                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
