// create an annoying captcha
// Generate two random numbers
  const num1 = Math.floor(Math.random() * 10000);
  const num2 = Math.floor(Math.random() * 10000);

  // Choose a random operator
  const operators = ['+', '-', '*', '/'];
  const operator = operators[Math.floor(Math.random() * operators.length)];

  // Calculate the answer
  let answer;
  switch (operator) {
    case '+':
      answer = num1 + num2;
      break;
    case '-':
      answer = num1 - num2;
      break;
    case '*':
      answer = num1 * num2;
      break;
    case '/':
      answer = num1 / num2;
      break;
  }
// replcae the label with the math problem
document.getElementById('captchaLabel').innerHTML = num1 + ' ' + operator + ' ' + num2 + ' = ?';

const form = document.getElementById('contactForm');
const submitButton = document.getElementById('submitButton');

// add an event listener to the submit button
submitButton.addEventListener('click', contactFormSubmitted);
function contactFormSubmitted() {
    // check if the answer is correct
    if (captcha.value == answer) {
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
