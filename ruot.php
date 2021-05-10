<?php
session_start();?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<style>
	*{
margin: 0 auto;
}

table{
margin-top: 30px;
font-size: 30px;
}

tr{
text-align: center;
}

td{
border: 2px solid black;
padding: 5px;
}
.button 
{
	width:1000px;
	height:200px;
	
	
}
.button .btn{
	width:180px;
	height:50px;
	background-color:pink;
	font-size:30px;
	margin-top: 30px;
	margin-left: 10.5%;
}


	</style>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                $conn=mysqli_connect('localhost','root','','test');
                $sql = 'select * from users';
                $kq=mysqli_query($conn,$sql);
            ?>
            <table>
            <tr>
                    <th>Username</th>
                    <th>Password</th></th>
                    <th>Note</th>               
                    <th>Avatar</th>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($kq)){
                        ?>
                         <tr>
                        <td><?php echo $row["username"] ?></td>   
                        <td><?php echo $row["password"] ?></td>
                        <td><?php echo $row["note"] ?></td>                     
                        <td><img src='<?php echo 'image/'.$row["avatar"] ?>' width=100 height=100 ></td>
                        <td><a href="delete.php ? username=<?php echo $row['username']?> && file= <?php echo $row['avatar']?>"> xóa </a>||
						<a href="update.php ? username=<?php echo $row['username']?> && file= <?php echo $row['avatar']?>">cập nhật</a></td>
                        </tr>
                        <?php
               
                    }
                ?>
            </table>
			<div class="button">
                <input type="submit" name="btn" class="btn" value="Tiếp tục">
				</div>

                <?php
                    if(isset($_POST['btn']))
            {

                header('Location:http://localhost/Truong_19cntt1a/login.php');  
            }
           
                ?>
				
        </form>
    </body>
       
     </html>