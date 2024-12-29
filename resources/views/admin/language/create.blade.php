@extends('admin.layouts.index')
@section('custom_links')
@endsection
@section('content')
    <div class="content">

        <div class=" container-fluid  container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.language.index') }}">Language</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @include('admin.layouts.errors')
                        <div class="card-header ">
                            <div class="card-title">Create Language
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.language.store') }}" id="create-form" role="form" method="POST"
                                autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Code</label>
                                            <input type="text" class="form-control" name="code" placeholder="i.e en" required />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                <div class="d-flex justify-content-end">
                                    <div class="w-25">
                                        <button type="submit" class="btn btn-primary pull-right btn-lg btn-block">
                                            Create language
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_script')
@endsection
