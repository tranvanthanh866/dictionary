@extends("Core::admin.template")
@section('name-page')
    {{ trans('cruds.role.title_singular') }}
@endsection
@section('head')
    @parent
    <link href="{{asset('vendor/AdminLTE3/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="box-title">{{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <form action="{{ route("admin.roles.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.role.fields.title_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                            <label for="permission">{{ trans('cruds.role.fields.permissions') }}*
                                <span
                                    class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span
                                    class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="permission[]" id="permission" class="form-control select2"
                                    multiple="multiple"
                                    required>
                                @foreach($permissions as $id => $permissions)
                                    <option
                                        value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('permission'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('permission') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.role.fields.permissions_helper') }}
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
@section('script')
    @parent
    <script src="{{asset('vendor/AdminLTE3/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })

        $('.select2').select2()
    </script>
@endsection
