@extends('layouts.app')

@section('content')
    <facture-component v-bind:user="{{ $user }}"></facture-component>
@endsection
