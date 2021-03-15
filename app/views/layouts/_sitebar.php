<script>

    $.getJSON("./models/nguongantoan.json", function(data) {
        console.log(data)
        $("#tempareture_high").val(data.thietlap.tempareture_high);
        $("#tempareture_low").val(data.thietlap.tempareture_low);
        $("#ph_high").val(data.thietlap.ph_high);
        $("#ph_low").val(data.thietlap.ph_low);
        $("#oxyzen_high").val(data.thietlap.oxyzen_high);
        $("#oxyzen_low").val(data.thietlap.oxyzen_low);
        $("#nh3_high").val(data.thietlap.nh3_high);
        $("#nh3_low").val(data.thietlap.nh3_low);
    });
  
</script>
<?php

    $string = file_get_contents(__DIR__."/../../models/nguongantoan.json");
   
    $json_a = json_decode($string,true);

    $tempareture_high = $json_a[0]["thietlap"]["tempareture_high"];
    $tempareture_low = $json_a[0]["thietlap"]["tempareture_low"];
    $ph_high = $json_a[0]["thietlap"]["ph_high"];
    $ph_low = $json_a[0]["thietlap"]["ph_low"];
    $oxyzen_high = $json_a[0]["thietlap"]["oxyzen_high"];
    $oxyzen_low = $json_a[0]["thietlap"]["oxyzen_low"];
    $nh3_high = $json_a[0]["thietlap"]["nh3_high"];
    $nh3_low = $json_a[0]["thietlap"]["nh3_low"];
    
?>
<div class="theme-tempareture" >
	<div class="box-theme-tempareture" style="background-color: #fff;  text-align: center;">
        <div class="nguongantoan">

            <div class="thongso" style="padding-top: 20px;">
                <div class="thongso_img" style="display: flex;">
                    <img src="https://images.vexels.com/media/users/3/144259/isolated/preview/be06308bc7a18f65606c92852047db26-temperature-icon-celcius-by-vexels.png" alt="Nhiệt độ" width="70" style="margin: 0px 20px;">
                    <div class="thongso_input">
                        <div><b>Nhiệt độ</b></div>
                        <div class="thongso_input_cao" style="display: flex;">
                            <span>Cao: </span>
                            <input type="number" id="tempareture_high" style="margin: 0px 5px 10px 5px;" disabled value="<?php echo $tempareture_high?>">
                            <span> &#186;C</span>
                        </div>
                        
                        <div class="thongso_input_thap" style="display: flex;">
                            <span>Thấp: </span>
                            <input type="number" id="tempareture_low" style="margin-right: 5px;"  disabled value="<?php echo $tempareture_low?>">
                            <span> &#186;C</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thongso" style="padding-top: 20px;">
                <div class="thongso_img" style="display: flex;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQpPXIfO09ZCu669rinU_t6NxmDp3WE5ZUgA&usqp=CAU" alt="nồng độ pH"  width="70" style="margin: 0px 20px;">
                    <div class="thongso_input">
                        <div><b>Nồng độ pH</b></div>
                        <div class="thongso_input_cao" style="display: flex;">
                            <span>Cao: </span>
                            <input type="number" id="ph_high" style="margin: 0px 5px 10px 5px;" disabled value="<?php echo $ph_high?>" >
                        </div>
                        <div class="thongso_input_thap" style="display: flex;">
                            <span>Thấp: </span>
                            <input type="number" id="ph_low" disabled value="<?php echo $ph_low?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="thongso" style="padding-top: 20px;">
                <div class="thongso_img" style="display: flex;">
                    <img src="http://static1.squarespace.com/static/59d187c1f14aa130067cbf6b/t/59db96a8197aeaa9a5874598/1507563177725/oxygen-icon.png?format=1500w" alt="Oxyzen" width="70" style="margin: 0px 20px;">
                    <div class="thongso_input">
                        <div><b>Nồng độ Oxy hòa tan</b></div>
                        <div class="thongso_input_cao" style="display: flex;">
                            <span>Cao: </span>
                            <input type="number" id="oxyzen_high" style="margin: 0px 5px 10px 5px;" disabled  value="<?php echo $oxyzen_high?>">
                            <span>mg/l</span>
                        </div>
                        <div class="thongso_input_thap" style="display: flex;">
                            <span>Thấp: </span>
                            <input type="number" id="oxyzen_low"  style="margin-right: 5px" disabled value="<?php echo $oxyzen_low?>" >
                            <span>mg/l</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thongso" style="padding-top: 20px;">
                <div class="thongso_img" style="display: flex;">
                    <img src="https://deatrade.eu/image/catalog/industries-served/nh3-icon.png" alt="nh3" width="70" style="margin: 0px 20px;">
                    <div class="thongso_input">
                        <div><b>Nồng độ Amoniac</b></div>
                        <div class="thongso_input_cao" style="display: flex;">
                            <span>Cao: </span>
                            <input type="number" id="nh3_high" style="margin: 0px 5px 10px 5px;" disabled value="<?php echo $nh3_high?>" >
                            <span>mol/l</span>
                        </div>
                        <div class="thongso_input_thap" style="display: flex;">
                            <span>Thấp: </span>
                            <input type="number" id="nh3_low" style="margin-right: 5px" disabled value="<?php echo $nh3_low?>" >
                            <span>mol/l</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-top: 30px;">
                <input type="submit" class="btn btn-success" value="cài đặt" id="setupthietlap">   
            </div>
        </div>
		<!-- <div id="draw" onload="draw();">
            <canvas id='thermometer' width='170' height='500'></canvas>
            
        </div> -->
		<!-- <div class="number-box-theme-tempareture">
            <div >
                <form id='drawThermometer'>
                    <input type="text" id="temp" name="temp" value="10" maxlength="3" style="display: none;" />
                    <br>
                     <input id="defaultSlider" type="range" min="-30" max="50" onchange="setTempAndDraw();" />
                    <br>
                    <input type="button" value="Draw" onclick="draw();">
                </form>
            </div>

            
		</div> -->
        
	</div>
  
