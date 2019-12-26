<?php require_once("../includes/connection.php");?>

<!DOCTYPE html>
<html>
	<head>
			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>

<?php
	if (isset($_POST["edit_subject"])) {//name chỗ nút cập nhâtj
		//lấy thông tin từ các form bằng phương thức POST
		$MANGANHHOC = $_POST["MANGANHHOC"];
		$MAMONHOC = $_POST["MAMONHOC"];
		$TENMONHOC = $_POST["TENMONHOC"];
		
	
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE monhoc SET TENMONHOC = '$TENMONHOC' WHERE MAMONHOC = '$MAMONHOC'";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);

		header('Location: manager.php');
       
	}
 
    $id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}


	$sql = "SELECT * FROM monhoc WHERE MAMONHOC = '$id'";
	$query = mysqli_query($conn,$sql);
      
 
?>


<div class="container" style="width:100%; max-width:600px">

    

	    <div class="panel panel-default">
				<div class="panel-heading"><h4>Cập nhật thông tin môn học</h4></div>
				<div class="panel-body">
					<?php
		              while ( $data = mysqli_fetch_array($query) ) {
		              	
	                ?>
					<form action="edit_subject.php" method="POST">
						

						
							<div class="form-group" >
								<label>Mã ngành học</label>
								<input type="text" name="MANGANHHOC" class="form-control" required value="<?php echo $data['MANGANHHOC']; ?>" readonly/>
							</div>

							<div class="form-group" >
								<label>Mã môn học</label>
								<input type="text" name="MAMONHOC" class="form-control" required value="<?php echo $data['MAMONHOC']; ?>" readonly/>
							</div>


							<div class="form-group">
								<label>Tên môn học</label>
								<input type="text" name="TENMONHOC" class="form-control" required value="<?php echo $data['TENMONHOC']; ?>"/>
							</div>
					    

					    

		                    <div class="form-group" >

									<input type="submit" name="edit_subject" value="Cập nhật" class="btn btn-success" style="margin-top: 25px; margin-left: 0px;"/>
							</div>
					    
                                            
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</body>
</html>
