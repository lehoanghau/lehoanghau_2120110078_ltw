<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị </title> 
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <style>
        .swapper{
            max-width:600px;
            margin:auto;
            box-shadow:0px 0px 3px black;
            border-radius:10px; 
        }
    </style>
</head>
<body>
    <?php 
    require_once "../vendor/autoload.php";

    use App\Models\User;
    $eroror="";
    if(isset($_POST['DANGNHAP']))
    {
        $username=$_POST['username'];
        $password=sha1($_POST['password']);
        $args=[
            ['password','=',$password],
            ['roles','=',1],
            ['status','=',1],
        ];
        if(filter_var($username,FILTER_VALIDATE_EMAIL)){
            $args[]=['email','=',$username];
        } 
        else{
            $args[]=['username','=',$username];
        }
        
        $user=User::where($args)->first();
        if($user !==null){
            $_SESSION['useradmin']=$username;
            $_SESSTION['user_id']= $user->id;
            $_SESSTION['name']= $user->name;
            $_SESSTION['image']= $user->image;
            header('location:index.php');
        }
        else{
            $eroror="Tài khoản không hợp lệ";
        }
       
    }
    ?>
<form action="login.php" method="post">
    <div class="swapper mt-5 p-4">
        <h1 class="text-danger fs-3 text-center">ĐĂNG NHẬP</h1>
        <div class="mb-3">
            <lable for=""><strong>Tên tài khoản(*)</strong></lable>
            <input class="form-control" type="text" name="username" placeholder="Tên đăng nhập hoặc email" required>
        </div>
        <div class="mb-3">
            <lable for=""><strong>Mật khẩu(*)</strong></lable>
        <input class="form-control" type="password"name ="password"placeholder="Mật khẩu"required>
        </div>
        <div class="mb-3 text-end">
        <input class="btn btn-success" type="submit"value ="Đăng nhập"name="DANGNHAP">
        </div>
        <div class="mb-3 ">
            <p>Chú ý:(*) bắt buộc phải điền thông tin</p>
            <?php if($eroror!=""):?>
                <p class="text-danger"><?=$eroror;?></p>
            <?php endif;?>
        </div>
</body>
</html>