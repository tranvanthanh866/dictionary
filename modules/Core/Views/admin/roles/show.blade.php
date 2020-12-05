@extends("Core::admin.template")
@section('name-page')
    {{ trans('cruds.role.title_singular') }}
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="box-title">
                        {{ $role->name }}
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.role.fields.id') }}
                            </th>
                            <td>
                                {{ $role->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <td>
                                {{ $role->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Permissions
                            </th>
                            <td>
                                @foreach($role->permissions()->pluck('name') as $permission)
                                    <span class="label label-info label-many">{{ $permission }}</span>
                                @endforeach
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
