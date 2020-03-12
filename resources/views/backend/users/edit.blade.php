@extends('backend.layouts.app')

@section('content')

    <section class="content-header">
        {{-- <h1>
            {{__('dashboard.attributes.edit')}} {{__('dashboard.attributes.user')}}
        </h1> --}}
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')

       <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary mt-2 mr-2">
                      <div class="card-header">
                        <h3 class="card-title">{{__('dashboard.attributes.edit')}} {{__('dashboard.attributes.user')}}</h3>
                      </div>
                         {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                          @include('backend.users.fields')

                         {!! Form::close() !!}
                    </div>
                 </div>
            </div>
        </div>
    </div>
   </div>
@endsection
