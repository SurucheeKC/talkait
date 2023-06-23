const moodAskBtn = document.getElementById("moodAsk");
const moodOptionBtn = document.getElementById("moodOption");
const post = document.getElementById('post');
const moodWrite = document.getElementById('moodWrite');
const textarea = document.createElement('textarea');
const listen = document.querySelector('.listen');
const right = document.getElementsByClassName('right');
const btnPost = document.createElement('button');
btnPost.type = "submit";

const date = new Date();
const year = date.getFullYear();
const month = date.getMonth() + 1;
const day = date.getDate();

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
    moodOptionBtn.style.display = 'block';
  } else {
    moodOptionBtn.style.display = 'none';
  }
  pressCount++;
}


function mood(emotion) {
  
  listen.style.marginTop = "90px";
  post.style.display = "block";
  moodWrite.style.width = "100%";
  moodOptionBtn.style.display = 'none'
  moodAskBtn.style.color = " black";
  textarea.name = "textarea";
  textarea.id = "moodWrite";
  moodWrite.appendChild(textarea);
  moodWrite.appendChild(btnPost);
  btnPost.innerText = "Write";
  moodAskBtn.innerText = year + " - " + month + " - " + day;
  
  
  switch (emotion) {
    case "happy":
      moodAskBtn.style.backgroundColor = "rgb(255, 255, 0, 0.2)";
      textarea.name = "happy";
      break;
    case "sad":
      moodAskBtn.style.backgroundColor = "rgb(7, 151, 179,0.2)";
      textarea.name = "sad";
      break;
    case "suprise":
      moodAskBtn.style.backgroundColor = "rgb(212, 113, 0,0.2)";
      textarea.name = "suprise";
      break;
    case "disgust":
      moodAskBtn.style.backgroundColor = "rgb(11, 75, 11,0.2)";
      textarea.name = "disgust";
      break;
    case "fear":
      moodAskBtn.style.backgroundColor = "rgb(19, 19, 121,0.2)";
      textarea.name = "fear";
      break;
    case "angry":
      moodAskBtn.style.backgroundColor = "rgb(195, 3, 3,0.2)";
      textarea.name = "angry";
      break;
    case "journal":
      moodAskBtn.style.backgroundColor = "rgb(0, 0, 0,0.2)";
      textarea.name = "journal";
      break;
  }
  moodOptionBtn.style.display = 'none';
  pressCount++;
}


const breatheExe = () => {
  // exe.innerHTML = ;

}

const darkMode = () =>{
  // document.getElementsByClassName('nav').style.setProperty = 
}