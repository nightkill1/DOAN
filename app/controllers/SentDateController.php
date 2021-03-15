<?php

namespace app\controllers;


use app\core\Controller;
use \App;

class SentDateController extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
    
        if(!isset($_GET["date"])&&!isset($_GET["hour"])&&!isset($_GET["year"])){
            $month = $_GET["month"];
            $to_month = date("n", strtotime($month));
            $to_year = date("Y", strtotime($month));
            echo <<<HTML
                <script>
                    var chart_temp = {
                    title: {
                    },
                    axisY: {
                        title: "Giá trị chỉ số"
                    },
                    data: [{
                        type: "line",
                        dataPoints: [
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
                        dataPoints: [
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
                        dataPoints: []
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
                        ]
                    }],
                };
                    function getDataTempNow() {
                        chart_temp.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        let tam_month = 1;
                        for (let i = count - 13; i < count; i++) {
                            if(obj[i].month == $to_month)
                                tam = {
                                    y:	parseFloat(obj[i].pH),
                                    label: obj[i].day+"-"+obj[i].month+"-"+obj[i].year,
                                }
                            
                            chart_pH.data[0].dataPoints.push(tam)
                        }
                    }
                function getDatapHNow() {
                    chart_pH.data[0].dataPoints = [];
                    let count = obj.length;
                    let tam = new Object();
                    for (let i = count - 13; i < count; i++) {
                        if(obj[i].month == $to_month)
                            tam = {
                                y:	parseFloat(obj[i].pH),
                                label: obj[i].day+"-"+obj[i].month+"-"+obj[i].year,
                            }
                        
                        chart_pH.data[0].dataPoints.push(tam)
                    }
                }
                function getDataOxyzenNow() {
                    chart_oxyzen.data[0].dataPoints = [];
                    let count = obj.length;
                    let tam = new Object();
                    for (let i = count - 13; i < count; i++) {
                        if(obj[i].month == $to_month)
                            tam = {
                                y:	parseFloat(obj[i].Oxyzen),
                                label: obj[i].day+"-"+obj[i].month+"-"+obj[i].year,
                            }
                        chart_oxyzen.data[0].dataPoints.push(tam)
                    }
                }
                function getDataNH3Now() {
                    chart_nh3.data[0].dataPoints = [];
                    let count = obj.length-1;
                    let tam = new Object();
                    // console.log(i)
                    let tam_ngay = 1;
                    for (let i = 1; i < 30; i++) {
                        let tbc = 0, dem = 0;
                        for (let j = 0; j < count; j++)
                        {
                            // console.log(obj[j].day +" - " + tam_ngay )
                            if( parseInt(obj[j].month) == $to_month && obj[j].year == $to_year && obj[j].day == tam_ngay )
                            { // && obj[j].year == $to_year && 
                                console.log(obj[j].NH3)
                                tbc = tbc + parseFloat(obj[j].NH3);
                                dem++;
                                // console.log(j);
                            }
                        }
                        if(dem!=0)
                        {
                            console.log(dem);
                            tbc = tbc/dem;
                            tam = {
                                y:	parseFloat(obj[i].NH3),
                                label: tam_ngay +"-"+$to_month+"-"+$to_year,
                            }
                            chart_nh3.data[0].dataPoints.push(tam)
                        }
                        tam_ngay++;
                    }
                    // for (let i = count - 13; i < count; i++) {
                    //     if(obj[i].month == $to_month)
                    //         tam = {
                    //             y:	parseFloat(obj[i].NH3),
                    //             label: obj[i].day+"-"+obj[i].month+"-"+obj[i].year,
                    //         }
                    //     chart_nh3.data[0].dataPoints.push(tam)
                    // }
                }
                getDataTempNow();
                getDatapHNow();
                getDataOxyzenNow();
                getDataNH3Now();
                var biuldChar4 = new CanvasJS.Chart("chartContainer4", chart_temp)
                biuldChar4.render();
                var biuldChar5 = new CanvasJS.Chart("chartContainer5", chart_pH)
                biuldChar5.render();
                var biuldChar6 = new CanvasJS.Chart("chartContainer6", chart_oxyzen)
                biuldChar6.render();
                var biuldChar7 = new CanvasJS.Chart("chartContainer7", chart_nh3)
                biuldChar7.render();
            </script>
            <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai">
                <div id="div_temp" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                    <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                        <h1>
                            THÔNG SỐ NHIỆT ĐỘ
                        </h1>
                    </div>
                    <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                </div>
                <div id="div_pH" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6e6; ">
                    <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                        <h1>
                            THÔNG SỐ NỒNG ĐỘ PH
                        </h1>
                    </div>
                    <div id="chartContainer5" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai1">
                <div id="div_oxyzen" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                    <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                        <h1>
                            THÔNG SỐ OXYZEN
                        </h1>
                    </div>
                    <div id="chartContainer6" style="height: 370px; width: 100%;"></div>
                </div>
                <div id="div_NH3" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6ff;">
                    <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                        <h1>
                            THÔNG SỐ NỒNG ĐỘ NH3
                        </h1>
                    </div>
                    <div id="chartContainer7" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3" style="margin-top: 100px; padding: 10px 0px 10px 0px; height: 100%; background-color: #fff;">
                <div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; font-size: 20px; ">
                    <div style="text-align: center; padding-bottom: 20px;">
                        <h2><b>HIỂN THỊ THÔNG SỐ </b></h2>
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
        HTML;
        }else if(!isset($_GET["date"])&&!isset($_GET["hour"])&&!isset($_GET["month"])){
            $year = $_GET["year"];
            $to_year = explode('-', $year);
            $to_year = $to_year[0]; 
            echo <<<HTML
                    <script>
                        var chart_temp = {
                        title: {},
                        axisY: {
                            title: "Giá trị chỉ số"
                        },
                        data: [{
                            type: "line",
                            dataPoints: [
                            ]
                        }],
                    };
                    var chart_pH = {
                        title: {},
                        axisY: {
                            title: "Giá trị chỉ số"
                        },
                        data: [{
                            type: "line",
                            dataPoints: [
                            ]
                        }],
                    };
                    var chart_oxyzen = {
                        title: {},
                        axisY: {
                            title: "Giá trị chỉ số"
                        },
                        data: [{
                            type: "line",
                            dataPoints: []
                        }],
                    };
                    var chart_nh3 = {
                        title: {},
                        axisY: {
                            title: "Giá trị chỉ số"
                        },
                        data: [{
                            type: "line",
                            dataPoints: [
                            ]
                        }],
                    };
                        function getDataTempNow() {
                            chart_temp.data[0].dataPoints = [];
                            let count = obj.length;
                            let tam = new Object();
                            let tam_month = 1;
                            for (let i = 1; i < 13; i++) {
                                let tbc = 0, dem = 0;
                                for (let j = 0; j < count; j++)
                                {
                                    if(obj[j].month == tam_month && obj[j].year == $to_year)
                                    {  
                                        
                                        tbc = tbc + parseFloat(obj[j].Tempareture);
                                        dem++;
                                    }
                                }
                                if(dem!=0)
                                {
                                    console.log(i)
                                    tbc = tbc/dem;
                                    tam = {
                                        y:	parseFloat(obj[i].Tempareture),
                                        label: tam_month+"-"+$to_year,
                                    }
                                    chart_temp.data[0].dataPoints.push(tam)
                                }
                                tam_month++;
                            }
                        }
                    function getDatapHNow() {
                        chart_pH.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        let tam_month = 1;
                        for (let i = 1; i < 13; i++) {
                            let tbc = 0, dem = 0;
                            for (let j = 0; j < count; j++)
                            {
                                if(obj[j].month == tam_month && obj[j].year == $to_year)
                                {  
                                    
                                    tbc = tbc + parseFloat(obj[j].pH);
                                    dem++;
                                }
                            }
                            if(dem!=0)
                            {
                                console.log(i)
                                tbc = tbc/dem;
                                tam = {
                                    y:	parseFloat(obj[i].pH),
                                    label: tam_month+"-"+$to_year,
                                }
                                chart_pH.data[0].dataPoints.push(tam)
                            }
                            tam_month++;
                        }
                    }
                    function getDataOxyzenNow() {
                        chart_oxyzen.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        let tam_month = 1;
                        for (let i = 1; i < 13; i++) {
                            let tbc = 0, dem = 0;
                            for (let j = 0; j < count; j++)
                            {
                                if(obj[j].month == tam_month && obj[j].year == $to_year)
                                {  
                                    
                                    tbc = tbc + parseFloat(obj[j].Oxyzen);
                                    dem++;
                                }
                            }
                            if(dem!=0)
                            {
                                console.log(i)
                                tbc = tbc/dem;
                                tam = {
                                    y:	parseFloat(obj[i].Oxyzen),
                                    label: tam_month+"-"+$to_year,
                                }
                                chart_oxyzen.data[0].dataPoints.push(tam)
                            }
                            tam_month++;
                        }
                    }
                    function getDataNH3Now() {
                        chart_nh3.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        let tam_month = 1;
                        for (let i = 1; i < 13; i++) {
                            let tbc = 0, dem = 0;
                            for (let j = 0; j < count; j++)
                            {
                                if(obj[j].month == tam_month && obj[j].year == $to_year)
                                {  
                                    
                                    tbc = tbc + parseFloat(obj[j].NH3);
                                    dem++;
                                }
                            }
                            if(dem!=0)
                            {
                                console.log(i)
                                tbc = tbc/dem;
                                tam = {
                                    y:	parseFloat(obj[i].NH3),
                                    label: tam_month+"-"+$to_year,
                                }
                                chart_nh3.data[0].dataPoints.push(tam)
                            }
                            tam_month++;
                        }
                    }
                    getDataTempNow();
                    getDatapHNow();
                    getDataOxyzenNow();
                    getDataNH3Now();
                    var biuldChar4 = new CanvasJS.Chart("chartContainer4", chart_temp)
                    biuldChar4.render();
                    var biuldChar5 = new CanvasJS.Chart("chartContainer5", chart_pH)
                    biuldChar5.render();
                    var biuldChar6 = new CanvasJS.Chart("chartContainer6", chart_oxyzen)
                    biuldChar6.render();
                    var biuldChar7 = new CanvasJS.Chart("chartContainer7", chart_nh3)
                    biuldChar7.render();
                    console.log("aa")
                </script>
                <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai">
                    <div id="div_temp" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NHIỆT ĐỘ
                            </h1>
                        </div>
                        <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div id="div_pH" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6e6; ">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NỒNG ĐỘ PH
                            </h1>
                        </div>
                        <div id="chartContainer5" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai1">
                    <div id="div_oxyzen" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ OXYZEN
                            </h1>
                        </div>
                        <div id="chartContainer6" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div id="div_NH3" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6ff;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NỒNG ĐỘ NH3
                            </h1>
                        </div>
                        <div id="chartContainer7" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3" style="margin-top: 100px; padding: 10px 0px 10px 0px; height: 100%; background-color: #fff;">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; font-size: 20px; ">
                        <div style="text-align: center; padding-bottom: 20px;">
                            <h2><b>HIỂN THỊ THÔNG SỐ </b></h2>
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
            HTML;
        }else if(!isset($_GET["hour"])&&!isset($_GET["month"])&&!isset($_GET["year"])){
            $date = $_GET["date"];
            echo <<<HTML
                    <script>
                        var chart_temp = {
                        title: {
                        },
                        axisY: {
                            title: "Giá trị chỉ số"
                        },
                        data: [{
                            type: "line",
                            dataPoints: [
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
                            dataPoints: [
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
                            dataPoints: []
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
                            ]
                        }],
                    };
                        function getDataTempNow() {
                            chart_temp.data[0].dataPoints = [];
                            let count = obj.length;
                            let tam = new Object();
                            for (let i = count - 13; i < count; i++) {
                                tam = {
                                    y:	parseFloat(obj[i].Tempareture),
                                    label: obj[i].time,
                                }
                                chart_temp.data[0].dataPoints.push(tam)
                            }
                        }
                    function getDatapHNow() {
                        chart_pH.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        for (let i = count - 13; i < count; i++) {
                            tam = {
                                y:	parseFloat(obj[i].pH),
                                label: obj[i].time,
                            }
                            chart_pH.data[0].dataPoints.push(tam)
                        }
                    }
                    function getDataOxyzenNow() {
                        chart_oxyzen.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        for (let i = count - 13; i < count; i++) {
                            tam = {
                                y:	parseFloat(obj[i].Oxyzen),
                                label: obj[i].time,
                            }
                            chart_oxyzen.data[0].dataPoints.push(tam)
                        }
                    }
                    function getDataNH3Now() {
                        chart_nh3.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        for (let i = count - 13; i < count; i++) {
                            tam = {
                                y:	parseFloat(obj[i].NH3),
                                label: obj[i].time,
                            }
                            chart_nh3.data[0].dataPoints.push(tam)
                        }
                    }
                    getDataTempNow();
                    getDatapHNow();
                    getDataOxyzenNow();
                    getDataNH3Now();
                    var biuldChar4 = new CanvasJS.Chart("chartContainer4", chart_temp)
                    biuldChar4.render();
                    var biuldChar5 = new CanvasJS.Chart("chartContainer5", chart_pH)
                    biuldChar5.render();
                    var biuldChar6 = new CanvasJS.Chart("chartContainer6", chart_oxyzen)
                    biuldChar6.render();
                    var biuldChar7 = new CanvasJS.Chart("chartContainer7", chart_nh3)
                    biuldChar7.render();
                    console.log("aa")
                </script>
                <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai">
                    <div id="div_temp" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NHIỆT ĐỘ
                            </h1>
                        </div>
                        <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div id="div_pH" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6e6; ">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NỒNG ĐỘ PH
                            </h1>
                        </div>
                        <div id="chartContainer5" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai1">
                    <div id="div_oxyzen" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ OXYZEN
                            </h1>
                        </div>
                        <div id="chartContainer6" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div id="div_NH3" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6ff;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NỒNG ĐỘ NH3
                            </h1>
                        </div>
                        <div id="chartContainer7" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3" style="margin-top: 100px; padding: 10px 0px 10px 0px; height: 100%; background-color: #fff;">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; font-size: 20px; ">
                        <div style="text-align: center; padding-bottom: 20px;">
                            <h2><b>HIỂN THỊ THÔNG SỐ </b></h2>
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
            HTML;
        }else if(!isset($_GET["month"])&&!isset($_GET["year"])){
            $hour = $_GET["hour"];
            $date = $_GET["date"];
            echo <<<HTML
                    <script>
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
                            dataPoints: []
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
                        function getDataTempNow() {
                            chart_temp.data[0].dataPoints = [];
                            let count = obj.length;
                            let tam = new Object();
                            for (let i = count - 13; i < count; i++) {
                                tam = {
                                    y:	parseFloat(obj[i].Tempareture),
                                    label: obj[i].time,
                                }
                                chart_temp.data[0].dataPoints.push(tam)
                            }
                        }
                    function getDatapHNow() {
                        chart_pH.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        for (let i = count - 13; i < count; i++) {
                            tam = {
                                y:	parseFloat(obj[i].pH),
                                label: obj[i].time,
                            }
                            chart_pH.data[0].dataPoints.push(tam)
                        }
                    }
                    function getDataOxyzenNow() {
                        chart_oxyzen.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        for (let i = count - 13; i < count; i++) {
                            tam = {
                                y:	parseFloat(obj[i].Oxyzen),
                                label: obj[i].time,
                            }
                            chart_oxyzen.data[0].dataPoints.push(tam)
                        }
                    }
                    function getDataNH3Now() {
                        chart_nh3.data[0].dataPoints = [];
                        let count = obj.length;
                        let tam = new Object();
                        for (let i = count - 13; i < count; i++) {
                            tam = {
                                y:	parseFloat(obj[i].NH3),
                                label: obj[i].time,
                            }
                            chart_nh3.data[0].dataPoints.push(tam)
                        }
                    }
                    getDataTempNow();
                    getDatapHNow();
                    getDataOxyzenNow();
                    getDataNH3Now();
                    var biuldChar4 = new CanvasJS.Chart("chartContainer4", chart_temp)
                    biuldChar4.render();
                    var biuldChar5 = new CanvasJS.Chart("chartContainer5", chart_pH)
                    biuldChar5.render();
                    var biuldChar6 = new CanvasJS.Chart("chartContainer6", chart_oxyzen)
                    biuldChar6.render();
                    var biuldChar7 = new CanvasJS.Chart("chartContainer7", chart_nh3)
                    biuldChar7.render();
                    console.log("aa")
                </script>
                <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai">
                    <div id="div_temp" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NHIỆT ĐỘ
                            </h1>
                        </div>
                        <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div id="div_pH" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6e6; ">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NỒNG ĐỘ PH
                            </h1>
                        </div>
                        <div id="chartContainer5" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9" style="width: 100%;" id="thongsohientai1">
                    <div id="div_oxyzen" style=" width: 100%; padding: 5px; display: block; background-color: #e6ffe6;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ OXYZEN
                            </h1>
                        </div>
                        <div id="chartContainer6" style="height: 370px; width: 100%;"></div>
                    </div>
                    <div id="div_NH3" style=" width: 100%; padding: 5px; display: block; background-color: #ffe6ff;">
                        <div style="width: 100%; text-align: center; padding: 10px 0 10px 0; ">
                            <h1>
                                THÔNG SỐ NỒNG ĐỘ NH3
                            </h1>
                        </div>
                        <div id="chartContainer7" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3" style="margin-top: 100px; padding: 10px 0px 10px 0px; height: 100%; background-color: #fff;">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="width: 100%; font-size: 20px; ">
                        <div style="text-align: center; padding-bottom: 20px;">
                            <h2><b>HIỂN THỊ THÔNG SỐ </b></h2>
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
            HTML;
        }
        
    }
}
?>