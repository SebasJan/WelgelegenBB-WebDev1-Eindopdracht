const postalCode = document.getElementById('postalCode');
const houseNumber = document.getElementById('houseNumber');
const streetName = document.getElementById('streetName');
const residence = document.getElementById('residence');

// disable the street name and residence input fields
streetName.disabled = true;
residence.disabled = true;

let streetNameValue;
let residenceValue;
let postalCodeValue;
let houseNumberValue;

const fetchAddress = async function() {
    // make api call to /api/address/getAddress with the postal code and house number as post parameters
    const response = await fetch('/api/address/getAddress', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            postalCode: postalCodeValue,
            houseNumber: houseNumberValue
        })
    }).catch(error => {
        console.log(error);
        enableAddressFields();
    })    

    // if the response is not ok, enable the street name and residence input fields
    try {
        const data = await response.json();
        streetNameValue = data[0].Street;
        residenceValue = data[0].City;

        // set the first letter of the residence to uppercase and the rest to lowercase
        residenceValue = residenceValue.charAt(0).toUpperCase() + residenceValue.slice(1).toLowerCase();

        fillInAddress(streetNameValue, residenceValue);
    } catch {
        enableAddressFields();
    } 
};

const enableAddressFields = function() {
    // enable the street name and residence input fields
    streetName.disabled = false;
    residence.disabled = false;
};

const fillInAddress = function(streetNameValue, residenceValue) {
    // fill in the street name and residence input fields
    streetName.value = streetNameValue;
    residence.value = residenceValue;

    // disable the street name and residence input fields
    streetName.disabled = true;
    residence.disabled = true;
};

const clearAddress = function() {
    // clear the street name and residence input fields
    streetName.value = '';
    residence.value = '';
};


// event listener for postal code input field
postalCode.addEventListener('input', function() {    
    clearAddress();
    postalCodeValue = postalCode.value;
    // check if the postal code lenght is 6 and includes 4 numbers and 2 letters at the end
    if (postalCodeValue.length === 6 && postalCodeValue.match(/\d{4}[a-zA-Z]{2}/)) {
        // if the postal code is valid, fetch the data from the API
        postalCodeValue = postalCode.value;
    }
});

// event listener for house number input field when user leaves the field
houseNumber.addEventListener('blur', function() {
    clearAddress();
    houseNumberValue = houseNumber.value;

    // fetch the address data
    fetchAddress();
});


 