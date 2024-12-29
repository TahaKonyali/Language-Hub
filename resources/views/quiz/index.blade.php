@extends('layout.dashboard')
@section('content')
    <div class="dashboard-content">

        <div class="container">
            <div class="d-flex justify-content-between">
                <h4 class="dashboard-title">My Quiz Attempts</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#startQuiz" class="btn btn-sm btn-primary">Start
                    Quiz</button>
            </div>

            <!-- Dashboard My Quiz Attempts Start -->
            <div class="dashboard-my-quiz-attempts">
                <div class="dashboard-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="correct">Language</th>
                                <th class="correct">Correct Answer</th>
                                <th class="incorrect">Incorrect Answer</th>
                                <th class="earned">Earned Marks</th>
                                <th class="result">Result</th>
                                <th class="action"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz_attempts as $each)
                                <tr>
                                    <td class="correct">
                                        <div class="dashboard-table__mobile-heading">Language</div>
                                        <div class="dashboard-table__text">{{ $each->language }}</div>
                                    </td>
                                    <td class="correct">
                                        <div class="dashboard-table__mobile-heading">Correct Answer</div>
                                        <div class="dashboard-table__text">{{ $each->correct }}</div>
                                    </td>
                                    <td class="incorrect">
                                        <div class="dashboard-table__mobile-heading">Incorrect Answer</div>
                                        <div class="dashboard-table__text">{{ $each->wrong }}</div>
                                    </td>
                                    <td class="earned">
                                        <div class="dashboard-table__mobile-heading">Earned %</div>
                                        <div class="dashboard-table__text">{{ $each->average }}%</div>
                                    </td>
                                    @php
                                        $result = $each->average >= 70 ? 'pass' : 'fail';
                                    @endphp
                                    <td class="result">
                                        <div class="dashboard-table__mobile-heading">Result</div>
                                        <div class="dashboard-table__result {{ $result }}">{{ ucfirst($result) }}
                                        </div>
                                    </td>
                                    <td class="action">
                                        <a class="dashboard-table__link"
                                            href="{{ route('quiz.result', ['uuid' => $each->uuid]) }}">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($quiz_attempts) == 0)
                        <div class="w-100 text-center my-3">
                            No Data Available
                        </div>
                    @endif
                    {{ $quiz_attempts->links() }}
                </div>
            </div>
            <!-- Dashboard My Quiz Attempts End -->
        </div>

        <div class="modal fade" id="startQuiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="startQuizLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{route('quiz.attempt')}}" method="POST" id="quiz-form">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="startQuizLabel">Start Quiz</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="dashboard-content__input">
                            <label class="form-label-02">Language</label>
                            <select class="form-select" name="language" required>
                                @foreach ($languages as $each)
                                    <option value="{{$each->name}}">{{$each->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-submit-quiz">Start</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_script')
<script>
    $(document).ready(function(){
        $('#quiz-form').submit(function(){
            $('.btn-submit-quiz').attr('disabled', true);
            $('.btn-submit-quiz').text('Please wait...');
        });
    })
</script>
@endsection