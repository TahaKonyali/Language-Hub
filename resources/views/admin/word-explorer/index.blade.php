@extends('admin.layouts.index')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-start mt-5 mb-2">
            <a href="{{ route('admin.word-explorer.create') }}" class="btn btn-primary pull-right btn-lg ml-2">
                Add Translation Words
            </a>
        </div>
        <div class=" container-fluid container-fixed-lg bg-white">
            @include('admin.layouts.errors')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Translation Words</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <!-- START card -->
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">
                        Translation Wrods
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th  style="width: 25px;">#</th>
                                <th>Category</th>
                                <th>Source Text</th>
                                <th>Translated Text</th>
                                <th>Target Language</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($translations as $index => $each)
                                <tr>
                                    <td class="v-align-middle" style="width: 25px;">
                                        {{$index + 1}}
                                    </td>
                                    <td class="v-align-middle">
                                        {{ $each->category ? $each->category->name : 'N/A'}}
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
                                    
                                    <td class="v-align-middle">
                                        @if(isset($each->image))
                                        <img src="{{asset($each->image)}}" width="50px"/>
                                        @endif 
                                     </td>
                                     <td class="v-align-middle">
                                        <div class="d-flex align-items-center">
                                            <form id="delete_record_{{ $each->id }}"
                                                action="{{ route('admin.word-explorer.destroy', ['word_explorer' => $each->id]) }}"
                                                method="POST" style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline-danger sweet-delete-record confirmDelete"
                                                    data-id="{{ $each->id }}" type="button"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </div>
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