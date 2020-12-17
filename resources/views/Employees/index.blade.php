@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-2 text-right">
                <a class="btn btn-success" href="employees/create">New Employee</a>
            </div>
            <table class="table table-bordered bg-white table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>BirthDate</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </theaD>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->birthdate }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>
                            
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                <button class="p-0 btn btn-link" style="color: red" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No employee found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $employees->links() !!}
        </div>
    </div>
</div>
@endsection