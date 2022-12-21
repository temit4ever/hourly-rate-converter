
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <button type="button" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#createUserModal">
                    Add User
                </button>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                        <td>{{$user['id']}}</td>
                            <td>{{$user['name']}}</td>
                            <td>
                                <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary">
                                Details
                                </a>
                                <form method="post" action="{{route('user.delete', $user ? $user['id'] : null)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        @empty
                            <td>No users</td>
                        @endforelse
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal  to create user-->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createUserModalLabel">Create New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('user.create-user')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
