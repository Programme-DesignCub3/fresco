@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<section>
    <Home :settings="{{ $settings }}"></Home>
</section>

@endsection
