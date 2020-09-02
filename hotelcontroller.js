$(document).ready(function () {
	
var questionNumber=0;
var questionBank=new Array();
var stage="#game1";
var update="#game3";
var stage2=new Object;
var questionLock=false;
var numberOfQuestions;
var score=0;
		 

		
		 
		 


			questionBank=new Array;
			questionBank=[["How many stars is the Apex City of London Hotel?","4","5","3"],["Which station is closest to the Laslett?","Notting Hill Gate Station","King's Cross Station","Angel Station"],["The Hotel Café Royal is a hotel located at __ Regent St. Fill the missing space.","68", "34","24"], ["How many minutes is London Hilton on Park Lane away from Buckingham Palace?","11", "14","20"], ["How many stars is the Tower Hotel?","4", "2","3"]]

		 numberOfQuestions=questionBank.length; 
	



		displayQuestion();

 

 



function displayQuestion(){
 var rnd=Math.random()*3;
rnd=Math.ceil(rnd);
 var q1;
 var q2;
 var q3;


if(rnd==1){q1=questionBank[questionNumber][1];q2=questionBank[questionNumber][2];q3=questionBank[questionNumber][3];}
if(rnd==2){q2=questionBank[questionNumber][1];q3=questionBank[questionNumber][2];q1=questionBank[questionNumber][3];}
if(rnd==3){q3=questionBank[questionNumber][1];q1=questionBank[questionNumber][2];q2=questionBank[questionNumber][3];}

$(stage).append('<div class="questionText">'+questionBank[questionNumber][0]+'</div><div id="1" class="option">'+q1+'</div><div id="2" class="option">'+q2+'</div><div id="3" class="option">'+q3+'</div>');

 $('.option').click(function(){
  if(questionLock==false){questionLock=true;	
  //correct answer
  if(this.id==rnd){
   $(stage).append('<div class="feedback1">CORRECT</div>');
   score++;
   score+score+score+score+score;
  
   }
  //wrong answer	
  if(this.id!=rnd){
   $(stage).append('<div class="feedback2">WRONG</div>');
  }
  setTimeout(function(){changeQuestion()},1000);
 }})
}//display question

	
	
	
	
	
	function changeQuestion(){
		
		questionNumber++;
	
	if(stage=="#game1"){stage2="#game1";stage="#game2";}
		else{stage2="#game2";stage="#game1";}
	
	if(questionNumber<numberOfQuestions){displayQuestion();}else{displayFinalSlide();}
	
	 $(stage2).animate({"right": "+=800px"},"slow", function() {$(stage2).css('right','-800px');$(stage2).empty();});
	 $(stage).animate({"right": "+=800px"},"slow", function() {questionLock=false;});
	}//change question
	

	
	
	function displayFinalSlide(){
		var score2 = (score * 10);
		$(stage).append('<div class="questionText">You have finished the quiz!<br><br>Total questions: '+numberOfQuestions+'<br>Correct answers: '+score+'<br><br>Points Earned: '+score2+'</div>');
		
		updatepoints(score2);
		
		
	}//display final slide
	
	 function updatepoints(score2) {
$(update).html(score2);
	 }
	
	
	
	
	
	});//doc ready