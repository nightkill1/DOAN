<div class="row">

	<div class="col-sm-12 col-md-8 col-lg-9">
		<!-- <form  style="width: 100%; text-align: center; padding: 10px 10px 10px 10px;" > -->
			<div style="width: 100%; text-align: center; padding: 10px 10px 10px 10px; display: flex; background-color: #fff; justify-content: space-between; align-items: center;">
				<h2 style="padding-right: 20px ">Thống kê theo</h2>
			
				<select id="card" style="width: 100px; font-size: 20px;">
                    <option value="hour">Giờ</option>
					<option value="date">Ngày</option>
					<option value="month">Tháng</option>
					<option value="op_year">Năm</option>
				</select>
				<!-- <input type="datetime-local" value="2000-01-01T00:00:00+05:00" id="birthdaytime" name="birthdaytime"> -->
				
                <div id="card_hour" style="display: flex; font-size: 2rem; display: block;" ><span style="padding-right: 5px;">Giờ</span><input id="input_hour" name="hour" type="number"  min="0" max="23" value="0" placeholder="hh" required /></div>
                <div id="card_date" style="display: flex; font-size: 2rem; display: block;" ><span style="padding-right: 5px;">Ngày</span><input id="input_date" name="date" type="date" required/></div>
				<div id="card_month" style="display: flex; font-size: 2rem; display: none;" ><span style="padding-right: 5px;">Tháng</span><input id="input_month" name="month" type="month" id="input_month" value="<?=date('2017-01')?>" /></div>
                <div id="card_year" style="display: flex; font-size: 2rem; display: none;" ><span style="padding-right: 5px;">Năm</span><input id="input_year" name="year" type="number" placeholder="YYYY" min="2000" max="2022" value="2000" /></div>
                <input id="button_sub" type="submit" value="sent" style="width: 70px; height: 50px;  background-color: steelblue; color: white; font-weight: bold;">
		<!-- </form> -->
                <!-- Change value date -->
                <script>
					let card = $("#card").val();
                    let card_hour = $("#card_hour");
					let card_date = $("#card_date");
					let card_month = $("#card_month");
					let card_year = $("#card_year");
                    // console.log($("#input_date").value)
					$("#card").bind("change paste keyup", function() {
                        if($(this).val() === "hour"){
                            card_hour.show();
                            card_date.show();
							card_month.hide();
							card_year.hide();
                        }else if ($(this).val() === "date") {
                            card_hour.hide();
							card_date.show();
							card_month.hide();
							card_year.hide();
						} else if ($(this).val() === "month") {
                            card_hour.hide();
							card_date.hide();
							card_month.show();
							card_year.hide();
						} else if ($(this).val() === "op_year") {
                            card_hour.hide();
							card_date.hide();
							card_month.hide();
							card_year.show();
						}
					});
				</script>
                
                <!-- Submit sent date time -->
                <script>
                  
                  let button_sub = $("#button_sub");
                    
                    
                    button_sub.click(function(){
						$("#thongsohientai").hide();
						$("#thongsohientai1").hide();
						$("#sitebarthongsohientai").hide();
						let card = $("#card").val();
						let card_hour = $("#card_hour");
						let card_date = $("#card_date");
						let card_month = $("#card_month");
						let card_year = $("#card_year");

						//checked DATE
						if(card_hour.css('display') == 'none'&&card_month.css('display') == 'none'&&card_year.css('display') == 'none'){
							
							var date = $('#input_date').val().split("-");
							var day = date[2];
							var month = date[1];
							var year = date[0];
							var dayed = [day, month, year].join('-');
							console.log(input_year);
							$.ajax({
							url: "/DOAN/public/sentdate?date="+dayed, 
							type: "GET",
							datatype: 'html',
								success: function(html){
									console.log(html)
									$("#test").html(html);
								},
								error:function(){
									console.log("Lỗi");  
								}   
							}); 
							//CHECKED HOUR
						}else if(card_month.css('display') == 'none'&&card_year.css('display') == 'none'){
							let input_hour = $("#input_hour").val();
							var date = $('#input_date').val().split("-");
							var day = date[2];
							var month = date[1];
							var year = date[0];
							var dayed = [day, month, year].join('-');
							console.log(input_year);
							$.ajax({
							url: "/DOAN/public/sentdate?hour="+input_hour+"&date="+dayed, 
							type: "GET",
							datatype: 'html',
								success: function(html){
									console.log(html)
									$("#test").html(html);
								},
								error:function(){
									console.log("Lỗi");  
								}   
							}); 
							//CHECK MONTH
						}else if(card_hour.css('display') == 'none'&&card_date.css('display') == 'none'&&card_year.css('display') == 'none'){
							
							let input_month = $("#input_month").val();
							$.ajax({
							url: "/DOAN/public/sentdate?month="+input_month, 
							type: "GET",
							datatype: 'html',
								success: function(html){
									console.log(html)
									$("#test").html(html);
								},
								error:function(){
									console.log("Lỗi");  
								}   
							}); 
							// CHECKED YEAR
						}else if(card_hour.css('display') == 'none'&&card_date.css('display') == 'none'&&card_month.css('display') == 'none'){
							console.log("year")
							let input_year = $("#input_year").val();
							$.ajax({
							url: "/DOAN/public/sentdate?year="+input_year, 
							type: "GET",
							datatype: 'html',
								success: function(html){
									console.log(html)
									$("#test").html(html);
								},
								error:function(){
									console.log("Lỗi");  
								}   
							}); 
						}
                    });
                </script>
			</div>
		
		<script>
			window.onload = function() {

				var chart_temp = {
					title: {

					},
					axisY: {
						title: "Giá trị chỉ số"
					},
					data: [{
						type: "line",
						dataPoints: [{
								y: 21,
								label: "Sunday"
							},
							{
								y: 12,
								label: "MonDay"
							},
							{
								y: 22,
								label: "Tuesday"
							},
							{
								y: 5,
								label: "Wednesday"
							},
							{
								y: 0,
								label: "Thurday"
							},
							{
								y: 10,
								label: "Friday"
							},
							{
								y: 2,
								label: "Satuday"
							},
						]
					}],
				};
				var chart_pH = {
					title: {

					},
					axisY: {
						title: "Giá trị chỉ số"
					},
					data: [{
						type: "line",
						dataPoints: [{
								y: 21,
								label: "Sunday"
							},
							{
								y: 12,
								label: "MonDay"
							},
							{
								y: 22,
								label: "Tuesday"
							},
							{
								y: 5,
								label: "Wednesday"
							},
							{
								y: 0,
								label: "Thurday"
							},
							{
								y: 10,
								label: "Friday"
							},
							{
								y: 2,
								label: "Satuday"
							},
						]
					}],
				};
				var chart_oxyzen = {
					title: {

					},
					axisY: {
						title: "Giá trị chỉ số"
					},
					data: [{
						type: "line",
						dataPoints: [
							// {
							// 	y: 21,
							// 	label: "Sunday"
							// },
							// {
							// 	y: 12,
							// 	label: "MonDay"
							// },
							// {
							// 	y: 22,
							// 	label: "Tuesday"
							// },
							// {
							// 	y: 5,
							// 	label: "Wednesday"
							// },
							// {
							// 	y: 0,
							// 	label: "Thurday"
							// },
							// {
							// 	y: 10,
							// 	label: "Friday"
							// },
							// {
							// 	y: 2,
							// 	label: "Satuday"
							// },
						]
					}],
				};
				var chart_nh3 = {
					title: {

					},
					axisY: {
						title: "Giá trị chỉ số"
					},
					data: [{
						type: "line",
						dataPoints: [
							{
								y: 22,
								label: "Sunday"
							},
							{
								y: 12,
								label: "MonDay"
							},
							{
								y: 22,
								label: "Tuesday"
							},
							{
								y: 5,
								label: "Wednesday"
							},
							{
								y: 0,
								label: "Thurday"
							},
							{
								y: 10,
								label: "Friday"
							},
							{
								y: 2,
								label: "Satuday"
							},
						]
					}],
				};
				


				// console.log(chart_oxyzen.data[0].dataPoints);
				// console.log(obj)
				
				function getDataOxyzenNow() {
					chart_oxyzen.data[0].dataPoints = [];
					let count = obj.length;
					let tam = new Object();
					
					for (let i = count - 13; i < count; i++) {
						
						tam = {
							y:	parseFloat(obj[i].Oxyzen),
							label: obj[i].hour+":"+obj[i].minus+":"+obj[i].second,
						}
						// console.log(tam)
						chart_oxyzen.data[0].dataPoints.push(tam)
						
					}

					// console.log(chart_oxyzen.data[0].dataPoints)
				}

				function getDatapHNow() {
					chart_pH.data[0].dataPoints = [];
					let count = obj.length;
					let tam = new Object();
					
					for (let i = count - 13; i < count; i++) {
						
						tam = {
							y:	parseFloat(obj[i].pH),
							label: obj[i].hour+":"+obj[i].minus+":"+obj[i].second,
						}
						// console.log(tam)
						chart_pH.data[0].dataPoints.push(tam)
						
					}

					// console.log(chart_oxyzen.data[0].dataPoints)
				}

				function getDataNH3Now() {
					chart_nh3.data[0].dataPoints = [];
					let count = obj.length;
					let tam = new Object();
					
					for (let i = count - 13; i < count; i++) {
						
						tam = {
							y:	parseFloat(obj[i].NH3),
							label: obj[i].hour+":"+obj[i].minus+":"+obj[i].second,
						}
						// console.log(tam)
						chart_nh3.data[0].dataPoints.push(tam)
						
					}

					// console.log(chart_nh3.data[0].dataPoints)
				}

				function getDataTempNow() {
					chart_temp.data[0].dataPoints = [];
					let count = obj.length;
					let tam = new Object();
					
					for (let i = count - 13; i < count; i++) {
						
						tam = {
							y:	parseFloat(obj[i].Tempareture),
							label: obj[i].hour+":"+obj[i].minus+":"+obj[i].second,
						}
						// console.log(tam)
						chart_temp.data[0].dataPoints.push(tam)
						
					}

					// console.log(chart_temp.data[0].dataPoints)
				}
				getDataTempNow();
				getDatapHNow();
				getDataOxyzenNow();
				getDataNH3Now();
				var biuldChar = new CanvasJS.Chart("chartContainer", chart_temp)
				
				biuldChar.render();
				var biuldChar1 = new CanvasJS.Chart("chartContainer1", chart_pH)
				
				biuldChar1.render();
				var biuldChar2 = new CanvasJS.Chart("chartContainer2", chart_oxyzen)
				
				biuldChar2.render();
				var biuldChar3 = new CanvasJS.Chart("chartContainer3", chart_nh3)
				
				biuldChar3.render();

			}

		</script>
		<div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%;" id="thongsohientai">
			<div id="div_temp" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
					<h1>
						THÔNG SỐ NHIỆT ĐỘ
					</h1>
				</div>
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			</div>
			<div id="div_pH" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6e6; ">
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
					<h1>
						THÔNG SỐ NỒNG ĐỘ PH
					</h1>
				</div>
				<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
			</div>
		</div>


		<div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%;" id="thongsohientai1">
			<div id="div_oxyzen" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
					<h1>
						THÔNG SỐ OXYZEN
					</h1>
				</div>
				<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
			</div>
			<div id="div_NH3" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6ff;">
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
					<h1>
						THÔNG SỐ NỒNG ĐỘ NH3
					</h1>
				</div>
				<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
			</div>
		</div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</div>
	<div class="col-sm-12 col-md-4 col-lg-3" style="margin-top: 100px; padding: 10px 0px 10px 0px; height: 100%; background-color: #fff;" id="sitebarthongsohientai">
		<div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; font-size: 20px; ">
			<div style="text-align: center; padding-bottom: 20px;">
				<h2><b>HIỂN THỊ THÔNG SỐ </b> </h2>
			</div>
			<form action="/action_page.php">
				<div style="width: 100%; ">
					<label for="vehicle1"> THÔNG SỐ NHIỆT ĐỘ</label>
					<input type="checkbox" id="checked_temp" name="checked_temp" value="Bike" style="width: 25px; height: 25px;" checked onclick="isChecked()">
					<br>
					<br>
				</div>


				<div style="width: 100%; ">
					<label for="vehicle2">THÔNG SỐ NỒNG ĐỘ PH</label>
					<input type="checkbox" id="checked_pH" name="checked_temp" value="Car" style="width: 25px; height: 25px;" checked onclick="isChecked()">
					<br>
					<br>
				</div>

				<div style="width: 100%; ">
					<label for="vehicle3">THÔNG SỐ OXYZEN</label>
					<input type="checkbox" id="checked_oxyzen" name="checked_temp" value="Boat" style="width: 25px; height: 25px;" checked onclick="isChecked()">
					<br>
					<br>
				</div>

				<div style="width: 100%; ">
					<label for="vehicle3">THÔNG SỐ NỒNG ĐỘ NH3</label>
					<input type="checkbox" id="checked_NH3" name="checked_temp" value="Boat" style="width: 25px; height: 25px;" checked onclick="isChecked()">
					<br>
					<br>
				</div>

			</form>

		</div>
	</div>
