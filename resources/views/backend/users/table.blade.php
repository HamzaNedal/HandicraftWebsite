<div class="table-responsive">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered table-hover" id="users-table">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.attributes.name') }}</th>
                        <th>{{ __('dashboard.attributes.email') }}</th>
                        <th>{{ __('dashboard.attributes.role') }}</th>
                        <th>{{ __('dashboard.attributes.photo') }}</th>
                        <th colspan="3">{{ __('dashboard.attributes.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                        @if ($user->type == 0)
                             {{ __('dashboard.attributes.user') }}
                          @elseif($user->type == 1)
                             {{ __('dashboard.attributes.admin') }}
                          @else
                             {{ __('dashboard.attributes.seller') }}
                        @endif
                        <td>{{ $user->photo}}</td>
                    </td>
                        <td>

                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>


</div>