</div>


<script>
    var setnuminputvalue = 1;
   function disableinput(){
        $("#tempareture_high").prop('disabled', false);
        $("#tempareture_low").prop('disabled', false);
        $("#ph_high").prop('disabled', false);
        $("#ph_low").prop('disabled', false);
        $("#oxyzen_high").prop('disabled', false);
        $("#oxyzen_low").prop('disabled', false);
        $("#nh3_high").prop('disabled', false);
        $("#nh3_low").prop('disabled', false);
   }
   function enableinput(){
        $("#tempareture_high").prop('disabled', true);
        $("#tempareture_low").prop('disabled', true);
        $("#ph_high").prop('disabled', true);
        $("#ph_low").prop('disabled', true);
        $("#oxyzen_high").prop('disabled', true);
        $("#oxyzen_low").prop('disabled', true);
        $("#nh3_high").prop('disabled', true);
        $("#nh3_low").prop('disabled', true);
        
   }
   $("#setupthietlap").click( 
        function (){
            if(setnuminputvalue === 1 ){
                disableinput();
                setnuminputvalue = 2
            }
            else if(setnuminputvalue === 2){
                var tempareture_high =  $("#tempareture_high").val();
                var tempareture_low = $("#tempareture_low").val()
                var ph_high = $("#ph_high").val()
                var ph_low = $("#ph_low").val()
                var oxyzen_high = $("#oxyzen_high").val()
                var oxyzen_low = $("#oxyzen_low").val()
                var nh3_high = $("#nh3_high").val()
                var nh3_low = $("#nh3_low").val()
                // console.log(tempareture_high)
                $.ajax({
                    url: "/DOAN/public/editjson",
                    type: "POST",
                    data: {
                            tempareture_high: tempareture_high,
                            tempareture_low: tempareture_low,
                            ph_high: ph_high,
                            ph_low: ph_low,
                            oxyzen_high: oxyzen_high,
                            oxyzen_low: oxyzen_low,
                            nh3_high: nh3_high,
                            nh3_low: nh3_low
                        },
                datatype: 'json',
                    success: function(data_rq){
                        $("#tempareture_high").val(tempareture_high);
                        $("#tempareture_low").val(tempareture_low)
                        $("#ph_high").val(ph_high)
                        $("#ph_low").val(ph_low)
                        $("#oxyzen_high").val(oxyzen_high)
                        $("#oxyzen_low").val(oxyzen_low)
                        $("#nh3_high").val(nh3_high)
                        $("#nh3_low").val(nh3_low)
                        enableinput();
                        setnuminputvalue = 1
                    },
                    error:function(){
                        console.log("Lỗi");  
                        enableinput();
                    }   
                }); 
            }
        }
    )

    function sentEmailWarrning(){
            var tempareture_high = $("#tempareture_high").val();
            var tempareture_low = $("#tempareture_low").val();
            var ph_high = $("#ph_high").val();
            var ph_low = $("#ph_low").val();
            var oxyzen_high = $("#oxyzen_high").val();
            var oxyzen_low = $("#oxyzen_low").val();
            var nh3_high = $("#nh3_high").val();
            var nh3_low = $("#tempareture_high").val();
         
            console.log(obj[ obj.length-1].Tempareture);
            console.log(obj[ obj.length-1].pH);
            console.log(obj[ obj.length-1].Oxyzen);
            console.log(obj[ obj.length-1].NH3);
            if(obj[ obj.length-1].Tempareture > tempareture_high || obj[ obj.length-1].Tempareture <  tempareture_low )
            {
                $.ajax({
                    url: "/DOAN/public/sentmail",
                    type: "POST",
                    data: {
                            high: tempareture_high,
                            low: tempareture_low,
                            now: obj[ obj.length-1].Tempareture,
                            name: "Nhiệt độ",
                            message: "Nhiệt độ hiện tại vược ngưỡng an toàn",
                        },
                datatype: 'json',
                    success: function(data_rq){
                        console.log("đã cảnh báo");
                        console.log(data_rq);
                    },
                    error:function(){
                        console.log("Lỗi"); 
                    }   
                }); 
            }else if(obj[ obj.length-1].pH > ph_high || obj[ obj.length-1].pH <  ph_low )
            {
                $.ajax({
                    url: "/DOAN/public/sentmail",
                    type: "POST",
                    data: {
                            high: ph_high,
                            low: ph_low,
                            now: obj[ obj.length-1].pH,
                            name: "Nồng độ pH",
                            message: "Nồng độ pH hiện tại vược ngưỡng an toàn",
                        },
                datatype: 'json',
                    success: function(data_rq){
                        console.log("đã cảnh báo");
                        console.log(data_rq);
                    },
                    error:function(){
                        console.log("Lỗi"); 
                    }   
                }); 
            }else if(obj[ obj.length-1].Oxyzen > oxyzen_high || obj[ obj.length-1].Oxyzen <  oxyzen_low )
            {
                $.ajax({
                    url: "/DOAN/public/sentmail",
                    type: "POST",
                    data: {
                            high: oxyzen_high,
                            low: oxyzen_low,
                            now: obj[ obj.length-1].Oxyzen,
                            name: "Nồng độ oxy hòa tan",
                            message: "Nồng độ oxy hòa tan hiện tại vược ngưỡng an toàn",
                        },
                datatype: 'json',
                    success: function(data_rq){
                        console.log("đã cảnh báo");
                        console.log(data_rq);
                    },
                    error:function(){
                        console.log("Lỗi"); 
                    }   
                }); 
            }else if(obj[ obj.length-1].NH3 > nh3_high || obj[ obj.length-1].NH3 <  nh3_low ){
                $.ajax({
                    url: "/DOAN/public/sentmail",
                    type: "POST",
                    data: {
                            high: nh3_high,
                            low: nh3_low,
                            now: obj[ obj.length-1].NH3,
                            name: "Nồng độ Amoniac",
                            message: "Nồng độ Amoniac hiện tại vược ngưỡng an toàn",
                        },
                datatype: 'json',
                    success: function(data_rq){
                        console.log("đã cảnh báo");
                        console.log(data_rq);
                    },
                    error:function(){
                        console.log("Lỗi"); 
                    }   
                }); 
            }
        }
        // sentEmailWarrning();

//    $("#tempareture_high").prop('disabled', true);
//    document.getElementById('tempareture_high').disabled = true;
</script>