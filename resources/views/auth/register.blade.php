<!DOCTYPE html>
<html lang="en">
<head>
  <title>Visualseyra</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<section class="ftco-section hidden" id="register-section" >
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="img" style="background-image: url(img/logologin.jpg)"></div>
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">Registro</h3>
                </div>
              </div>
              <form action="{{route('usuario.store')}}" method="POST" class="signup-form">
                @csrf
                <div class="form-group mb-3">
                  <label class="label" for="dni">DNI
                    @error('dni')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="text" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="DNI" required />
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="name">Nombre
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required />
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="email">Correo
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo" required />
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="phone">Teléfono
                    @error('telefono')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" required />
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">Registrarse</button>
                </div>
              </form>
              <p class="text-center">
                Ya tienes una cuenta? <a href="{{route('login')}}">Iniciar sesión</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap/latest/js/bootstrap.min.js"></script>
</body>
</html>
