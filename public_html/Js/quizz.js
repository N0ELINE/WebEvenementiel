var i = 0;
var correctCount = 0 ;
var jsonData;
var id=1;

//initialize the first question

//Promise asynchrone
function promise(id){
    const f = fetch("http://127.0.0.4:8080/?id="+id) 
    .then(response => response.json())
    .then(data => {
      console.log("elp",data);
      jsonData=data;
      generate(0);
   });
}



// generate from json array data with index
function generate(index) {
    console.log("après", jsonData);
    document.getElementById("question").innerHTML = jsonData[index]['libelle'];
    document.getElementById("optt1").innerHTML = jsonData["rep"][0]["libelle"];
    document.getElementById("optt2").innerHTML = jsonData["rep"][1]["libelle"];
    document.getElementById("optt3").innerHTML = jsonData["rep"][2]["libelle"];
}

function checkAnswer() {
    if (document.getElementById("opt1").checked && jsonData[i].opt1 == jsonData[i].answer) {
       correctCount++;
    }
    if (document.getElementById("opt2").checked && jsonData[i].opt2 == jsonData[i].answer) {
        correctCount++;
    }
    if (document.getElementById("opt3").checked && jsonData[i].opt3 == jsonData[i].answer) {
        correctCount++;
    }
    // increment i for next question
    i++;
    if(jsonData.length-1 < i){
        document.write("<body style='background-color:#348322;'>");
        document.write("<div style='color:#ffffff;font-size:18pt;text-align:center;'>*****Your score is : "+correctCount+"*****</div>");
        document.write("</body>");
    }
    // callback to generate
    generate(i);
}