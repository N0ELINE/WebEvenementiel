<?php include "header.php";?>
   <body>
  
   <div class="Quizz">
            <div id="quiz">Quiz</div><br>
             <b><div class="ques" id="question"> 
             </div></b><br>
             <div><input type="radio" id="opt1" name="options">
                <span id="optt1"></span>
            </div>
            <div><input type="radio" id="opt2" name="options">
                <span id="optt2"></span>
            </div>
            <div><input type="radio" id="opt3" name="options">
                <span id="optt3"></span>
            </div><br>
            <div class="lftCss">
            <button class="btn-hover color-4" onclick="checkAnswer()">next ></button>
            </div>
        </div>
        
        <script src="/Js/quizz.js"></script>  
   
<?php include "footer.php";?>s
