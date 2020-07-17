@extends('layouts.app')

@section('content')
    <quittance-component v-bind:user="{{ $user }}"></quittance-component>
@endsection
