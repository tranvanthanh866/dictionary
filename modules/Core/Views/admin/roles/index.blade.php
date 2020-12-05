@extends("Core::admin.template")
@section('name-page')
    {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}
@endsection

@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="float-right" href="{{ route("admin.roles.create") }}">
                        <button class="btn btn-danger">
                            <i class="fas fa-plus"></i>
                            {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                        </button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.role.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.role.fields.permissions') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $role->id ?? '' }}
                                </td>
                                <td>
                                    {{ $role->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($role->permissions()->pluck('name') as $permission)
                                        <span class="badge badge-info">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.roles.show', $role->id) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info"
                                       href="{{ route('admin.roles.edit', $role->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ trans('global.delete') }}">
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
