const dialog = document.querySelector("#login");
document.getElementById("showDialog").onclick = function (){
    dialog.show();
}
document.getElementById("hide").onclick = function (){
    dialog.close();
}


const form = document.querySelector(".form");

const inputName = document.querySelector("#names");
const inputSurname = document.querySelector("#surname");
const inputEmail = document.querySelector("#email");
const descript = document.querySelector("#Description")


//Show input error messages
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

//show success colour
function showSucces(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        showError(input,'Email is not invalid');
    }
}


//checkRequired fields
function checkRequired(inputArr) {
    inputArr.forEach(function(input){
        if(input.value.trim() === ''){
            showError(input,`${getFieldName(input)} is required`)
        }else {
            showSucces(input);
        }
    });
}


//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        showError(input, `${getFieldName(input)} must be at least ${min} characters`);
    }else if(input.value.length > max) {
        showError(input, `${getFieldName(input)} must be les than ${max} characters`);
    }else {
        showSucces(input);
    }
}

//get FieldName
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}



//Event Listeners
form.addEventListener('submit',function(e) {
    e.preventDefault();

    checkRequired([inputSurname,inputName,inputEmail,descript]);
    checkLength(inputName,2,255);
    checkLength(inputSurname,2,255);
    checkEmail(inputEmail);
});