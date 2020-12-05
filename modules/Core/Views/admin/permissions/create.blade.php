@extends("Core::admin.template")
@section('name-page')
    {{ trans('cruds.permission.title_singular') }}
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{--<div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
                    <h3 class="box-title"></h3>
                </div>--}}
                <!-- /.box-header -->
                <div class="card-body">
                    <form action="{{ route("admin.permissions.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.permission.fields.title') }}*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.permission.fields.title_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
