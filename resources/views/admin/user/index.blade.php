@extends('admin.layouts.index')

@section('content')
    <div class="content">
        <div class=" container-fluid container-fixed-lg bg-white">
            @include('admin.layouts.errors')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <!-- START card -->
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">
                        Users
                    </div>
                    <div class="pull-right">
                        <form action="{{ route('admin.user.index') }}" method="GET">
                            <div class="col-xs-12">
                                <input type="text" class="form-control pull-right" name="search" placeholder="Search"
                                    value="{{ request()->get('search') }}" onsubmit="this.form.submit()">
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>No of Trasnslations</th>
                                <th>No of Quizes</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $each)
                                <tr>
                                    <td class="v-align-middle">
                                        {{$index + 1}}
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->name }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->phone_number }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->email }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->translations_count }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->quiz_attempts_count }}</p>
                                    </td>
                                    <td>
                                        <select name="status" style="width: 125px" class="form-control status-toggle" data-id="{{$each->id}}">
                                            <option value="active" @if($each->status == 'active') selected @endif>Active</option>
                                            <option value="block" @if($each->status == 'block') selected @endif>Block</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if ($users->count() > 0)
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>{{ $users->firstItem() }} to {{ $users->lastItem() }}</b> of
                            {{ $users->total() }} entries</div>
                    @else
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>0 to 0</b> of {{ $users->total() }} entries</div>
                    @endif
                    <div class="text-center">
                        {!! $users->links() !!}
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