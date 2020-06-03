@extends('layouts.app')

@section('content')
    <example-component v-bind:user="{{ $user }}"></example-component>
@endsection
