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
        
        draw();
    }
   
    // window.setInterval(showNow(),3000)

</script>

<body style="background-color: rgb(226, 226, 209);" onload="draw()">
    <nav class="navbar navbar-expand navbar-light bg-faded">
        <a class="navbar-brand" href="#">Navbar</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Active <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    
        
        <div class="card-body p-0">
            
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
        <div class="card-footer">Header</div>
    


    <script>
        
    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>