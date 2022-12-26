const deleteButton = document.querySelector('.delete-button');
const updateButton = document.querySelector('.update-button');

let booking;

function deleteButtonClicked(id) {
  // ask user via prompt if they are sure they want to delete the booking with the id
  // if yes, send a delete request to the server
  // if no, do nothing
  const response = prompt('Are you sure you want to delete this booking? (yes/no)');
  if (response === 'yes') {
    fetch('/admin/deleteBooking', {
      method: 'POST',
      body: JSON.stringify({ id: id }),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        alert('Booking deleted');
        location.reload();
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
    const amountOfVisitors = document.querySelector('#amountofvisitors');
    const checkIn = document.querySelector('#checkin');
    const checkOut = document.querySelector('#checkout');
    const totalPrice = document.querySelector('#price');

    booking.amountOfVisitors = amountOfVisitors.value;
    booking.checkInDate = checkIn.value;
    booking.checkOutDate = checkOut.value;
    booking.price = totalPrice.value;

    // send a POST request to the server with the updated booking information
    fetch('/admin/updateBooking', {
        method: 'POST',
        body: JSON.stringify(booking),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            // close the modal
            var modal = document.getElementById("updateBookingModal");
            modal.style.display = "none";     
            
            // show a success message
            alert('Booking updated');
            
            location.reload();
        })
        .catch(error => {
            console.error(error);
        });
}


function showUpdateBookingModal(booking) {
    // make sure the modal is closed when the user clicks the close button
    const closeButton = document.querySelector('.close');

    closeButton.addEventListener("click", function() {
        // Hide the modal
        modal.style.display = "none";

        // Reset the form values
        form.reset();
    });

  // Get the modal element
  var modal = document.getElementById("updateBookingModal");

  // Get the form element
  var form = modal.querySelector("form");

  // Set the form values to the booking information
  form.amountofvisitors.value = booking.amountOfVisitors;
  form.checkin.value = booking.checkInDate;
  form.checkout.value = booking.checkOutDate;
  form.price.value = booking.price;

  // Show the modal
  modal.style.display = "block";
}

