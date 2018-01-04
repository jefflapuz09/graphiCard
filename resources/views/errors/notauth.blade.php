<html>
        <head>
                <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        </head>
        <body>
            <div class="container">
                <div class="row" style="margin-top:145px;">
                    <div class="col-md-7">
                        <p class="lead text-center text-muted" style="font-size:50pt;">Authorization Required</p>
                        <p class="lead text-center text-muted">The server could not verify that you are authorized to access the admin page. Please contact the administrator to be able to access the certain page.</p>
                        <p class="text-muted text-center lead">Perhaps would you like to go to <a href="{{ url('/') }}">Home</a> page</p>
                    </div>
                    <div class="col-md-5">
                         <img src="{{ asset('img/restrict.png') }}" style="max-width:350px;">
                    </div>
                </div>
            </div>
        </body>
        </html>
        