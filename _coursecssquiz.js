const questions=[
    {
        question: "What does CSS stand for?",
         answer: [
            { text: "Cascade sheets style", correct: false},
            { text: "Cascading style sheets", correct: true},
            { text: "Color and style sheets", correct: false},
            { text: "Coded Style Sheet", correct: false},
        ]
    },
    {
        question: "Which of the following is the correct syntax to add the external stylesheet in CSS?",
         answer: [
            { text: "<style src = quiz.css>", correct: false},
            { text: "<style src = 'quiz.css'>", correct: false},
            { text: "<link rel='stylesheet' type='quiz/css' href='quiz.css'>", correct: true},
            { text: "<stylesheet> quiz.css </stylesheet>", correct: false},
        ]
    },
    {
        question: "Which of the below CSS properties is used to change the background color of CSS ?",
         answer: [
            { text: "bg color", correct: false},
            { text: "color-background", correct: false},
            { text: "background-color", correct: true},
            { text: "color", correct: false},
        ]
    },
    {
        question: "Which of the below CSS class is used to change the text color of CSS ?",
         answer: [
            { text: "background-color", correct: false},
            { text: "color-background", correct: false},
            { text: "color", correct: true},
            { text: "None of the above", correct: false},
        ]
    },
    {
        question: "How do we set the default width of the font in CSS ?",
         answer: [
            { text: "font-stretch", correct: true},
            { text: "font-weight", correct: false},
            { text: "text-transform", correct: false},
            { text: "font-variant", correct: false},
        ]
    }
    
];

const questionElement= document.getElementById("question");
const answerButton= document.getElementById("answer-buttons");
const nextButton=document.getElementById("next-butn");

let currentQuestionIndex=0;
let score=0;

function startQuiz(){
    currentQuestionIndex=0;
    score=0;
    nextButton.innerHTML="Next";
    showQuestion();
}

function showQuestion(){
    resetState();
    let currentQustion=questions[currentQuestionIndex];
    let questionNo=currentQuestionIndex+1;
    questionElement.innerHTML=questionNo+". "+currentQustion.question;

    currentQustion.answer.forEach(ans=> {
        const button=document.createElement("button");
        button.innerHTML=ans.text;
        button.classList.add("butn");
        answerButton.appendChild(button);
        if(ans.correct){
            button.dataset.correct=ans.correct;
        }
        button.addEventListener("click",selectAnswer);
    });
}

function resetState(){
    nextButton.style.display="none";
    while(answerButton.firstChild){
        answerButton.removeChild(answerButton.firstChild);
    }

}

function selectAnswer(e){
    const selectedbtn=e.target;
    const isCorrect=selectedbtn.dataset.correct==="true";
    if(isCorrect){
        selectedbtn.classList.add("correct");
        score++;
    }
    else{
        selectedbtn.classList.add("incorrect");
    }

    Array.from(answerButton.children).forEach(button=>{
        if(button.dataset.correct==="true"){
            button.classList.add("correct");
        }
        button.disabled=true;
    });
    nextButton.style.display="block";

}
function showScore(){
    resetState();
    questionElement.innerHTML=`You scoreed ${score} out of ${questions.length}!`;
    nextButton.innerHTML="Play Again";
    nextButton.style.display="block";
}

function handleNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex<questions.length){
        showQuestion();
    }
    else{
        showScore();
    }
}

nextButton.addEventListener("click",()=>{
    if(currentQuestionIndex<questions.length){
        handleNextButton();
    }
    else{
        startQuiz();
    }

});
startQuiz();
