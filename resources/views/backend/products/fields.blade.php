        <div class="card-body">
          <div class="form-group">
          <label for="name">{{__('dashboard.attributes.name')}}</label>
          <input type="text" class="form-control" id="name" value="@isset($product) {{ $product->pro_name }} @endisset " name="name" placeholder="{{__('dashboard.placeholder.name_pro')}}">
          </div>

          <div class="form-group">
            <label for="price">{{__('dashboard.attributes.price')}}</label>
            <input type="text" class="form-control" id="price" value="@isset($product) {{ $product->pro_price }} @endisset "  name="price" placeholder="{{__('dashboard.placeholder.price_pro')}} ">
          </div>
          <div class="form-group">
            <label>{{__('dashboard.attributes.category')}}</label>
            <select class="form-control" name="category">
                @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="stock">{{__('dashboard.attributes.stock')}}</label>
            <input type="number" class="form-control" id="stock"  value="@isset($product){{ $product->stock }}@endisset" name="stock" placeholder="{{__('dashboard.placeholder.stock_pro')}} ">
          </div>
          <div class="form-group">
            <label for="description">{{__('dashboard.attributes.description')}}</label>
            <input type="text" class="form-control pb-5"   value="@isset($product) {{ $product->pro_info }} @endisset " id="description" name="description" placeholder="{{__('dashboard.placeholder.description_pro')}} ">
          </div>
          <div class="form-group">
            <label for="photo">{{__('dashboard.attributes.photo')}}</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo">
                <label class="custom-file-label" for="photo">{{__('dashboard.placeholder.photo_pro')}}</label>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{__('dashboard.attributes.save')}}</button>
        </div>
