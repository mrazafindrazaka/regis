@extends('layouts.app')

@section('content')
    <create-quittance-component v-bind:user="{{ $user }}"></create-quittance-component>
@endsection
