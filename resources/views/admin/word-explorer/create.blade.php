@extends('admin.layouts.index')
@section('custom_links')
@endsection
@section('content')
    <div class="content">

        <div class=" container-fluid  container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.word-explorer.index') }}">Translation Word</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @include('admin.layouts.errors')
                        <div class="card-header ">
                            <div class="card-title">Create Translation Word
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.word-explorer.store') }}" id="create-form" role="form" method="POST"
                                autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default ">
                                            <label>Category </label>
                                            <select name="category" class="form-control">
                                                @foreach ($categories as $each)
                                                    
                                                <option value="{{$each->id}}">{{$each->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default ">
                                            <label>Source Language </label>
                                            <select name="source_language" class="form-control">
                                                @foreach ($languages as $each)
                                                    
                                                <option value="{{$each->name}}">{{$each->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Source Text</label>
                                            <input type="text" class="form-control" name="source_text" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default ">
                                            <label>Target Language </label>
                                            <select name="target_language" class="form-control">
                                                @foreach ($languages as $each)
                                                    
                                                <option value="{{$each->name}}">{{$each->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Translated Text</label>
                                            <input type="text" class="form-control" name="translated_text" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Image</label>
                                            <input type="file" class="mt-2 form-control" name="image" required
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="d-flex justify-content-end">
                                    <div class="w-25">
                                        <button type="submit" class="btn btn-primary pull-right btn-lg btn-block">
                                            Create word
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
