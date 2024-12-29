@extends('admin.layouts.index')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-start mt-5 mb-2">
            <a href="{{ route('admin.language.create') }}" class="btn btn-primary pull-right btn-lg ml-2">
                Create Language
            </a>
        </div>
        <div class=" container-fluid container-fixed-lg bg-white">
            @include('admin.layouts.errors')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Language</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <!-- START card -->
            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">
                        Languages
                    </div>
                    <div class="pull-right">
                        <form action="{{ route('admin.language.index') }}" method="GET">
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
                                <th>Name</th>
                                <th>Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $each)
                                <tr>
                                    <td class="v-align-middle">
                                        <p>{{ $each->name }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $each->code }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.language.edit', ['language' => $each->id]) }}"
                                                class="btn btn-outline-info mx-2">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <form id="delete_record_{{ $each->id }}"
                                                action="{{ route('admin.language.destroy', ['language' => $each->id]) }}"
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
                    @if ($languages->count() > 0)
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>{{ $languages->firstItem() }} to {{ $languages->lastItem() }}</b> of
                            {{ $languages->total() }} entries</div>
                    @else
                        <div class="dataTables_info mb-2" id="tableWithSearch_info" role="status" aria-live="polite">
                            Showing <b>0 to 0</b> of {{ $languages->total() }} entries</div>
                    @endif
                    <div class="text-center">
                        {!! $languages->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection