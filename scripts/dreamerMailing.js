document.getElementById('submit').click = validate;

function validate() {
    let valid = true;
    let subject = document.getElementById('subject').value;
    if (subject===""){
        errSub =document.getElementById('err-subject');
        errSub.style.display = "block";
        valid = false;
    }
    let message = document.getElementById('message').value;
    if (message===""){
        errMsg = document.getElementById('err-message');
        errMsg.style.display = "block";
        valid = false;
    }
    return valid;
}

