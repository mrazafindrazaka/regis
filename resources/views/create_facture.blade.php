@extends('layouts.app')

@section('content')
    <create-facture-component v-bind:user="{{ $user }}"></create-facture-component>
@endsection
