@extends('layouts.app')

@section('content')
    <detail-component v-bind:id="{{ $id }}" :user="{{ $user }}"></detail-component>
@endsection
