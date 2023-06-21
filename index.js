const signUpModal = document.getElementById("signup-container-modal");

function sBtnClose() {
    if (signUpModal.style.display == 'flex') {
        signUpModal.style.display = 'none';
    } else {
        signUpModal.style.display = 'none';
    }
}

function signup() {
    signUpModal.style.display = 'flex';
}