</div>

<script>
	function setIsCheck() {
		var checkBox_temp = document.getElementById("checked_temp");
		var div_temp = document.querySelector("#div_temp");
		var checkBox_pH = document.getElementById("checked_pH");
		var div_pH = document.querySelector("#div_pH");
		var checkBox_oxyzen = document.getElementById("checked_oxyzen");
		var div_oxyzen = document.querySelector("#div_oxyzen");
		var checkBox_NH3 = document.getElementById("checked_NH3");
		var div_NH3 = document.querySelector("#div_NH3");
		div_pH.style.display = "none";
		div_oxyzen.style.display = "none";
		div_NH3.style.display = "none";
	}

	function isChecked() {
		var checkBox_temp = document.getElementById("checked_temp");
		var div_temp = document.querySelector("#div_temp")
		var checkBox_pH = document.getElementById("checked_pH");
		var div_pH = document.querySelector("#div_pH")
		var checkBox_oxyzen = document.getElementById("checked_oxyzen");
		var div_oxyzen = document.querySelector("#div_oxyzen")
		var checkBox_NH3 = document.getElementById("checked_NH3");
		var div_NH3 = document.querySelector("#div_NH3")

		if (checkBox_temp.checked == true) {
			div_temp.style.display = "block";

			console.log("div_temp")
		} else {
			div_temp.style.display = "none";
		}

		if (checkBox_pH.checked == true) {
			div_pH.style.width = "100%";
			div_pH.style.display = "block";


			console.log("div_pH")
		} else {
			div_pH.style.display = "none";
		}

		if (checkBox_oxyzen.checked == true) {
			div_oxyzen.style.display = "block";
			console.log("div_oxyzen")
		} else {
			div_oxyzen.style.display = "none";
		}

		if (checkBox_NH3.checked == true) {
			div_NH3.style.display = "block";
			console.log("div_NH3")
		} else {
			div_NH3.style.display = "none";
		}

	}
</script>
<div id="test">
</div>