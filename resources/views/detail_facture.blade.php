@extends('layouts.app')

@section('content')
    <detail-facture-component v-bind:id="{{ $id }}" :user="{{ $user }}"></detail-facture-component>
@endsection
