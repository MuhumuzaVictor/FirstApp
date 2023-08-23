@extends('authlayout')

@section('title', 'Home Page')
@section('content')
{{ auth()->user()->name }}

@endsection
