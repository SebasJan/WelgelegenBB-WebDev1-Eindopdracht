const deleteButton = document.querySelector('.delete-button');
const updateButton = document.querySelector('.update-button');
const modal = document.getElementById("updateBookingModal");
const form = modal.querySelector("form");
const closeButton = document.querySelector('.close');
const amountOfVisitors = document.querySelector('#amountofvisitors');
const checkIn = document.querySelector('#checkin');
const checkOut = document.querySelector('#checkout');
const totalPrice = document.querySelector('#price');

// global booking variable to update
let booking;

closeButton.addEventListener("click", function() {
      closeModal();
  });

document.addEventListener('keydown', function(event) {
  if (event.key === "Escape") {
    closeModal();
  }
});

// listen for when user clicks outside the modal
window.addEventListener('click', function(event) {
  if (event.target === modal) {
    closeModal();
  }
});


async function fillTable() {
  const table = document.querySelector('.bookings-table');
  const tableBody = table.querySelector('tbody');

  let allBookings;

  // fetch the bookings from the server
  try {
    const response = await fetch('/api/booking/getAllBookings');
    allBookings = await response.json();
  } catch (error) {
    console.error(error);
  } 

  // clear the table body
  tableBody.innerHTML = '';

  // loop through the bookings and add them to the table
  allBookings.forEach(booking => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${booking.checkInDate}</td>
      <td>${booking.checkOutDate}</td>
      <td>${booking.room.name}</td>
      <td>${booking.customer.firstName} ${booking.customer.lastName}</td>
      <td>${booking.amountOfVisitors}</td>
      <td>€${booking.price}</td>
      <td>
        <a class="crud-button-admin" id="${booking.id}" onClick="deleteButtonClicked(this.id)">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#cf8e80" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
        </a>
      </td>
      <td>
        <a class="crud-button-admin" id="${booking.id}" onClick="updateButtonClicked(this.id)">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#cf8e80" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
      </td>
    `;

    tableBody.appendChild(row);
  });

}

function deleteButtonClicked(id) {
  // ask user via prompt if they are sure they want to delete the booking give yes and no option
  const response = confirm('Weet je zeker dat je deze boeking wilt verwijderen?');
  
  if (response === true) {
    fetch('/admin/deleteBooking', {
      method: 'POST',
      body: JSON.stringify({ id: id }),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        // check if the message says Booking not deleted
        if (data.message === 'Booking not deleted') {
          alert('Booking not deleted, please try again');
          return;
        }
        // regenerate the table instead of reloading
        fillTable();
      })
      .catch(error => {
        console.error(error);
      });
  }
}

function updateButtonClicked(id) {
  // Send a POST request to the server with the booking ID in the request body
  fetch('/admin/getBookingDetails', {
    method: 'POST',
    body: JSON.stringify({ id: id }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
        // Show the update booking modal with the booking information
        showUpdateBookingModal(data);

        // save the booking information in a variable
        booking = data;
    })
    .catch(error => {
      console.error(error);
    });
}

function updateBooking(id) {    
    booking.amountOfVisitors = amountOfVisitors.value;
    booking.checkInDate = checkIn.value;
    booking.checkOutDate = checkOut.value;
    booking.price = totalPrice.value;

    // send a POST request to the server with the updated booking information
    sendUpdatedBooking();
}


function sendUpdatedBooking() {
  fetch('/admin/updateBooking', {
    method: 'POST',
    body: JSON.stringify(booking),
    headers: {
      'Content-Type': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
      // check if the message says Booking not updated
      if (data.message === 'Booking not updated') {
        alert('Booking not updated, please try again');
        return;
      }

      closeModal();
      fillTable();
    })
    .catch(error => {
      console.error(error);
    });
}

function closeModal() {
  // Hide the modal
  modal.style.display = "none";

  // Reset the form values
  form.reset();
}

function showUpdateBookingModal(booking) {   

  // Set the form values to the booking information
  form.amountofvisitors.value = booking.amountOfVisitors;
  form.checkin.value = booking.checkInDate;
  form.checkout.value = booking.checkOutDate;
  form.price.value = booking.price;

  // Show the modal
  modal.style.display = "block";
}

