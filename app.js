function init(){
    const formElement = document.querySelector("#form");
    if(formElement){
        formElement.addEventListener("submit", validate);
    }
}

function validate(event){
    var name = document.querySelector(".login").value;
    var password = document.querySelector(".password").value;
    var confirm = document.querySelector(".confirm").value;
    if (name.length < 5) {
        event.preventDefault();
        let x = document.getElementById('err1');
        x.innerHTML = "<p>Min 5 znaku!</p>";
    }
    if (password.length < 8){
        event.preventDefault();
        let y = document.getElementById('err2');
        y.innerHTML = "<p>Min 8 znaku!</p>";
    }
    if (password!=confirm){
        event.preventDefault();
        let z = document.getElementById('err3');
        z.innerHTML = "<p>Spatne opakovane!</p>";
    }
}



