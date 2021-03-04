// function getData(){
        
//     // var now = new Date("2015-03-25T05:00:00Z");
//     // console.log(now);
//     $.getJSON("models/database.json", function(obj){
//         let s = obj[0]["data"].length -1;
//         // console.log(s);
//         $.each(obj, function(key, value){
//             let tump = parseInt(value["data"][s]["tempareture"]);
//             // tump = tump.toFixed(0); 
            
//             draw();
//             // console.log(value["data"]);
//             $("#tempareture-h1-body-box").html(value["data"][s]["tempareture"]+ "&#186;C ");
//             $("#pH-h1-body-box").html(value["data"][s]["pH"]+ "&#186;C ");
//             $("#Oxyzen-h1-body-box").html(value["data"][s]["Oxyzen"]+ "&#186;C ");
//             $("#NH3-h1-body-box").html(value["data"][s]["NH3"]+ "&#186;C ");
           
//         })
//     })
// }