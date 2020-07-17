@extends('layouts.app')

@section('content')
    <detail-quittance-component v-bind:id="{{ $id }}" :user="{{ $user }}"></detail-quittance-component>
@endsection
