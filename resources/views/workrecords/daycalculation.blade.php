@extends('layouts.workrecords')

@section('title', '日付計算')

@component('components.header')
@endcomponent
{{$today}} <br> {{$test_day}} <br> {{ $firstday }} <br> {{ $reviewday1 }} <br> {{ $reviewday2 }}