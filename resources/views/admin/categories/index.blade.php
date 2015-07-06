@extends('layouts.default')

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
                    <th><h3>All Categories<h3></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                      <td><h4>{{ $category->name }}</h4></td>
                    <td>
                <a href="{{ action('CategoriesController@create') }}" class="btn btn-primary">Add </a>
                <a href="{{ action('CategoriesController@edit', $category->id) }}" class="btn btn-default">Edit</a>
                <a href="{{ action('CategoriesController@destroy', $category->id) }}" class="btn btn-danger">Delete</a>
                

                <br>
                </td>
                 </tr>
                    @endforeach
            </tbody>

        </table>
 @endif

@stop
