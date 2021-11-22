var i = 0;
var correctCount = 0 ;
var jsonData;
//initialize the first question

//Promise asynchrone
const f = fetch("http://127.0.0.4:8080/")
  .then(response => response.json())
  .then(data => {
    jsonData=data;
    generate(0);
 });


// generate from json array data with index
function generate(index) {
    console.log("après", jsonData);
    console.log("opt1",jsonData[index].opt1);
    document.getElementById("question").innerHTML = jsonData[index].libelle;
    document.getElementById("optt1").innerHTML = jsonData[index].opt1;
    document.getElementById("optt2").innerHTML = jsonData[index].opt2;
    document.getElementById("optt3").innerHTML = jsonData[index].opt3;
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