@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.books.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="user_id" name="user_id" value={{ Auth::user()->id }}>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Title*') }}</strong>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Authors (seperated by comma)*') }}:</strong>
                    <input type="text" name="authors" class="form-control" placeholder="Authors">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select class="form-select col-xs-12 col-sm-12 col-md-12" multiple name="genres[]">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Description*') }}</strong>
                    <textarea class="form-control" style="height:50px" value="{{old('description')}}" name="description"
                        placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="cover"><strong>{{ __('Cover*') }}</strong></label>
                    <input type="file" name="cover" class="form-control-file" id="cover">
                  </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Price*') }}</strong>
                    <input type="number" name="price" class="form-control" value="{{old('price')}}" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>

    </form>
@endsection