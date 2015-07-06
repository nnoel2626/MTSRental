
@extends('layouts.admin_main')

@section('title')

All the Categories
@stop

@section('content')
    <div class="page-header">
        <h2>Listing of all Categories </h2>
    </div>

        <div class="panel panel-default">
            <div class="panel-body" >

           @if ($categories->isEmpty())
        <p>There are no Categories! :(</p>
    @else

     <table class="table table-striped">
            <thead>
                <tr>
                    <th>All Categories</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                      <td>{{ $category->name }}</td>
                    <td>
                <a href="{{ action('CategoryController@getCreate') }}" class="btn btn-primary">Add </a>
                <a href="{{ action('CategoryController@getEdit', $category->id) }}" class="btn btn-default">Edit</a>
                <a href="{{ action('CategoryController@getDelete', $category->id) }}" class="btn btn-danger">Delete</a>
                

                <br> <br>
                </td>
                 </tr>
                    @endforeach
            </tbody>

        </table>
 @endif

@stop


{{---<div>
<a href='/category/{{ $category->id }}'>{{ $category->name }}</a>
</div>--}}