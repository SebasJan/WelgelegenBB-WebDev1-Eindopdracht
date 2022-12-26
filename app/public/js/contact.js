// create a captcha with simple math problem on the label 'captcha"
let num1 = Math.ceil(Math.random() * 10 + 1);
let num2 = Math.ceil(Math.random() * 10 + 1);
captcha.value = '';
// replcae the label with the math problem
document.getElementById('captchaLabel').innerHTML = num1 + ' + ' + num2 + ' = ?';

const form = document.getElementById('contactForm');
const submitButton = document.getElementById('submitButton');

// add an event listener to the submit button
submitButton.addEventListener('click', contactFormSubmitted);
function contactFormSubmitted() {
    // check if the answer is correct
    if (captcha.value == num1 + num2) {
        // if correct, submit the form
        //form.submit();
        // clear the form fields
        form.reset();

        // insert a simple success message below the form
        const successMessage = document.createElement('p');
        successMessage.innerHTML = 'We hebben uw bericht ontvangen. We nemen zo spoedig mogelijk contact met u op.';
        form.appendChild(successMessage);
    }
    else {
        // if wrong, show an alert and reset the captcha
        alert('Wrong answer. Please try again.');
        captcha.value = '';
        num1 = Math.ceil(Math.random() * 10 + 1);
        num2 = Math.ceil(Math.random() * 10 + 1);
        document.getElementById('captchaLabel').innerHTML = num1 + ' + ' + num2 + ' = ?';
    }    
}
