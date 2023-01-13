// query selectors
const submitBtn = document.querySelector('.submit-btn');
const beginDate = document.querySelector('#check_in');
const endDate = document.querySelector('#check_out');

// event listener on submit button to validate dates
submitBtn.addEventListener('click', checkRoomAvailability)

// remove the error message when the user changes the date
beginDate.addEventListener('change', removeErrorMessage)
endDate.addEventListener('change', removeErrorMessage)

// make api call to check if there are rooms available
async function getAvailableRooms() {                   
    const amountOfGuests = document.querySelector('#amount_of_guests').value;
    const beginDate = document.querySelector('#check_in').value;
    const endDate = document.querySelector('#check_out').value;

    const url = `/api/room/getAvailableRooms?amountOfGuests=${amountOfGuests}&beginDate=${beginDate}&endDate=${endDate}`;

    // fetch url and return response as json
    try {
        const response = await fetch(url);
        return response.json();
    } catch (error) {
        console.log(error);
    }               
};

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
    document.querySelector('#booking_form').appendChild(error);
}

async function checkRoomAvailability() {
    // if the begin or end date is empty, alert the user
    if (!beginDate.value) {
        createAndShowError('Selecteer een begin- en einddatum');
    }   
    // check if begin date is greater than end date   
    else if (beginDate.value > endDate.value) {
        createAndShowError('De check-in datum moet voor de check-out datum liggen.');
    } 
    // check if the begin or end date are in the past
    else if (beginDate.value < new Date().toISOString().split('T')[0] || endDate.value < new Date().toISOString().split('T')[0]) {
        createAndShowError('De check-in en check-out datum mogen niet in het verleden liggen.');
    } else {
        const roomsAvailable = await getAvailableRooms();
        if (roomsAvailable.Message === 'No rooms available') {
            createAndShowError('Er zijn helaas geen kamers beschikbaar op de door u gekozen datum.');
        } else {
            document.querySelector('#booking_form').submit();
        }            
    } 
}

function removeErrorMessage() {
    if (document.querySelector('#error')) {
        document.querySelector('#error').remove();
    }
}

