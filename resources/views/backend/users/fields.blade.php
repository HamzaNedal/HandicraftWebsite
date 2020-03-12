        <div class="card-body">

          <div class="form-group">
             <label for="name">{{__('dashboard.attributes.name')}}</label>
             <input type="text" class="form-control" id="name" name="username" value="@isset($user) {{ $user->name }} @endisset" placeholder="{{__('dashboard.placeholder.username')}}">
          </div>
          <div class="form-group">
            <label for="email">{{__('dashboard.attributes.email')}}</label>
            <input type="text" class="form-control" id="email" name="email" value="@isset($user) {{ $user->email }} @endisset"placeholder="{{__('dashboard.placeholder.email')}}">
          </div>
          <div class="form-group">
            <label for="password">{{__('dashboard.attributes.password')}}</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="{{__('dashboard.placeholder.password')}}">
          </div>
          <div class="form-group">
            <label>{{__('dashboard.attributes.role')}}</label>
            <select class="form-control" name="level">
                     <option value="0" @isset($user) {{ $user->type == 0 ?  'selected':''  }} @endisset>User</option>
                     <option value="1"@isset($user) {{ $user->type == 1 ?  'selected':''  }} @endisset>Admin</option>
                     <option value="2"@isset($user) {{ $user->type == 2 ?  'selected':''  }} @endisset>Seller</option>
            </select>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{__('dashboard.attributes.save')}}</button>
        </div>
