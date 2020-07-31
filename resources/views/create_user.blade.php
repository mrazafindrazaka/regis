@extends('layouts.app')

@section('content')
    <create-user-component v-bind:user="{{ $user }}"></create-user-component>
@endsection
