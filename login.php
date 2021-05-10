<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Đăng nhập</h2>
  <form action="" class="was-validated" method="post">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="user" required>
      
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
      
    </div>
   
    <input type="submit" name="btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="Đăng nhập">
	
	<input type="submit" name="btn1" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="Đăng kí">
	
  </form>
</div>


</body>
<?php
          if(isset($_POST['user']))
          $user = $_POST['user'];
          if(isset($_POST['pass']))
          $pass = $_POST['pass'];
          if(isset($_POST['btn'])){
                $conn=mysqli_connect('localhost','root','','test');
                $sql = "select * from users where username = '$user'";
                $kq=mysqli_query($conn,$sql);
                $dem=mysqli_num_rows($kq);
                if($user=='' && $pass ==''){
                    echo "bạn chưa nhập dữ liệu, nhập lại";
                    return 0;
                }
                if($dem==0) {
                    echo "$user"." !tài khoản ko tồn tại";
                    return 0;
                }
                else{
                    $row = mysqli_fetch_assoc($kq);
                }
                if($pass==$row['password']){
                    ?> <center> <?php echo 'Đăng nhập thành công! chuyển đến';
                    $_SESSION['taikhoan']=$user;
                    ?>
                        <a href="http://localhost/Truong_19cntt1a/ruot.php">Trang chủ</a></center>
                    <?php 
                }
                else{
                    echo 'sai mật khẩu';
                }
                
          }
        ?>  
		<div class="button">
                <input type="submit" name="btn1" class="btn" value="">
				</div>

                <?php
                    if(isset($_POST['btn1']))
            {

                header('Location:http://localhost/Truong_19cntt1a/dangki.php');  
            }
           
                ?>
</html>
