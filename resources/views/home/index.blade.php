@extends('layouts.base')

@section('page.title', 'Аренда багажников в Омске')

@section('content')
<div class="">
    <div class="back-one">
        <div class="container">
            <section id="main" class="mb-5">@include('page.main')</section>
        </div>
    </div>

    <div class="container">            
        <section id="info" class=" mb-4">@include('page.info')</section>
    </div>

    <div class="back-one">
        <div class="container">
            <section id="price" class=" mb-4">@include('page.price')</section>
        </div>
    </div>    

    <div class="container">
        <section id="calculate" class=" mb-4">@include('page.calculate')</section>
    </div>

    <div class="back-one">
        <div class="container">         
            <section id="application" class=" mb-4">@include('page.application')</section>
        </div>
    </div>

    <div class="container">  
        <section id="reviews" class="mb-4 mx-auto">@include('page.reviews')</section>
    </div>

    <div class="back-one">
        <div class="container">          
            <section id="contacts" class="mb-4 mx-auto">@include('page.contacts')</section>
        </div>
    </div>

    <div class="container">  
        <section id="faq" class="mb-4 mx-auto">@include('page.faq')</section>
    </div>
</div>
@endsection
