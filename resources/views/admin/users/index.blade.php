@extends('layouts.default')

@section('content')
    <div class="page-header">
        <h1>All Users <small>Gotta catch 'em all!</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route ('admin.users.create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>

    @if ($users->isEmpty())
        <p>There are no users! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
            @foreach($ as $role) 
    <td><span class='role'>{{{ $role->name}}}</span> </td>
                   @endforeach   
                    
                    
                    <td>
        <a href="{{ route ('admin.users.edit', $user->id) }}" class="btn btn-default">Edit</a>
        <a href="{{ route ('admin.users.destroy', $user->id) }}" class="btn btn-danger">Delete</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop
