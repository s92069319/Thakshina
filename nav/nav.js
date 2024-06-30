

fetch('/1CW/nav/nav.php')
  .then(response => response.text())
  .then(html => {
    document.getElementById('contentPlaceholder').innerHTML = html;
  })
  .catch(error => {
    console.error('Error fetching content:', error);
  });
