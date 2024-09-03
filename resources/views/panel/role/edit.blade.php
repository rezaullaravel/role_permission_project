<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container" style="margin-top:7rem;">
        <div class="row">
            @include('panel.partials.sidebar')
            <div class="col-sm-8">
                <form action="{{ route('role.permission.store',$role->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" value="{{ $role->name }}">
                    </div>

                    @foreach($permissions as $permissionGroup)

                        <ul>
                            @php
                                $ids = explode(',', $permissionGroup->ids);
                                $names = explode(',', $permissionGroup->names);
                                $slugs = explode(',', $permissionGroup->slugs);
                            @endphp

                            @foreach($ids as $index => $id)

                            @php
                                $role_perm = DB::table('permission_roles')->where('role_id',$role->id)->where('permission_id',$id)->first();
                            @endphp
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="permission-{{ $id }}" name="permissions[]" value="{{ $id }}"  @if(in_array($id, $existingPermissions)) checked @endif>
                                <label class="form-check-label" for="permission-{{ $id }}">
                                    {{ $names[$index] }}
                                </label>
                            </div>
                            @endforeach
                        </ul>
                    @endforeach

                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
