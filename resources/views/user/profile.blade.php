@extends('layouts.master')
@section('body')
    <h1>Welcome</h1> 
    <p>{{$user['id']}}</p>
    <p>{{$user['name']}}</p>
    <p>{{$user['status']}}</p>
@endsection