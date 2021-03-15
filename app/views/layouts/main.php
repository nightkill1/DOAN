<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    // header("Content-Type: application; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="js/Chart.min.js"></script>
    <script src='js/thermometer.js'></script>
    <script src='js/viewData.js'></script>

    <title>Đồ án</title>
</head>
<style>
*{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: Roboto;
 }
body{
     /* display: flex; */
     justify-content: flex-end;
     align-items: center;
     min-height: 100vh;
     flex-direction: column;
     /* background: url(https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_footer_cho_website/Aare.svg); */
 }

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
footer{
    color: #fff;
    position: relative;
    width: 100%;
    height: auto;
    padding: 50px 100px;
    background: #111;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
footer a{
    color: #f55;
}
footer .container-flud{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    flex-direction: row;
}
</style>
<script>
    var obj;    
   
    obj = readTextFile("./models/database.txt");
    function refeshTXT(){
        obj = readTextFile("./models/database.txt");
    }
   
    window.setInterval(()=>{
    location.reload()
    }, 1000000);

    function readTextFile(file)
    {
        let data;
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function ()
        {
            if(rawFile.readyState === 4)
            {
                if(rawFile.status === 200 || rawFile.status == 0)
                {
                    var allText = '[' + rawFile.responseText+ '}]';
                    // alert(allText);
                    data = JSON.parse(allText);
                }
            }
        }

        
        rawFile.send(null);
        return data;
    }
    
    
        
    // function showNow()
    // {
    //     alert(readTextFile("./models/database.txt")[0].pH);
        
    // }
    // function startLivveUpdate(){
    //     window.setInterval(showNow, 3000);
    //     showNow();
    // }
    
    function showNow()
    {
        
        var size = obj.length-1;

        $("#Tempareture-h1-body-box").html(obj[size].Tempareture);
        $("#Oxyzen-h1-body-box").html(obj[size].Oxyzen);
        $("#pH-h1-body-box").html(obj[size].pH);
        $("#NH3-h1-body-box").html(obj[size].NH3);
        $("#temp").val(obj[size].Tempareture);
        
        // draw();
    }
   
    // window.setInterval(showNow(),3000)

</script>

<body style="background-color: rgb(226, 226, 209);" >

<div class="topnav">
  <a class="active" href="./">Trang chủ</a>
  <a href="./dasboard">Thống kê</a>

</div>

    
        
        <div class="card-body p-5">
            
            <?php
                echo $content;
            ?>
        </div> 

        <div>
        <table >
            
            <?php
                // echo dirname(dirname(dirname(__FILE__))).'/models/employee.json';
                

            ?>
        </table>
        </div>
        <footer>
            <div class="container-flud" style="width: 100%;">
                <!--Bắt Đầu Nội Dung Giới Thiệu-->
                <div class="noi-dung about">
                    <h2>Về Chúng Tôi</h2>
                    <p>Lorem ipsumdolor sit...</p>
                    <ul class="social-icon">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <!--Kết Thúc Nội Dung Giới Thiệu-->
                <!--Bắt Đầu Nội Dung Đường Dẫn-->
                <div class="noi-dung links">
                    <h2>Đường Dẫn</h2>
                    <ul>
                        <li><a href="#">Trang Chủ</a></li>
                        <li><a href="#">Về Chúng Tôi</a></li>
                        <li><a href="#">Thông Tin Liên Lạc</a></li>
                        <li><a href="#">Dịch Vụ</a></li>
                        <li><a href="#">Điều Kiện Chính Sách</a></li>
                    </ul>
                </div>
                <!--Kết Thúc Nội Dung Đường Dẫn-->
                <!--Bắt Đâu Nội Dung Liên Hệ-->
                <div class="noi-dung contact">
                    <h2>Thông Tin Liên Hệ</h2>
                    <ul class="info">
                        <li>
                            <span><i class="fa fa-map-marker"></i></span>
                            <span>Đường Số 1<br />
                                Quận 1, Thành Phố Hồ Chí Minh<br />
                                Việt Nam</span>
                        </li>
                        <li>
                            <span><i class="fa fa-phone"></i></span>
                            <p><a href="#">+84 123 456 789</a>
                                <br />
                                <a href="#">+84 987 654 321</a></p>
                        </li>
                        <li>
                            <span><i class="fa fa-envelope"></i></span>
                            <p><a href="#">diachiemail@gmail.com</a></p>
                        </li>
                        <li>
                            <form class="form">
                                <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                                <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <!--Kết Thúc Nội Dung Liên Hệ-->
            </div>
        </footer>
    


    <script>
        
    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>