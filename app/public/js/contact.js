const form = document.getElementById('contactForm');
const submitButton = document.getElementById('submitButton');

// add an event listener to the submit button
submitButton.addEventListener('click', contactFormSubmitted);

function contactFormSubmitted() {
  // check if the success message is 
  // already present in the DOM  
  if (!document.querySelector('.successMessage')) {
    const successMessage = document.createElement('p');
    successMessage.classList.add('successMessage');
    successMessage.innerHTML = 'We hebben uw bericht ontvangen. We nemen zo spoedig mogelijk contact met u op.';
    form.appendChild(successMessage);     
  }
  // clear form
  form.reset();
  // TODO: send form  
}
