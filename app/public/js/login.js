const userName = document.getElementById('userName');
const userPassword = document.getElementById('password');
const loginButton = document.getElementById('loginButton');
const form = document.getElementById('loginForm');

loginButton.addEventListener('click', validateLoginInputs);

// create and show the error message
function createAndShowError(message) {
    // remove error message if it exists 
        if (document.querySelector('#error')) {
            document.querySelector('#error').remove();
        } 

        // show error message as paragraph element  
        const error = document.createElement('p');
        error.textContent = message;
        error.style.color = 'red';
        error.id = 'error';  

        // append error message to form
       form.appendChild(error);
}

function validateLoginInputs() {
    if (!userName.value || !userPassword.value) {
        createAndShowError('Vul a.u.b. een gebruikersnaam en wachtwoord in.');
    }

    // if the user name and password is not empty
    else {
        form.submit();
    }
}
    