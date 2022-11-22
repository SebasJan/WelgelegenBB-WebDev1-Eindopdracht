    // query selectors
    const submitBtn = document.querySelector('.submit-btn');
    const beginDate = document.querySelector('#check_in');
    const endDate = document.querySelector('#check_out');

    // event listener on submit button to validate dates
    submitBtn.addEventListener('click', () => {     
        // if the begin or end date is empty, alert the user
        if (!beginDate.value) {
            // remove error message if it exists 
            if (document.querySelector('.error')) {
                document.querySelector('.error').remove();
            }          

            // show error message as paragraph element  
            const error = document.createElement('p');
            error.textContent = 'Selecteer een begin- en einddatum';
            error.style.color = 'red';
            error.id = 'error';  

            // append error message to form
            document.querySelector('#booking_form').appendChild(error);
        }   
        // check if begin date is greater than end date   
        else if (beginDate.value > endDate.value) {
            // remove error message if it exists 
            if (document.querySelector('.error')) {
                document.querySelector('.error').remove();
            } 

            // show error message as paragraph element  
            const error = document.createElement('p');
            error.textContent = 'De check-in datum moet voor de check-out datum liggen.';
            error.style.color = 'red';
            error.id = 'error';  

            // append error message to form
            document.querySelector('#booking_form').appendChild(error);
        } 
        // check if the begin or end date are in the past
        else if (beginDate.value < new Date().toISOString().split('T')[0] || endDate.value < new Date().toISOString().split('T')[0]) {
            // remove error message if it exists 
            if (document.querySelector('.error')) {
                document.querySelector('.error').remove();
            } 

            // show error message as paragraph element with id error
            const error = document.createElement('p');
            error.textContent = 'De check-in en check-out datum mogen niet in het verleden liggen.';
            error.style.color = 'red';
            error.id = 'error';          
            
            // append error message to form
            document.querySelector('#booking_form').appendChild(error);
        } else {
            // if false, submit form
            document.getElementById('booking_form').submit();
        }
    })

    // remove the error message when the user changes the date
    beginDate.addEventListener('change', () => {
        // remove error message if begin date is changed
        document.querySelector('#error').remove();
    })
    endDate.addEventListener('change', () => {
        // remove error message if end date is changed
        document.querySelector('#error').remove();
    })
    