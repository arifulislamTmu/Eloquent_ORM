<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center d-flex justify-content-between">
                        <div>
                            <h4>Resource Controller & Route </h4>
                        </div>
                        <div><a href="{{ url('student/create') }}" class="btn btn-success"> Add Student </a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card table-responsive">
                                    <div class="card-body">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.l</th>
                                                    <th scope="col">Student name</th>
                                                    <th scope="col">Group</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr class="">
                                                        <td scope="row">1</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->group }}</td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-primary"
                                                                href="{{ url('student/' . $student->id . '/edit') }}">Edit</a>
                                                            <form action="{{ url('student/' . $student->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>

                                    @foreach ($edit_student as $date )
                                    {{ $date->name }}
                                @endforeach
                                    {{-- <div class="card-body">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.l</th>
                                                    <th scope="col">Post title</th>
                                                    <th scope="col">comments</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($comments as $key => $comment)
                                                    <tr class="">
                                                        <td scope="row">{{ ++$key }}</td>
                                                        <td>{{ $comment->post_title }}</td>
                                                        <td>
                                                            @foreach ($comment->comments as $commet)
                                                                {{ $commet->message }},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
