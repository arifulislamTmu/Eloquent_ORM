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
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $key=> $student)
                                                <tr class="">
                                                    <td scope="row">{{ ++$key }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->group }}</td>
                                                </tr>
                                                @endforeach
                                              
                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <form action="{{ url('student/'.$edit_student->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                    <div class="card-header">
                                        <h5>Student Edit</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $edit_student->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Group</label>
                                            <input type="text" class="form-control" name="group" value="{{ $edit_student->group }}">
                                        </div>
                                        <button class="btn btn-success">Update</button>
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
