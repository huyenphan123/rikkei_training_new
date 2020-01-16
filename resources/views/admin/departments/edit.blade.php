@extends('admin.layouts.default')
@section('title', 'Create new Staff')
@section('name_feature', 'Create new Staff')
@section('content')
{{--    <div class="container-fluid">--}}
        <div class="container mt-4">
            <form method="POST" action="{{route('departments.update',[$department->id])}}">
                @csrf
                @method('POST')

                <div class="form-group col-md-6">
                    <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="@if(old('name')) {{old('name')}} @else {{$department['name']}} @endif">

                            @error('name')
                            <span style="color: red" class="invalid-feedback" role="alert">
                                       {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="description" class="col-md-6 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-12">

                            <textarea id="description" name="description" style="width: 538px; height: 300px"
                                      class="form-control  @error('description') is-invalid @enderror"
                                      name="description"
                                      value="@if(old('description')) {{old('description')}} @else {{$department['description']}} @endif">{{$department->description}}
                            </textarea>

                            @error('description')
                            <span style="color: red" class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
