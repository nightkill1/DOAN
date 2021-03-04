<div class="row">

	<div class="col-sm-12 col-md-8 col-lg-9">
		<form action="./sentdata" method="get"  style="width: 100%; text-align: center; padding: 10px 10px 10px 10px;">
			<div style="width: 100%; text-align: center; padding: 10px 10px 10px 10px; display: flex; background-color: #fff; justify-content: space-between; align-items: center;">
				<h2 style="padding-right: 20px " >Thống kê theo</h2>
				
					<select id="card" style="width: 100px; font-size: 20px;">
						<option value="date">Ngày</option>
						<option value="month">Tháng</option>
						<option value="year">Năm</option>
					</select>
					<input type="datetime-local" value="2000-01-01T00:00:00+05:00" id="birthdaytime" name="birthdaytime">
					<input  id="card_year" type="number" placeholder="YYYY" min="2017" max="2100" style="display: none;">
					<script>
						document.querySelector("input[type=number]")
						.oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
					</script>
					<input id="card_month" type="month" style="display: none;"/>
					<input id="card_date" type="date" style="display: block;">
					<input type="submit" value="sent" style="width: 70px; height: 50px;  background-color: steelblue; color: white; font-weight: bold;">	
					<script>
						let card = $("#card").val();
						let card_date = $("#card_date");
						let card_month = $("#card_month");
						let card_year = $("#card_year");
						$("#card").bind("change paste keyup", function() {
							if($(this).val()==="date"){
								card_date.show();
								card_month.hide();
								card_year.hide();
							}else if($(this).val()==="month"){
								card_date.hide();
								card_month.show();
								card_year.hide();
							}else if($(this).val()==="year"){
								card_date.hide();
								card_month.hide();
								card_year.show();
							}else if($(this).val()==="hour"){
								card_date.hide();
								card_month.hide();
								card_year.hide();
							}
						});
						

						
					</script>
					
			</div>
		</form>
		<script>
				
			window.onload = function () {
			
			var chart_temp = {
				title: {
					
				},
				axisY: {
					title: "Giá trị chỉ số"
				},
				data: [{
					type: "line",
					dataPoints:[
						{"y": 21, "label": "Sunday"},
						{"y": 12, "label": "MonDay"},
						{"y": 22, "label": "Tuesday"},
						{"y": 5, "label": "Wednesday"},
						{"y": 0, "label": "Thurday"},
						{"y": 10, "label": "Friday"},
						{"y": 2, "label": "Satuday"},
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
					dataPoints:[
						{"y": 21, "label": "Sunday"},
						{"y": 12, "label": "MonDay"},
						{"y": 22, "label": "Tuesday"},
						{"y": 5, "label": "Wednesday"},
						{"y": 0, "label": "Thurday"},
						{"y": 10, "label": "Friday"},
						{"y": 2, "label": "Satuday"},
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
					dataPoints:[
						{"y": 21, "label": "Sunday"},
						{"y": 12, "label": "MonDay"},
						{"y": 22, "label": "Tuesday"},
						{"y": 5, "label": "Wednesday"},
						{"y": 0, "label": "Thurday"},
						{"y": 10, "label": "Friday"},
						{"y": 2, "label": "Satuday"},
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
					dataPoints:[
						{"y": 21, "label": "Sunday"},
						{"y": 12, "label": "MonDay"},
						{"y": 22, "label": "Tuesday"},
						{"y": 5, "label": "Wednesday"},
						{"y": 0, "label": "Thurday"},
						{"y": 10, "label": "Friday"},
						{"y": 2, "label": "Satuday"},
					]
				}],
			};
			var biuldChar =  new CanvasJS.Chart("chartContainer", chart_temp)
			chart_temp.data[0].dataPoints.push({"y": 10, "label": "EEEE"});
			biuldChar.render();
			var biuldChar1 =  new CanvasJS.Chart("chartContainer1", chart_pH)
			chart_pH.data[0].dataPoints.push({"y": 10, "label": "EEEE"});
			biuldChar1.render();
			var biuldChar2 =  new CanvasJS.Chart("chartContainer2", chart_oxyzen)
			chart_oxyzen.data[0].dataPoints.push({"y": 10, "label": "EEEE"});
			biuldChar2.render();
			var biuldChar3 =  new CanvasJS.Chart("chartContainer3", chart_nh3)
			chart_nh3.data[0].dataPoints.push({"y": 10, "label": "EEEE"});
			biuldChar3.render();
			}
		</script>
		<div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; display: flex; ">
			<div id="div_temp" style=" width: 100%; padding: 5px; display: block;"> 
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">   
					<h1>
						THÔNG SỐ NHIỆT ĐỘ
					</h1>
				</div>
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			</div>
			<div id="div_pH"  style=" width: 100%; padding: 5px; display: none;">
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">   
					<h1>
						THÔNG SỐ NỒNG ĐỘ PH
					</h1>
				</div>
				<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
			</div>
		</div>


		<div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; display: flex;">
			<div id="div_oxyzen" style=" width: 100%; padding: 5px; display: none;"> 
				<div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">   
					<h1>
						THÔNG SỐ OXYZEN
					</h1>
				</div>
				<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
			</div>
			<div id="div_NH3" style=" width: 100%; padding: 5px; display: none;">
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
	<div class="col-sm-12 col-md-4 col-lg-3" style="margin-top: 100px; padding: 10px 0px 10px 0px; height: 100%; background-color: #fff;">
		<div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; font-size: 20px; ">
			<div style="text-align: center; padding-bottom: 20px;">
				<h2><b>HIỂN THỊ THÔNG SỐ </b>	</h2>
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
				<input type="checkbox" id="checked_pH" name="checked_temp" value="Car" style="width: 25px; height: 25px;" onclick="isChecked()">
				<br>
				<br>
				</div>
				
				<div style="width: 100%; ">
				<label for="vehicle3">THÔNG SỐ OXYZEN</label>
				<input type="checkbox" id="checked_oxyzen" name="checked_temp" value="Boat" style="width: 25px; height: 25px;" onclick="isChecked()">
				<br>
				<br>
				</div>

				<div style="width: 100%; ">
				<label for="vehicle3">THÔNG SỐ NỒNG ĐỘ NH3</label>
				<input type="checkbox" id="checked_NH3" name="checked_temp" value="Boat" style="width: 25px; height: 25px;" onclick="isChecked()">
				<br>
				<br>
				</div>
			</form>

		</div>
	</div>
</div>

<script>
	function isChecked() {
		var checkBox_temp = document.getElementById("checked_temp");
		var div_temp = document.querySelector("#div_temp")
		var checkBox_pH = document.getElementById("checked_pH");
		var div_pH = document.querySelector("#div_pH")
		var checkBox_oxyzen = document.getElementById("checked_oxyzen");
		var div_oxyzen = document.querySelector("#div_oxyzen")
		var checkBox_NH3 = document.getElementById("checked_NH3");
		var div_NH3 = document.querySelector("#div_NH3")

		if (checkBox_temp.checked == true){
			div_temp.style.display= "block";
			console.log("div_temp")
		} else {
			div_temp.style.display= "none";
		}

		if (checkBox_pH.checked == true){
			div_pH.style.display= "block";
			console.log("div_pH")
		} else {
			div_pH.style.display= "none";
		}

		if (checkBox_oxyzen.checked == true){
			div_oxyzen.style.display= "block";
			console.log("div_oxyzen")
		} else {
			div_oxyzen.style.display= "none";
		}

		if (checkBox_NH3.checked == true){
			div_NH3.style.display= "block";
			console.log("div_NH3")
		} else {
			div_NH3.style.display= "none";
		}
		
	}
	
	


</script>
