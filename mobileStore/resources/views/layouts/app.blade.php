<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        td img{
        height:6rem;
        width:6rem;
        object-fit: cover;
    }
        #description{
        resize: none;
        height:10rem;
        width:40rem;
    }
        .card{
        min-height: 50vh;
        max-width: 100px;
        border:none;
        box-shadow: 0 1px 1px rgba(0,0,0, 0.1);
    }
        .card-body{
        max-width: 30em;
    }
        .card img{
        height:90%;
        max-width: 60%;
        padding:0.5em;
        border-radius:0.7em;

    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
  <body>
    <nav class="navbar navbar-expand bg-black">
        <div class="container-fluid">
            <a href="/" class="navbar-brand text-light">Ecommerce</a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{$message}}
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
                    </button>
                </div>
            @endif
            @yield('main')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function clearForm()
        {
            document.getElementById("productForm").reset();
        }
    </script>
</body>
</html>

