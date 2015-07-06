@extends('layouts.default')
@section('title')
Edit Category
@stop
@section('content')


{!! Form::model($category, ['method' => 'post', 'action' => 
['CategoriesController@edit', $category->id]]) !!}
<h2>Update: {!! $category->name !!}</h2>

<div class="panel panel-default">
{!! Form::label('name', 'category Name') !!}
{!! Form::text('name') !!}
</div>

{!! Form::submit('Update')!!}
{!! Form::close() !!}

{{---- DELETE -----}}
{!! Form::open(['method' => 'DELETE', 'action' => 
['CategoriesController@destroy', $category->id]])!!}
<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
{!! Form::close()!!}
@stop