<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="http://localhost/quanlythuvien/csslogin.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <!-- <img src="https://sun-ecommerce-cdn.azureedge.net/ecommerce/service-sites/thumbnail/SunWorld/Logo/2693/image-thumb__2693__640/SW_logo%20new-Slogan_600-01.png" alt="" class="anh-header"> -->
        </div>
        <form action="xulylogin.php" method="post">

            <div class="login">
                    <div class="login-container">
                        <header class="login-header">
                           Tài khoản
                        </header>
        
                        <div class="login-body">
                            <label for="" class="login-tendn">
                                Tên tài khoản
                            </label>
                            <input type="text" name="username" class="nhap_tendn" required="" placeholder="Tên đăng nhập......">
                       
                            <label for="" class="login-tendn">
                                Mật khẩu
                            </label>
                            <input type="password" name="password" class="nhap_matkhau" required="" placeholder="Nhập mật khẩu......">
                            
                            <button id="dangnhap">
                                Đăng nhập
                            </button>
                        </div>
                    </div>
            </div>

        </form>
        <img src="https://cdns.luatduonggia.vn/wp-content/uploads/2021/10/Chuc-nang-vai-tro-va-y-nghia-cua-thu-vien-trong-xa-hoi.jpg" alt="" class="login-anhnen">

    </div>
</body>
</html>