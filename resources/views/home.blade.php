@extends('layouts.app')

@section('content')
    <create-component v-bind:user="{{ $user }}"></create-component>
@endsection
