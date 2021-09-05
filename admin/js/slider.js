
/*
------------------------------------------------------------
Function to activate form button to open the slider.
------------------------------------------------------------
*/

// js function for enquiry form
const enqBtn = document.querySelector('#enq__btn');
const enqForm = document.querySelector('.enquiry__wrapper');

enqBtn.addEventListener('click', () => {
    enqForm.classList.toggle('formActive');
});