const moodAskBtn = document.getElementById("moodAsk");
const moodOptionBtn = document.getElementById("moodOption");
const post = document.getElementById('post');
const moodWrite = document.getElementById('moodWrite');
const textarea = document.createElement('textarea');
const listen = document.querySelector('.listen');
const right = document.getElementsByClassName('right');

const happy = document.getElementsByClassName('happy');
const sad = document.getElementsByClassName('sad');
const suprise = document.getElementsByClassName('suprise');
const disgust = document.getElementsByClassName('disgust');
const fear = document.getElementsByClassName('fear');
const angry = document.getElementsByClassName('happy');
const journal = document.getElementsByClassName('journal');

const exe = document.getElementById("ExeInner");


let pressCount = 0;

function moodAsk() {
  if (pressCount % 2 == 0) {
    // moodAskBtn.style.transform = "translateY(3px)";
    moodAskBtn.style.boxShadow = "0px 5px 3px rgb(205,205,205)";
    moodOptionBtn.style.display = 'block'
  } else {
    // moodAskBtn.style.transform = "translateY(0px)";
    moodAskBtn.style.boxShadow = " 0px 3px 8px rgb(215, 215, 215)";
    moodOptionBtn.style.display = 'none'
  }
  pressCount++;
}

// moodAskBtn.addEventListener("click",moodAsk());

function mood(emotion) {
  
  listen.style.marginTop = "80px";
  post.style.display = "block";
  moodWrite.style.width = 100 + "%";

  switch (emotion) {
    case "happy":
      textarea.name = "happy";
      moodWrite.appendChild(textarea);
      break;
    case "sad":
      textarea.name = "sad";
      moodWrite.appendChild(textarea);
      break;
    case "suprise":
      textarea.name = "suprise";
      moodWrite.appendChild(textarea);
      break;
    case "disgust":
      textarea.name = "disgust";
      moodWrite.appendChild(textarea);
      break;
    case "fear":
      textarea.name = "fear";
      moodWrite.appendChild(textarea);
      break;
    case "angry":
      textarea.name = "angry";
      moodWrite.appendChild(textarea);
      break;
    case "journal":
      textarea.name = "journal";
      moodWrite.appendChild(textarea);
      break;
  }
}


const breatheExe = () => {
  // exe.innerHTML = ;

}