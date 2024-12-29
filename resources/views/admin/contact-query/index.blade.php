@extends('admin.layouts.index')

@section('content')
    <div class="content">
        <div class=" container-fluid container-fixed-lg bg-white">
            @include('admin.layouts.errors')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Contact Queries</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <!-- START card -->
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">
                        Contact Queries
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact_queries as $index => $each)
                                <tr>
                                    <td class="v-align-middle">
                                        {{$index + 1}}
                                    </td>
                                    <td class="v-align-middle">
                                        {{ $each->name}}
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->email }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->message }}</p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if ($contact_queries->count() > 0)
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>{{ $contact_queries->firstItem() }} to {{ $contact_queries->lastItem() }}</b> of
                            {{ $contact_queries->total() }} entries</div>
                    @else
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>0 to 0</b> of {{ $contact_queries->total() }} entries</div>
                    @endif
                    <div class="text-center">
                        {!! $contact_queries->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection