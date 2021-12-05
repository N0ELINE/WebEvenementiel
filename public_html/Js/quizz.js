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
      jsonData=data;
      generate(0);
   });
}



// generate from json array data with index
function generate(index) {
    document.getElementById("question").innerHTML = jsonData[index].libelle;
    document.getElementById("optt1").innerHTML = jsonData[index].reponses[0].libelle;
   console.log("apa",jsonData[index]);
    document.getElementById("optt2").innerHTML = jsonData[index].reponses[1].libelle;
    document.getElementById("optt3").innerHTML = jsonData[index].reponses[2].libelle;
}

function checkAnswer() {

    // if(document.getElementById("opt1").checked && jsonData["rep"][i]["bonne_rep"]==1){
    //     correctCount++;
    //     console.log("check",document.getElementById("opt1").checked);
    // }

    // if(document.getElementById("opt2").checked && jsonData["rep"][i]["bonne_rep"]==1){
    //     correctCount++;
    //     console.log("check",document.getElementById("opt1").checked);
    // }

    // if(document.getElementById("opt3").checked && jsonData["rep"][i]["bonne_rep"]==1){
    //     correctCount++;
    //     console.log("check",document.getElementById("opt1").checked);
    // }

    
    var count = Object.keys(jsonData).length; //nb question
    var keys = Object.keys( jsonData);

    for (j=0;j<keys.length;j++){
        if (jsonData[i].reponses[j].bonne_rep==1 && document.getElementById("opt1").checked ||document.getElementById("opt2").checked || document.getElementById("opt3").checked) {
            correctCount++;
            console.log("correct",correctCount);
            console.log("the j is",j);
        }
    }
    console.log("i is",i);
    


    // if (document.getElementById("opt1").checked && jsonData[i].opt1 == jsonData.rep[i].answer) {
    //    correctCount++;
    // }
    // if (document.getElementById("opt2").checked && jsonData[i].opt2 == jsonData.rep[i].answer) {
    //     correctCount++;
    // }
    // if (document.getElementById("opt3").checked && jsonData[i].opt3 == jsonData.rep[i].answer) {
    //     correctCount++;
    // }

    // increment i for next question
    i++;
    if(jsonData.length-1 < i){
        document.write("<body style='background-color:#EFE4F2;'>");
        document.write("<div style='color:#BC70D1;font-size:18pt;text-align:center;'>*****Your score is : "+correctCount+"*****</div>");
        document.write("<input type='button' value='return' onclick='history.back()'/>");
        document.write("</body>");
    }
    // callback to generate
    generate(i);
}