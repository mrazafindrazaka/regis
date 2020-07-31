@extends('layouts.app')

@section('content')
    <user-component v-bind:user="{{ $user }}"></user-component>
@endsection
