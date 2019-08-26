<section class="content">
	
	<div class="container-fluid">
		<div class="row clearfix">
			<form method="post" enctype="multipart/form-data">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2>
								Form Data User
							</h2>                    
						</div>
						<div class="body">
                        	<div class="row clearfix">
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Username</label>
                        					<input type="text" name="username" class="form-control" placeholder="Username">
                        				</div>
                        			</div>       
                        		</div>
								<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Bidang</label>
                        					<input type="text" name="bidang" class="form-control" placeholder="Bidang">
                        				</div>
                        			</div>       
                        		</div>
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Password</label>
                        					<input type="password" name="password" class="form-control" placeholder="Password">
                        				</div>
                        			</div>       
                        		</div>
								<div class="col-sm-12">
                        			<div class="form-group">
                        				<div class="form-line">
                        					<label>Foto</label>
                        					<input type="file" name="foto_user" class="form-control">
                        				</div>
                        			</div>       
                        		</div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                          <option value="admin">Admin</option>
                                          <option value="user">User</option>
                                      </select>
                                  </div>
                              </div> 
                        		<div class="col-sm-12">
                        			<div class="form-group">
                        				<button class="btn btn-primary waves-effect" id="simpan" name="simpan">Simpan</button>                       					
                        			</div>
                        		</div> 
                        	</div>
                        </div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php  
if (isset($_POST['simpan'])) {
        require_once("../controller/dbcontroller.php");
        $db_handle = new DBController();

        $username = $_POST['username'];
        $password = md5($_POST['password']);
		$role = $_POST['role'];
		$bidang = $_POST['bidang'];
		$nama_file = $_FILES['foto_user']['name'];// Nama gambar
		$tmp_file = $_FILES['foto_user']['tmp_name'];//Lokasi gambar

		$extensi = explode(".", $_FILES['foto_user']['name']);

        $result = $db_handle->executeUpdate("INSERT INTO tb_user (nama,password,role,bidang,foto_user,point) VALUES('$username','$password','$role','$bidang','$nama_file',100)");
		
        if ($result) {
				move_uploaded_file("$tmp_file", "../assets/user/$nama_file");
                echo '<script>swal("Sukses", "Menambahkan Data Users", "success")</script>';
                echo '<script>setTimeout(function(){ window.location="?page=users" }, 2000)</script>';
        }
}
?>