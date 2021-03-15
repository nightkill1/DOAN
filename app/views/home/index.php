<script>
   
//  window.setInterval(()=>{
    
//     refeshTXT();
//     // showNow();
//     setChar1();
//     setChar2();
//     setChar3();
//     setChar4();
//     showNow();
//     // console.log("refresh file")
// }, 5000);

    
</script>
<div class="container-flud p-0 ">
    <div class="row">
        <div class=".col-xl-6 col-sm-9">
            <div class="row">
                <div style="width: 100%; text-align: center; padding: 10px 0 10px 0;">   
                    <h1>
                        THÔNG SỐ HIỆN TẠI
                    </h1>
                </div>
                <!-- <script type="text/javascript" src="models/database.json"></script> -->

                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        <div class="box col-sm-4 col-md-3 " style=" max-height: 150px; text-align: center;  ">
                            <div class="box-tumperature" style="border-radius: 5px; background-color: #fff; height: 130px;">
                                <div class="header-box">
                                    <h3 class="h3-header-box" style=" border-radius: 4px 4px  0px 0px; width: 100%; background-color: #1E90FF; padding: 10px; margin: 0;">Nhiệt độ</h3>
                                </div>
                                <div class="body-box" >
                                    <h1 class="h1-body-box" id="Tempareture-h1-body-box"><script> </script> &#186;C</h1>
                                </div>
                            </div>
                        </div>
                        <div class="box col-sm-4 col-md-3 " style=" max-height: 150px; text-align: center;">
                            <div class="box-tumperature" style="border-radius: 5px; background-color: #fff; height: 130px;">
                                <div class="header-box">
                                    <h3 class="h3-header-box" style=" border-radius: 4px 4px  0px 0px; width: 100%; background-color: #FFA500; padding: 10px; margin: 0;">pH</h3>
                                </div>
                                <div class="body-box">
                                    <h1 class="h1-body-box" id="pH-h1-body-box"> &#186;C</h1>
                                </div>
                            </div>
                        </div>
                        <div class="box col-sm-4 col-md-3 " style=" max-height: 150px; text-align: center; ">
                            <div class="box-tumperature" style="border-radius: 5px; background-color: #fff; height: 130px;">
                                <div class="header-box">
                                    <h3 class="h3-header-box" style=" border-radius: 4px 4px  0px 0px; width: 100%; background-color: #32CD32; padding: 10px; margin: 0;">Oxyzen</h3>
                                </div>
                                <div class="body-box">
                                    <h1 class="h1-body-box" id="Oxyzen-h1-body-box">&#186;C</h1>
                                </div>
                            </div>
                        </div>
                        <div class="box col-sm-4 col-md-3 " style=" max-height: 150px; text-align: center; ">
                            <div class="box-tumperature" style="border-radius: 5px; background-color: #fff; height: 130px;">
                                <div class="header-box">
                                    <h3 class="h3-header-box" style=" border-radius: 4px 4px  0px 0px; width: 100%; background-color: #48D1CC; padding: 10px; margin: 0;">NH3</h3>
                                </div>
                                <div class="body-box">
                                    <h1 class="h1-body-box" id="NH3-h1-body-box"> &#186;C</h1>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-3">
                            <svg viewBox="0 0 195 145">
                                <rect x="30" y="5" width="30" height="100" fill="#edebeb"></rect>
                                <rect x="30" y="70" width="30" height="70" fill="#1565c0"></rect>
                                <text x="70" y="80" text-anchor="start" style="font-weight: 700;font-size: 1.3em;">27 °C</text>
                                <text x="70" y="145" fill="#b3b3b3">-20</text>
                                <text x="70" y="10" text-anchor="start" fill="#b3b3b3">60</text>
                            </svg>
                        </div> -->
                    </div>
                    
                </div>

                <div style="width: 100%; text-align: center; padding-top: 50px;">   
                    <h1>
                        THỐNG KÊ
                    </h1>
                </div>

                <div class="row" style="width: auto;">
                
                        

                    <div class="col-sm-12 col-md-12 col-lg-6" style="width: 100%;">
                        <!-- line chart canvas element -->
                        <canvas id="buyers" width="600" height="300"></canvas>
                            

                        <script>


                            
                            function setChar1(){

                                
                                var buyerData = {
                                    labels : [],
                                    datasets : [
                                    {
                                            fillColor : "rgba(0,0,139,0.4)",
                                            strokeColor : "#191970",
                                            pointColor : "#fff",
                                            pointStrokeColor : "#191970",
                                            data : [],
                                        }
                                    ]
                                }

                                        // console.log(obj)
                                        buyerData.datasets[0].data = [];
                                        let num = obj.length;
                                        // console.log(num)
                                        for(let i = num -7; i < num  ; i++){
                                            buyerData.labels.push(obj[i].hour+":"+obj[i].minus+":"+obj[i].second);
                                            numdataItem =parseFloat(obj[i].Tempareture);
                                            buyerData.datasets[0].data.push(numdataItem);
                                        }
                                        var buyers = document.getElementById('buyers').getContext('2d');
                                        // draw line chart
                                        new Chart(buyers).Line(buyerData);
                            }
                        </script>
                        <div style="width: 100%; text-align: center;">
                            <h2>NHIỆT ĐỘ</h2>
                        </div>
                    </div>
                            <div class="col-sm-12 col-md-12 col-lg-6" style="width: 100%;">
                            <!-- line chart canvas element -->
                            <canvas id="buyers1" width="600" height="300"></canvas>
                            <script>
                                function setChar2(){
                                    var buyerData1 = {
                                        labels : [],
                                        datasets : [
                                        {
                                                fillColor : "rgba(255,140,0,0.4)",
                                                strokeColor : "#F57F17",
                                                pointColor : "#fff",
                                                pointStrokeColor : "#E65100",
                                                data : []
                                            }
                                        ]
                                    }
                                    // console.log(obj)
                                    buyerData1.datasets[0].data = [];
                                    let num = obj.length;
                                    // console.log(num)
                                    for(let i = num -7; i < num  ; i++){
                                        buyerData1.labels.push(obj[i].hour+":"+obj[i].minus+":"+obj[i].second);
                                        numdataItem =parseFloat(obj[i].pH);
                                        buyerData1.datasets[0].data.push(numdataItem);
                                    }
                                    var buyers1 = document.getElementById('buyers1').getContext('2d');

                                    // draw line chart
                                    new Chart(buyers1).Line(buyerData1);
                                }

                            
                            </script>

                                <div style="width: 100%; text-align: center;">
                                    <h2>pH</h2>
                                </div>
                        
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6" style="width: 100%;">
                            <!-- line chart canvas element -->
                            <canvas id="buyers2" width="600" height="300"></canvas>
                                

                            <script>
                                
                                    
                                function setChar3(){
                                var buyerData2 = {
                                    labels : [],
                                        datasets : [
                                        {
                                                fillColor : "rgba(172,194,132,0.4)",
                                                strokeColor : "#008000",
                                                pointColor : "#fff",
                                                pointStrokeColor : "#008000",
                                                data : []
                                            }
                                        ]
                                    }
                                    // console.log(obj)
                                    buyerData2.datasets[0].data = [];
                                    let num = obj.length;
                                    // console.log(num)
                                    for(let i = num -7; i < num  ; i++){
                                        buyerData2.labels.push(obj[i].hour+":"+obj[i].minus+":"+obj[i].second);
                                        numdataItem =parseFloat(obj[i].Oxyzen);
                                        buyerData2.datasets[0].data.push(numdataItem);
                                    }
                                    var buyers2 = document.getElementById('buyers2').getContext('2d');

                                    // draw line chart
                                    new Chart(buyers2).Line(buyerData2);
                                }   
                            </script>

                            <div style="width: 100%; text-align: center;">
                                <h2>Oxyzen</h2>
                            </div>
                        
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6" style="width: 100%;">
                        <!-- line chart canvas element -->
                        <canvas id="buyers3" width="600" height="300"></canvas>
                            

                        <script>

                            
                            
                            function setChar4(){

                                var buyerData3 = {
                                    labels : [],
                                    datasets : [
                                    {
                                            fillColor : "rgba(	72,209,204,0.4)",
                                            strokeColor : "#00BFFF",
                                            pointColor : "#fff",
                                            pointStrokeColor : "#1E90FF",
                                            data : []
                                        }
                                    ]
                                }
                                    console.log(obj)
                                buyerData3.datasets[0].data = [];
                                let num = obj.length;
                                // console.log(num)
                                for(let i = num -7; i < num  ; i++){
                                    buyerData3.labels.push(obj[i].hour+":"+obj[i].minus+":"+obj[i].second);
                                    numdataItem =parseFloat(obj[i].NH3);
                                    buyerData3.datasets[0].data.push(numdataItem);
                                }
                                var buyers3 = document.getElementById('buyers3').getContext('2d');

                                // draw line chart
                                new Chart(buyers3).Line(buyerData3);
                            }
                            showNow();
                            refeshTXT();    
                            setChar1();
                            setChar2();
                            setChar3();
                            setChar4();
                        </script>

                        <div style="width: 100%; text-align: center;">
                            <h2>NH3</h2>
                        </div>
                        
                    </div>

                    
                </div>
            </div>
                                    
        </div>
        <div class=".col-xl-6 col-sm-3">
            <div style="width: 100%; text-align: center; padding: 10px 0 10px 0;">   
                <h2>
                    NGƯỠNG AN TOÀN
                </h2>
            </div>
            <?php
                $this->renderPartial('layouts/_sitebar');
            ?>
            
        </div>
    </div>
</div>

