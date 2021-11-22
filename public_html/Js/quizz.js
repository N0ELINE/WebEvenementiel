var i = 0;
var correctCount = 0 ;
var question ;
//initialize the first question



//appele api todo recup data puis i mettre dans jsonData +generate


// var api =fetch('http://127.0.0.4:8080/') 
//     .then(response => response.text())
//     .then(data => console.log(data));

function createNode(element) {
    return document.createElement(element);
}

function append(parent, el) {
  return parent.appendChild(el);
}

const ul = document.getElementById('QUESTIONS');
const url = 'http://127.0.0.4:8080/?results=2';

fetch(url)
.then((resp) => resp.json())
.then(function(data) {
  let question = data.results;
  return question.map(function(question) {
    let li = createNode('li');
    let img = createNode('img');
    let span = createNode('span');
    img.src = question.picture.medium;
    span.innerHTML = `${question.id.first} ${question.id.last}`;
    append(li, img);
    append(li, span);
    append(ul, li);
  })
})
.catch(function(error) {
  console.log(error);
});


generate(0);
// generate from json array data with index
function generate(index) {
    document.getElementById("question").innerHTML = jsonData[index].q;
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