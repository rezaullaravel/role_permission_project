<div class="col-sm-4">
    <div class="card">
        <div class="card-header">
               <div class="card-body">
                @php
                    $permission_user = DB::table('permission_roles')
                  ->where('role_id',Auth::user()->role_id)
                  ->join('permissions','permission_roles.permission_id','=','permissions.id')
                  ->where('permissions.slug','user')
                  ->select('permissions.name')
                  ->first();

                  $permission_role = DB::table('permission_roles')
                  ->where('role_id',Auth::user()->role_id)
                  ->join('permissions','permission_roles.permission_id','=','permissions.id')
                  ->where('permissions.slug','role')
                  ->select('permissions.name')
                  ->first();

                  $permission_category = DB::table('permission_roles')
                  ->where('role_id',Auth::user()->role_id)
                  ->join('permissions','permission_roles.permission_id','=','permissions.id')
                  ->where('permissions.slug','category')
                  ->select('permissions.name')
                  ->first();

                  $permission_product = DB::table('permission_roles')
                  ->where('role_id',Auth::user()->role_id)
                  ->join('permissions','permission_roles.permission_id','=','permissions.id')
                  ->where('permissions.slug','product')
                  ->select('permissions.name')
                  ->first();
                @endphp
                <div class="list-group">
                    <a href="{{url('dashboard')}}" class="list-group-item list-group-item-action" aria-current="true">
                        Dashboard
                      </a>
                      @if (!empty($permission_user))
                        <a href="{{route('users')}}" class="list-group-item list-group-item-action" aria-current="true">
                        User
                      </a>
                      @endif

                      @if (!empty($permission_role))
                      <a href="{{ route('roles') }}" class="list-group-item list-group-item-action">Role</a>
                      @endif

                      @if (!empty($permission_category))
                      <a href="#" class="list-group-item list-group-item-action">Category</a>
                      @endif

                      @if (!empty($permission_product))
                      <a href="#" class="list-group-item list-group-item-action">Product</a>
                      @endif

                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">Logout</a>
                  </div>
               </div>
        </div>
    </div>
</div>
