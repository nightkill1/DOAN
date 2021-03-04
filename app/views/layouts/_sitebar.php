
<div class="theme-tempareture">
	<div class="box-theme-tempareture" style="background-color: #fff; padding: 10px; text-align: center;">
		<div id="draw" onload="draw();">
            <canvas id='thermometer' width='170' height='500'></canvas>
            
        </div>
		<div class="number-box-theme-tempareture">
            <div >
                <form id='drawThermometer'>
                    <input type="text" id="temp" name="temp" value="10" maxlength="3" style="display: none;" />
                    <br>
                    <!-- <input id="defaultSlider" type="range" min="-30" max="50" onchange="setTempAndDraw();" /> -->
                    <br>
                    <!-- <input type="button" value="Draw" onclick="draw();">  -->
                </form>
            </div>
		</div>
	</div>
  
</div>

