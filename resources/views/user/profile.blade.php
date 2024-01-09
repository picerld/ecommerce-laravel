<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="width: 18rem;">
                    <img src="https://i.pinimg.com/564x/91/f7/f8/91f7f8af80ec548d9e123aff20ba50bb.jpg" height="250" width="auto" class="card-img-top" alt="...">
                    <div class="card-body bg-light" style="max-height: 200px">
                      <p class="card-text">{{ Auth::user()->name }}</p>
                      <a href="{{ route('home') }}">HOME</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>