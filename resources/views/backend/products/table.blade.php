<div class="table-responsive">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered table-hover" id="products-table">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.attributes.prodcut') }}</th>
                        @can('admin', auth()->user())
                         <th>{{ __('dashboard.attributes.owner') }} </th>
                        @endcan


                        <th>{{ __('dashboard.attributes.price') }}</th>
                        <th>{{ __('dashboard.attributes.stock') }}</th>
                        <th>{{ __('dashboard.attributes.status') }}</th>
                        <th colspan="3">{{ __('dashboard.attributes.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                    <td>{{ $product->pro_name }}</td>
                    @can('admin', auth()->user())
                     <td>{{ $product->getUser->name }}</td>
                    @endcan
                    <td>{{ $product->pro_price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if ($product->status == 0)
                          {{ __('dashboard.attributes.active') }}
                          @else
                          {{ __('dashboard.attributes.unactive') }}
                        @endif
                    </td>
                        <td>
                            <form action="{{ route('products.status') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-check" aria-hidden="true"></i></button>
                            </form>
                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
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
