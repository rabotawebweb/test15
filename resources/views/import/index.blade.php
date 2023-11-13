@extends('layouts.app')

@section('content')

<h2>импорт пользователей</h2>

<hr>

<import-component :count="{{ $count }}"></import-component>

<hr>

@endsection