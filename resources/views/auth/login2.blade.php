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
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <!-- Validation Errors -->

  
    <section class="ftco-section" id="login-section" {{ $errors->any() ? 'hidden' : '' }}>
      <div class="container">
        <div class="row justify-content-center">
          <br><br><br><br><br><br><br>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
              <div class="img" style="background-image: url(img/logologin.jpg)"></div>
              <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                  <div class="w-100">
                    <h3 class="mb-4">Login</h3>
                  </div>
                  <div class="w-100">
                    <p class="social-media d-flex justify-content-end">
                      <a href="{{route('google')}}" class="social-icon d-flex align-items-center justify-content-center">
                        <span class="fab fa-google"></span>
                      </a>
                    </p>
                  </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <label class="label" for="validations">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" style="color:red" />
                  </label>
                  <div class="form-group mb-3">
                    <label class="label" for="name">Correo</label>
                    <input type="text" class="form-control" name="email" :value="old('email')" placeholder="Correo" required />
                  </div>
                  <div class="form-group mb-3">
                    <label class="label" for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                  </div>
                  <div class="form-group d-md-flex">
                    <div class="w-50 text-left">
                      <label class="checkbox-wrap checkbox-primary mb-0">
                        Recuerdame
                        <input type="checkbox" checked />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="w-50 text-md-right">
                      <a href="#">¿Contraseña olvidada?</a>
                    </div>
                  </div>
                </form>
                <p class="text-center">
                  No estás registrado? <a href="{{ route('register')}}">Registrarse</a>
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
