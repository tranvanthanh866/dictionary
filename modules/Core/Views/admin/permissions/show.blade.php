@extends("Core::admin.template")
@section('name-page')
    {{ trans('cruds.permission.title_singular') }}
@endsection

@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{--<div class="card-header">
                    <h3 class="box-title">{{ trans('global.show') }} {{ trans('cruds.permission.title') }}</h3>
                </div>--}}
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.id') }}
                            </th>
                            <td>
                                {{ $permission->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.permission.fields.title') }}
                            </th>
                            <td>
                                {{ $permission->name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
