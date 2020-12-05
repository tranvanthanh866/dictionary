@extends("Core::admin.template")
@section('name-page')
    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
@endsection
@section('section-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               {{-- <div class="card-header">
                    <h3 class="box-title">
                        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                    </h3>
                </div>--}}
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Roles
                            </th>
                            <td>
                                @foreach($user->roles()->pluck('name') as $role)
                                    <span class="label label-info label-many">{{ $role }}</span>
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
