var count = 0;
const page = document.getElementById("page");
const moodOpt = document.getElementById("moodOpt");
const moodAsk = document.getElementById("moodAsk");
const happy = document.querySelector('.happy');
const moodAskDiv = document.getElementById('moodAskDiv');


function mood() {
    count++;
    if (count % 2 != 0) {
        moodOpt.style.display = "flex";
        // page.style.visibility = "hidden";
    }
    else {
        moodOpt.style.display = "none";
        // page.style.visibility = "hidden";
    }
}


function choose(any) {
    count++;
    moodOpt.style.display = "none";
    switch (any) {
        case 'happy':
            page.style.visibility = "visible";
            // moodAsk.innerHTML = happy.innerHTML;
            // moodAsk.style = document.getElementById("select").style;
            break;
        case 'sad':
            page.style.visibility = "visible";
            break;
        case 'angry':
            page.style.visibility = "visible";
            break;
        case 'suprised':
            page.style.visibility = "visible";
            break;
    }
}

