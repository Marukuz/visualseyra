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
				<img src="leonardo.jpg" alt="profile_pic">
				<p class="name">{{ Auth::user()->name }}</p>
				<p class="place">
					<span class="icon">
						<i class="fas fa-map-pin"></i>
					</span>
					<span class="place_name">Los Angeles</span>
				</p>
			</div>

			<div class="profile_icons">
				<div class="profile_item">
					<div class="icon"><i class="fas fa-user"></i></div>
					<div class="title">Followers</div>
					<div class="num">162</div>
				</div>
				<div class="profile_item">
					<div class="icon"><i class="fas fa-users"></i></div>
					<div class="title">Following</div>
					<div class="num">19.3M</div>
				</div>
				<div class="profile_item">
					<div class="icon"><i class="fas fa-calendar-alt"></i></div>
					<div class="title">Joined Year</div>
					<div class="num">2010</div>
				</div>
			</div>

			<div class="profile_btn">
				Cambiar Contraseña
			</div>
            <br><br>
            <div class="btn btn-danger">
                Eliminar cuenta
            </div>
		</div>
	</div>
	<div class="profile_slider">
			<ul>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="elephants.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									Elephant Crisis Fund
								</div>
								<div class="item_email">
									@ElephantCrisis
								</div>
							</div>
						</div>
						<div class="slider_right">
							<div class="btn btn_following">Following</div>
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
									Tom Hanks
								</div>
								<div class="item_email">
									@tomhanks
								</div>
							</div>
						</div>
						<div class="slider_right">
							<div class="btn btn_follow">Follow</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="Therevenant.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									TheRevenant
								</div>
								<div class="item_email">
									@RevenantMovie
								</div>
							</div>
						</div>
						<div class="slider_right">
							<div class="btn btn_following">Following</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="obama.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									Barack Obama
								</div>
								<div class="item_email">
									@BarackObama
								</div>
							</div>
						</div>
						<div class="slider_right">
							<div class="btn btn_follow">Follow</div>
						</div>
					</div>
				</li>
				<li>
					<div class="slider_item">
						<div class="slider_left">
							<div class="img">
								<img src="greta.jpg" alt="">
							</div>
							<div class="item">
								<div class="item_name">
									Greta Thunberg
								</div>
								<div class="item_email">
									@GretaThunberg
								</div>
							</div>
						</div>
						<div class="slider_right">
							<div class="btn btn_following">Following</div>
						</div>
					</div>
				</li>
			</ul>
	</div>
</div>
	
<script>
	var settings_btn = document.querySelector(".settings_btn");
	var profile_slider = document.querySelector(".profile_slider");
	var backbtn = document.querySelector(".back_btn");

	settings_btn.addEventListener("click", function(){
		profile_slider.classList.toggle("active");
		this.classList.toggle("active");
	})

    backbtn.addEventListener("click", function(){
        window.location.href = "{{ route('inicio') }}";
	})
</script>
@endsection