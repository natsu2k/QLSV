<?php
session_start();?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <style>
        .content {
    max-width: 500px;
    margin: auto;
        }
    </style>
    <body class="content">
        <form action="" method="post">
            <h1 align="center">Đăng Ký</h1>
            <div class="form-group">
                <label for="text">Tài khoản:</label>
                <input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="user" value=<?php  if(isset($_POST['user'])) echo $_POST['user']?>>
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="pass">
            </div>
            <div class="form-group">
                <label for="pwd">Nhập lại mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="re-pass">
            </div>
			<div class="form-group">
                <label for="pwd">Note:</label>
                <input type="text" class="form-control" placeholder="Enter note" name="note">
            </div>
			<div class="form-group">
                <label for="pwd">Avatar:</label>
                    <input type="file" class="form-control" placeholder="Enter avatar" name="avatar">
                </div>
				
				
            <input type="submit" name="btn" class="btn btn-success" data-toggle="modal" data-target="#myModal" value="Đăng Ký">
			
        </form>
    </body>
       <?php
          if(isset($_POST['user']))
          $user = $_POST['user'];
          if(isset($_POST['pass']))
          $pass = $_POST['pass'];
          if(isset($_POST['re-pass']))
          $re_pass = $_POST['re-pass'];
		   if(isset($_FILES['note']))
         $note = $_FILES['note'];
		  if(isset($_FILES['avatar']))
         $file = $_FILES['avatar'];
          if(isset($_POST['btn'])){
                $conn=mysqli_connect('localhost','root','','test');
                $sql = "select * from users where username = '$user'";
                $kq=mysqli_query($conn,$sql);
                if(!$kq){
                    echo "lỗi câu truy vấn";
                }
                else{
                    $dem=mysqli_num_rows($kq);
                    if($dem>=1){
                        ?><div class="alert alert-danger">
                            <strong>Error!</strong> Tài khoản này <a class="alert-link">đã tồn tại</a>.
                        </div><?php
                        //echo "tài khoản này đã tồn tại";
                    }
                    else{
                        if($pass!=$re_pass){
                            ?><div class="alert alert-warning">
                                <strong>Warning!</strong> Mật khẩu <a class="alert-link">không khớp nhau, đề nghị nhập lại</a>.
                            </div><?php
                            //echo "mật khẩu không khớp nhau, nhập lại";
                        }
                        else{
                            $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass') ";
                            if(mysqli_query($conn, $sql)){
                                ?><div class="alert alert-success">
                                    <strong>Success!</strong> Đăng ký thành công! <a href="http://localhost/truong/login1.php" class="alert-link">chuyển đến trang đăng nhập</a>.
                                </div><?php
                                //echo "đăng ký thành công!";
                            }
                            else{
                                ?><div class="alert alert-warning">
                                    <strong>Warning!</strong> Đăng ký <a class="alert-link">không thành công</a>.
                                </div><?php
                                //echo "đăng ký không thành công";
                            }
                        }
                    }
                }
                
          }
        ?>  
           </html>