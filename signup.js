document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confermaPassword");
    const emailInput = document.getElementById("email");
    
    const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,15}$/;
    
    form.addEventListener("submit", async (event) => {
        event.preventDefault();
        
        if (passwordInput.value !== confirmPasswordInput.value) {
            alert("Le password non corrispondono.");
            event.preventDefault();
            return;
        }
        
        if (!passwordPattern.test(passwordInput.value)) {
            alert("La password deve essere lunga tra 8 e 15 caratteri, includere almeno una lettera maiuscola, un numero e un carattere speciale.");
            event.preventDefault();
            return;
        }
        
        form.submit();
    });
    
    
});

let eyeicon = document.getElementById("pass_nascosta");
let password = document.getElementById("password");

eyeicon.onclick = function(){
    if(password.type == 'password'){
        password.type = "text";
        eyeicon.src = "immagini/mostra_password.png";
    }else{
        password.type = "password";
        eyeicon.src = "immagini/password_nascosta.png";
    }
}

