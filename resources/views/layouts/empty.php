
<div class="card-body">
                    <a href="/create" class="btn btn-success">Add Student</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Edit</th>
                             <th>Delete</th>
                         </tr>
                        </thead>

                        <tbody>
                              @foreach ($students as $student)
                              <tr>
                                <td>{{$student->id}}</td>
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
