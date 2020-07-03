@extends('layouts.app')

@section('content')
    <home-component v-bind:user="{{ $user }}"></home-component>
@endsection
