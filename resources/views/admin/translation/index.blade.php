@extends('admin.layouts.index')

@section('content')
    <div class="content">
        <div class=" container-fluid container-fixed-lg bg-white">
            @include('admin.layouts.errors')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Translation</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <!-- START card -->
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">
                        Translations
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Source Text</th>
                                <th>Translated Text</th>
                                <th>Target Language</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($translations as $index => $each)
                                <tr>
                                    <td class="v-align-middle">
                                        {{$index + 1}}
                                    </td>
                                    <td class="v-align-middle">
                                        {{ $each->user ? $each->user->name : 'N/A'}}
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->source_text }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->translated_text }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->target_language }}</p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if ($translations->count() > 0)
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>{{ $translations->firstItem() }} to {{ $translations->lastItem() }}</b> of
                            {{ $translations->total() }} entries</div>
                    @else
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>0 to 0</b> of {{ $translations->total() }} entries</div>
                    @endif
                    <div class="text-center">
                        {!! $translations->links() !!}
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