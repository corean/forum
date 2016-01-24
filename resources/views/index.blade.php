@extends('layouts.master')

@section('content')

    Hello, Corean!

    {{ getenv('APP_ENV') }}

@endsection