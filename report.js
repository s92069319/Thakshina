// JavaScript to show/hide the popup form
document.addEventListener('DOMContentLoaded', function () {
  const reportButtons = document.querySelectorAll('.reportBtn');
  const popupForm = document.getElementById('popupForm');
  const closeFormBtn = document.getElementById('closeForm');

  reportButtons.forEach(button => {
      button.addEventListener('click', function () {
          popupForm.style.display = 'block';
      });
  });

  closeFormBtn.addEventListener('click', function () {
      popupForm.style.display = 'none';
  });
});


