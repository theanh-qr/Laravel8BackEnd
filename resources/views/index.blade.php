<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.head')
</head>
<body>
	<header class="container-fluid">
		<div class="col-12 col-md-12 button">
			<i class="fas fa-bars" type="button" id="button-menu"></i>
		</div>
		<input type="checkbox" id="check">
		<div class="col-12 col-md-12" id="menu">
			<ul class="row">
				<li class="col-12 col-md-2 btn-outline-warning"><a href="{{ route('/') }}">Giới thiệu</a></li>
				<li class="col-12 col-md-2 btn-outline-warning"><a href="#">Khuyến mãi</a></li>
				<li class="col-12 col-md-2 btn-outline-warning"><a href="#">Tin tức</a></li>
				<li class="col-12 col-md-2 btn-outline-warning"><a href="#">Liên hệ</a></li>
				<li class="col-12 col-md-2 btn-outline-warning"><a href="#">Freeback</a></li>
			</ul>
		</div>
	</header>
	<main class="container-fluid">
		<div class="row">

			<!-- modal -->
			<div class="col-12 col-md-12">
				<div class="button-form row">
					<div class="col-12 col-md-5"></div>
					<button class="col-12 col-md-2 btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Đặt bàn</button>
					<div class="col-12 col-md-5"></div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Nhập thông tin đặt hàng</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				        <form class="row g-3">
				          <div class="col-md-6">
				            <label for="name" class="form-label">Họ và tên </label>
				            <input type="text" class="form-control" id="name" placeholder="Nhập họ tên của bạn">
				          </div>
				          <div class="col-md-6">
				            <label for="phone" class="form-label">Số điện thoại</label>
				            <input type="text" class="form-control" id="phone" placeholder="Nhập số điên thoại của bạn">
				          </div>
				          <div class="col-12">
				            <label for="address" class="form-label">Địa chỉ</label>
				            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ của bạn">
				          </div>
				          <div class="col-md-6">
				            <label for="day" class="form-label">Ngày đặt</label>
				            <input type="date" class="form-control" id="day">
				          </div>
				          <div class="col-md-6">
				            <label for="time" class="form-label">Giờ đặt</label>
				            <input type="time" class="form-control" id="time">
				          </div>
				          <div class="col-12">
				            <label for="choose" class="form-label">Chọn món</label>
				            <select id="choose" class="form-select">
				              <option selected>Lẩu gà</option>
				              <option>Lẩu bò</option>
				              <option>Lẩu dê</option>
				              <option>Lẩu trâu</option>
				              <option>Lẩu cá</option>
				              <option>Lẩu thập cẩm</option>
				            </select>
				          </div>
				          <div class="col-12">
				            <div class="form-check">
				              <input class="form-check-input" type="checkbox" id="gridCheck">
				              <label class="form-check-label" for="gridCheck">
				                Bạn đồng ý đặt nhưng món ăn của chúng tôi.Trân thành cảm ơn
				              </label>
				            </div>
				          </div>
				          <div class="col-12">
				            <button type="submit" class="btn btn-primary">Đặt mua</button>
				          </div>
				        </form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<!-- modal -->

			<!-- icon -->
			<div class="col-12 col-md-12 icon">
				<a href="#"><i class="fas fa-utensils"></i></a>
			</div>
			<!-- icon -->

			<!-- title -->
			<div class="col-12 col-md-12 title">
				<h1 class="col-12 col-md-12 fw-bolder fst-italic text-warning title-main"><i class="fas fa-home"></i> NHÀ HÀNG LẨU HÀ NỘI</h1>
			</div>
			<!-- title -->

			<!-- brief-introduction -->
			<div class="col-12 col-md-12 brief-introduction">
				<p>Nằm sát ven Sông Hồng  Nhà hàng lẩu Hà Nội là một thương hiệu ẩm thực nổi tiếng tại Hà nội luôn là điểm đến ưa chuộng của rất nhiều thực khách từ Nam ra Bắc.Khuôn viên đẹp, không gian yên tĩnh thơ mộng để tổ chức các bữa ăn gia đình hay những buổi họp mặt liên hoan sinh nhật và đặc biệt là địa điểm lý tưởng để tổ chức những buổi tiệc ngoài trời. Các món ăn được chế biến từ cá lăng do đội ngũ đầu bếp kinh nghiệm lâu năm sẽ đem…</p>
			</div>
			<!-- brief-introduction -->

			<!-- images-introduction -->
			<div class="col-12 col-md-12 images-introduction">

				<div class="row images-move">
					<div class="col-2">
					</div>

					<div class="col-8">
						<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img src="/fontendUser/img/Anh-nha-hang1.jpg" class="d-block w-100" alt="...">
						    </div>
						    <div class="carousel-item">
						      <img src="/fontendUser/img/Anh-nha-hang2.jpg" class="d-block w-100" alt="...">
						    </div>
						    <div class="carousel-item">
						      <img src="/fontendUser/img/Anh-nha-hang3.jpg" class="d-block w-100" alt="...">
						    </div>
						  </div>
						  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="visually-hidden">Previous</span>
						  </button>
						  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="visually-hidden">Next</span>
						  </button>
						</div>
					</div>

					<div class="col-2">
					</div>
				</div>

				<div class="row card-image">

					<div class="col-sm-3 col-md-3 card">
						<img src="/fontendUser/img/Anh-nha-hang4.jpg" class="card-img-top">
						<div class="card-body">
							<h3 class="card-text text-center">Cảnh tươi xanh của quán</h3>
							<p>Quán được thiết kê theo xu hướng nghỉ mát xung quanh rất nhiều cây cối </p>
							<a href="chitiettin.html" role="button" class="btn btn-primary center">Đọc tiếp</a>
						</div>
					</div>

					<div class="col-sm-3 col-md-3 card">
						<img src="/fontendUser/img/Anh-nha-hang3.jpg" class="card-img-top">
						<div class="card-body">
							<h3 class="card-text text-center">Nơi uống nước nghỉ ngơi của quán</h3>
							<p>Đây là khu uống nước và nghỉ ngơi thư gián với tầm nhìn hướng ra sông Hồng</p>
							<a href="chitiettin2.html" role="button" class="btn btn-primary center">Đọc tiếp</a>
						</div>
					</div>

					<div class="col-sm-3 col-md-3 card">
						<img src="/fontendUser/img/Anh-nha-hang2.jpg" class="card-img-top">
						<div class="card-body">
							<h3 class="card-text text-center">Con đường vào quán trong lành</h3>
							<p>Con đường vào quán mang đậm màu xanh thư thái ,trong lành và tươi trẻ</p>
							<a href="chitiettin2.html" role="button" class="btn btn-primary center">Đọc tiếp</a>
						</div>
					</div>
				</div>
			</div>
			<!-- images-introduction -->

			<!-- demo food -->
			<div class="col-12 col-md-12 demo-food">
				<h1 class="col-12 col-md-12 fw-bolder fst-italic text-warning title-demo-food"><i class="fas fa-hamburger text-success"></i> CÁC MÓN ĂN ĐẶC TRƯNG <i class="fas fa-hotdog text-danger "></i></h1>
				<div class="row main-demo-food">
					<div class="col-12 col-md-5 border border-4 items">
						<img src="/fontendUser/img/lauga.jfif" class="img-thumbnail" alt="...">
						<p><i class="fas fa-drumstick-bite"></i> Lẩu gà</p>
						<hr>
						<span>250,000 đồng</span>
					</div>
					<div class="col-12 col-md-5 border border-4 items">
						<img src="/fontendUser/img/lautom.jfif" class="img-thumbnail" alt="...">
						<p><i class="fas fa-fish"></i> Lẩu hải sản</p>
						<hr>
						<span>350,000 đồng</span>
					</div>
					<div class="col-12 col-md-5 border border-4 items img-food-hide">
						<img src="/fontendUser/img/lauech.jfif" class="img-thumbnail" alt="...">
						<p><i class="fas fa-drumstick-bite"></i> Lẩu ếch</p>
						<hr>
						<span>200,000 đồng</span>
					</div>
					<div class="col-12 col-md-5 border border-4 items img-food-hide">
						<img src="/fontendUser/img/lautc.jfif" class="img-thumbnail" alt="...">
						<p><i class="fas fa-drumstick-bite"></i> Lẩu thập cẩm</p>
						<hr>
						<span>400,000 đồng</span>
					</div>
				</div>
				<div class="row btn-demo-food">
					<button class="col-12 col-md-4 btn-outline-warning btn-show-img-food" type="button">Xem thêm</button>
					<button class="col-12 col-md-4 btn-outline-warning btn-hide-img-food" type="button">Ẩn bớt</button>
				</div>
			</div>
			<!-- demo food -->

			<!-- login email -->
			<div class="col-12 col-md-12 login-email">
				<h1 class="col-12 col-md-12 fw-bolder fst-italic text-warning title-email"><i class="fas fa-envelope"></i> ĐĂNG KÝ EMAIL</h1>
				<h4 class="title-email">Đăng ký email để nhận được thông tin của chúng </h4>
				<form class="row g-3">
					<div class="col-4">
				        <input type="email" class="form-control" id="address" placeholder="Nhập địa chỉ email của bạn">
			        </div>
			        <div class="col-1">
				        <input type="submit" class="btn btn-primary" value="Giử">
			        </div>
				</form>

			</div>
			<!-- login email -->
		</div>
	</main>
	<footer class="container-fluid">
		<!-- back top button -->
		<div id="button-back-top">
			<i class="fas fa-chevron-up"></i>
		</div>
		<!-- back top button -->

		<div class="row footer">
			<div class="col-12 col-md-3">
				<h3 class="text-warning">LIÊN HỆ </h3>
				<hr>
				<h5>Nhà hàng lẩu Hà Nội –  Thương hiệu ẩm thực nổi tiếng tại Hà Nội</h5>
				<ul>
					<li><i class="fas fa-envelope"></i> lauhanoi@gmail.com</li>
					<li><i class="fas fa-phone-alt"></i> 091 321 1740 – 091 179 2525</li>
					<li><i class="fas fa-map-marker-alt"></i> Số 445 Bạch Đằng – Phường Chương Dương – Hoàn Kiếm – Hà Nội</li>
				</ul>
			</div>
			<div class="col-12 col-md-3">
				<h3 class="text-warning">THƯ VIỆN </h3>
				<hr>
				<h5>Hình ảnh của hàng</h5>
				<img src="/fontendUser/img/Anh-nha-hang2.jpg" class="img-thumbnail" alt="...">
			</div>
			<div class="col-12 col-md-3">
				<h3 class="text-warning">Ý KIẾN KHÁCH HÀNG </h3>
				<hr>
				<div class="row">
					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      	<h3 class="text-warning">NGỌC LAN</h3>
					      	<h5>Nhà hàng có rất nhiều món ngon, khung cảnh nhà hàng sang trọng, thái độ phục vụ của nhân viên cũng rất chuyên nghiệp.</h5>
					    </div>
					    <div class="carousel-item">
					      	<h3 class="text-warning">HOÀNG TÙNG</h3>
					      	<h5>Tôi đã từng ăn rất nhiều loại cá nhưng có lẽ Cá Lăng tại Nhà Hàng 	Lẩu Hà Nội là món ngon nhất mà tôi từng được ăn.</h5>
					    </div>
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>
				</div>
			</div>
		</div>

	</footer>
</body>
@include('layout.footer')
</html>