@extends('admin.layouts.index')

@section('content')
    <div class="content">
        <div class=" container-fluid container-fixed-lg bg-white">
            @include('admin.layouts.errors')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quiz</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <!-- START card -->
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">
                        Quiz
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Language</th>
                                <th>Total Question</th>
                                <th>Correct</th>
                                <th>Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizs as $index => $each)
                                <tr>
                                    <td class="v-align-middle">
                                        {{$index + 1}}
                                    </td>
                                    <td class="v-align-middle">
                                        {{ $each->user ? $each->user->name : 'N/A'}}
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->language }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->total_question }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->correct }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->average }}%</p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if ($quizs->count() > 0)
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>{{ $quizs->firstItem() }} to {{ $quizs->lastItem() }}</b> of
                            {{ $quizs->total() }} entries</div>
                    @else
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>0 to 0</b> of {{ $quizs->total() }} entries</div>
                    @endif
                    <div class="text-center">
                        {!! $quizs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_script')
<script>
    $('.status-toggle').change(function() {
            var id = $(this).data('id');
            var status = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                type: 'POST',
                url: "/admin/user-status",
                data: {
                    id: id,
                    status: status
                },

            });
        });
</script>
@endsection 