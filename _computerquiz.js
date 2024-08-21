const questions=[
    {
        question: "Computer is a______Device?",
         answer: [
            { text: "analog", correct: false},
            { text: "digital", correct: true},
            { text: "both of them", correct: false},
            { text: "none of above", correct: false},
        ]
    },
    {
        question: "Which is not a programming language?",
         answer: [
            { text: "C", correct: false},
            { text: "C#", correct: false},
            { text: "C@", correct: true},
            { text: "C++", correct: false},
        ]
    },
    {
        question: "What does GUI stand for....??",
         answer: [
            { text: "Graphical User Interim", correct: false},
            { text: "Geographical User Interruption", correct: false},
            { text: "Graphical User Interface", correct: true},
            { text: "Gain Upper Intensity", correct: false},
        ]
    },
    {
        question: "Application software_________________________________?",
         answer: [
            { text: "Tells the computer components what to do", correct: false},
            { text: "Let's the computer interact with the user", correct: false},
            { text: "Let's the user perform a task.", correct: true},
            { text: "Is encoded on a piece of hardware.", correct: false},
        ]
    },
    {
        question: "When was the world wide web invented?",
         answer: [
            { text: "1974", correct: false},
            { text: "1989", correct: true},
            { text: "1982", correct: false},
            { text: "1999", correct: false},
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
