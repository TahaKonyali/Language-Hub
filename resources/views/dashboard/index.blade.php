@extends('layout.dashboard')
@section('content')
    <!-- Dashboard Content Start -->
    <div class="dashboard-content">
        
        <translation-component :languages="{{json_encode($languages)}}" :categories="{{json_encode($categories)}}"></translation-component>


    </div>
    <!-- Dashboard Content End -->
@endsection
