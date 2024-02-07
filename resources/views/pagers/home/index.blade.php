{{-- because of yeild --}}
@extends('layouts.app')

{{-- becasue of yeild --}}
@section('content')
    <div class="">
        <div class="text-center">
            <h1 class="home-text">home</h1>
        </div>
    </div>
@endsection

{{-- becasue of stack --}}
@push('css')
    <style>
        .home-text{
            padding-top: 10vh;
            color: rgb(9, 43, 36);
        }
    </style>
@endpush
