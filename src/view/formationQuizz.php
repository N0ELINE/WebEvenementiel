<?php include "header.php";?>
   <body>
   <div class="Quizz">
            <div style="font-size:20pt;">Quiz</div>
             <div class="ques" id="question"> 
             </div>
             <div><input type="radio" id="opt1" name="options">
                <span id="optt1"></span>
            </div>
            <div><input type="radio" id="opt2" name="options">
                <span id="optt2"></span>
            </div>
            <div><input type="radio" id="opt3" name="options">
                <span id="optt3"></span>
            </div>
            <div class="lftCss">
            <button class="nxtBtn" onclick="checkAnswer()">next ></button>
            </div>
        </div>
        <?php 
            // $test=JSON_decode(file_get_contents("http://127.0.0.4:8080/")); 
            // $t=file_get_contents("http://127.0.0.4:8080/");
            // var_dump($t);
            // var_dump($test); 
           
        ?>
       
        
        



        <!--<script src="../Js/data.js"></script>-->
        <script src="../Js/quizz.js"></script>  
   
<?php include "footer.php";?>s
