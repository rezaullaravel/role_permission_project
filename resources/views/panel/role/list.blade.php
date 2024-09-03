<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container" style="margin-top:7rem;">
        <div class="row">
            @include('panel.partials.sidebar')
            <div class="col-sm-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        <h4 class="text-center">{{ session('success') }}</h4>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('role.edit',$role->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
