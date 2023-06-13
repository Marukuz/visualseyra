@extends('plantillaPerfil')
@section('contenido')
    <div class="wrapper">
        <div class="profile_card">
            <div class="back_btn">
                <i class="fas fa-long-arrow-alt-left"></i>
            </div>
            <div class="settings_btn">
                <i class="fas fa-cog"></i>
            </div>
            <div class="profile_wrap">
                <div class="profile_img">
                    <img src="{{ asset('img/profile.png') }}">
                    <p class="name">{{ Auth::user()->name }}</p>
                    <p class="place">
                    </p>
                </div>
                <div class="profile_icons">
                    <div class="profile_item">
                        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        <div class="title">Fecha de creacion</div>
                        <div class="num">{{ Auth::user()->created_at }}</div>
                    </div>
                </div><br>
                <div class="btn btn-primary btn-sm update-password" data-user-id="{{ Auth::user()->id }}">
                    Cambiar Contraseña
                </div>
            </div>
        </div>
        <div class="profile_slider">
            <ul>
                <form action="{{ route('perfil.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <li>
                        <div class="slider_item">
                            <div class="slider_left">
                                <div class="item">
                                    <div class="item_name">
                                        DNI: @error('dni')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_email">
                                        <input type="text" name="dni" class="form-control"
                                            value="{{ Auth::user()->dni }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider_item">
                            <div class="slider_left">
                                <div class="item">
                                    <div class="item_name">
                                        Nombre: @error('name')
                                            <span class="text-danger">{{ $message }}</span>s
                                        @enderror
                                    </div>
                                    <div class="item_email">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider_item">
                            <div class="slider_left">
                                <div class="item">
                                    <div class="item_name">
                                        Correo: @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_email">
                                        <input type="text" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider_item">
                            <div class="slider_left">
                                <div class="item">
                                    <div class="item_name">
                                        Telefono: @error('telefono')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_email">
                                        <input type="text" name="telefono" class="form-control"
                                            value="{{ Auth::user()->telefono }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider_item">
                            <div class="text-center">
                                &nbsp;&nbsp;&nbsp;
                                <button class="btn btn_following" type="submit">Modificar</button>
                            </div>
                        </div>
                    </li>
                </form>
            </ul>
        </div>
    </div>

    <!-- MODAL BORRADO -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Borrado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que quieres borrar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="delete-user-button">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR CONTRASEÑA -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Cambia tu contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label style="color: red" id="errorpass" hidden></label><br>
                    <label class="mt-2">Contraseña:</label>
                    <input type="password" id="pass1" class="form-control mt-2" name="password">

                    <label class="mt-2">Repite la contraseña:</label>
                    <input type="password" id="pass2" class="form-control mt-2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="update-pass-button">Modificar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var settings_btn = document.querySelector(".settings_btn");
        var profile_slider = document.querySelector(".profile_slider");
        var backbtn = document.querySelector(".back_btn");

        // Verifica y aplica el estado de la animación al cargar la página
        window.addEventListener('load', function() {
            var isAnimationOpen = localStorage.getItem('animationState') === 'open';

            if (isAnimationOpen) {
                profile_slider.classList.add("active");
                settings_btn.classList.add("active");
            }
        });

        // Guarda el estado de la animación cuando se cierra la página
        window.addEventListener('beforeunload', function() {
            var isOpen = profile_slider.classList.contains("active");
            localStorage.setItem('animationState', isOpen ? 'open' : 'closed');
        });

        settings_btn.addEventListener("click", function() {
            profile_slider.classList.toggle("active");
            this.classList.toggle("active");
        })

        backbtn.addEventListener("click", function() {
            window.location.href = "{{ route('inicio') }}";
        })

        $(function() {
            $('.update-password').click(function() {
                var userId = $(this).data('user-id');
                $('#passwordModal').modal('show');
                $('#update-pass-button').click(function() {
                    var password = $('#pass1').val();
                    var pass2 = $('#pass2').val();
                    if (password != pass2) {
                        $('#errorpass').text('Las contraseñas no coinciden.');
                        $('#errorpass').removeAttr('hidden');
                    }else if(password == "") {
                        $('#errorpass').text('Las contraseñas no pueden estar en blanco.');
                        $('#errorpass').removeAttr('hidden');
                    } else {
                        $.ajax({
                            url: '/perfil/password/' + userId,
                            method: 'PUT',
                            data: {
                                password,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                window.location.href =
                                    '{{ route('perfil.index') }}';
                            }
                        });

                    }
                })

            });
        });
    </script>
@endsection
