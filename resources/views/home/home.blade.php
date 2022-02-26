@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('status') }}</strong>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Salary</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->address }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            <a href="{{ route('home.edit', $employee->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <form class="my-2"
                                                action="{{ route('home.destroy', $employee->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure want to delete')"
                                                    class="delete btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
