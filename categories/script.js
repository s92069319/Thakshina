// Get all category links
const categoryLinks = document.querySelectorAll('.categories li a');
const categoryTexts = document.querySelectorAll('.category-text');

// Function to remove 'active' class from all links
function removeActiveClass() {
  categoryLinks.forEach(link => {
    link.classList.remove('active');
  });
}

// Function to show category text based on category index
function showCategoryText(index) {
  categoryTexts.forEach((text, i) => {
    if (i === index) {
      text.style.display = 'block';
    } else {
      text.style.display = 'none';
    }
  });
}

// Add click event listener for each category link
categoryLinks.forEach((link, index) => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    removeActiveClass();
    link.classList.add('active');
    showCategoryText(index);
  });
});

// Show the default content (Category 1) initially
showCategoryText(0);
