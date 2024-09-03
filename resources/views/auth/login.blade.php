<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container" style="margin-top:7rem;">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Administrative Panel</h4>
                        <div class="card-body">
                            @if (session('error'))
                                 <div class="alert alert-danger">
                                    <span>{{ session('error') }}</span>
                                 </div>
                            @endif

                            

                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-group mt-2">
                                    <input type="submit" value="Login" class="btn btn-success" style="float: right;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
