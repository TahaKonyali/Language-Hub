@extends('layout.dashboard')
@section('content')
    <div class="dashboard-content">

        <div class="container">
            <h4 class="dashboard-title">Quiz Result - <b>{{$quiz_attempt->language}}</b></h4>
            <div class="d-flex justify-content-between">
                <div class="user-info">
                    <div class="image-block">{{ substr($quiz_attempt->user->name, 0, 1) }}</div>
                    <div>
                        <div class="name">{{ $quiz_attempt->user->name }}</div>
                        <div class="email">{{ $quiz_attempt->user->email }}</div>
                        <div class="date">{{ $quiz_attempt->created_at->format('Y-m-d H:i:s') }}</div>
                    </div>
                </div>
                <div class="single-chart">
                    <svg viewBox="0 0 36 36" class="circular-chart orange">
                        <path class="circle-bg" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <path class="circle" stroke-dasharray="{{ $quiz_attempt->average }}, 100" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <text x="13" y="14.35" class="title-text">Average</text>
                        <text x="20" y="24.35" class="percentage">{{ $quiz_attempt->average }}%</text>
                    </svg>
                </div>
            </div>
            <div class="result-card">
                <div class="result-block">
                    <div class="heading">Total Questions</div>
                    <div class="detail">{{ $quiz_attempt->total_question }}
                    </div>
                </div>
                <div class="result-block">
                    <div class="heading">Correct</div>
                    <div class="detail">{{ $quiz_attempt->correct }}</div>
                </div>
                <div class="result-block">
                    <div class="heading">Wrong</div>
                    <div class="detail">{{ $quiz_attempt->wrong }}</div>
                </div>
            </div>
        </div>
    @endsection
