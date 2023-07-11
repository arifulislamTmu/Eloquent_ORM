<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center d-flex justify-content-between">
                        <div><h4>Resource Controller & Route </h4></div>
                        <div><a href="{{ url('/') }}" class="btn btn-primary"> Back </a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="card table-responsive">
                                    <div class="card-body">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.l</th>
                                                    <th scope="col">Student name</th>
                                                    <th scope="col">Group</th>
                                                    <th scope="col">user info</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $key=> $student)
                                                <tr class="">
                                                    <td scope="row">{{ ++$key }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->group }}</td>
                                                    <td>{{ $student->user->name }}</td>
                                                    <td class="d-flex">
                                                        <a class="btn btn-primary" href="{{ url('student/'.$student->id.'/edit') }}">Edit</a>
                                                       <form action="{{ url('student/'.$student->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                          <button type="submit" class="btn btn-danger">Delete</button>
                                                       </form>

                                                    </td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">

                                <div class="card">
                                    <form action="{{ url('student') }}" method="post">
                                        @csrf
                                    <div class="card-header">
                                        <h5>Student Add</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Group</label>
                                            <input type="text" class="form-control" name="group">
                                        </div>
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
