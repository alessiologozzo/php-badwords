let input = document.getElementById("cen");
let submit = document.getElementById("submit");

submit.addEventListener("click", (e) =>{isInputAcceptable(e)});

function isInputAcceptable(e){

    let result = true;
    let s = input.value.toUpperCase();
    
    for(let i = 0; i < s.length && result; i++)
        if(s.charCodeAt(i) < 65 || s.charCodeAt(i) > 90)
            result = false;

    if(!result){
        e.preventDefault();
        input.value = "";
        input.placeholder = "Errore. Riprova...";
    }
}