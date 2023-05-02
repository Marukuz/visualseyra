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
				<img src="{{ asset('../img/profile.png') }}" alt="profile_pic">
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
			</div>
			<br>
			<div class="btn btn-danger btn-sm delete-user" data-user-id="{{ Auth::user()->id }}">
				Eliminar cuenta
			</div>
		</div>
	</div>
	<div class="profile_slider">
		<ul>
			<form>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="Therevenant.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									DNI:
								</div>
								<div class="item_email">
									<input type="text" class="form-control" value="{{ Auth::user()->dni }}">
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="elephants.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									Nombre:
								</div>
								<div class="item_email">
									<input type="text" class="form-control" value="{{ Auth::user()->name }}">
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="tomhanks.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									Correo:
								</div>
								<div class="item_email">
									<input type="text" class="form-control" value="{{ Auth::user()->email }}">
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="tomhanks.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									Telefono:
								</div>
								<div class="item_email">
									<input type="text" class="form-control" value="{{ Auth::user()->telefono }}">
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="text-center">
							&nbsp;&nbsp;&nbsp;
							<div class="btn btn_following">Modificar</div>
						</div>
					</div>
				</li>
			</form>
		</ul>
	</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
<script>
	var settings_btn = document.querySelector(".settings_btn");
	var profile_slider = document.querySelector(".profile_slider");
	var backbtn = document.querySelector(".back_btn");

	settings_btn.addEventListener("click", function() {
		profile_slider.classList.toggle("active");
		this.classList.toggle("active");
	})

	backbtn.addEventListener("click", function() {
		window.location.href = "{{ route('inicio') }}";
	})

	$(function() {
		$('.delete-user').click(function() {
			var userId = $(this).data('user-id');
			$('#deleteModal').modal('show');
			$('#delete-user-button').click(function() {
				$.ajax({
					url: '/users/delete/' + userId,
					method: 'DELETE',
					data: {
						_token: '{{ csrf_token() }}'
					},
					success: function() {
					}
				});
			});
		});
	});
</script>
@endsection