document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star");
    const ratingValue = document.getElementById("ratingValue");

    stars.forEach((star) => {
        star.addEventListener("click", function () {
            const rating = this.getAttribute("data-rating");
            ratingValue.value = rating;

            stars.forEach((s) => {
                s.classList.remove("active");
            });

            for (let i = 0; i < rating; i++) {
                stars[i].classList.add("active");
            }
        });
    });
});



//for pop up window report

function openReportForm() {
    document.getElementById("reportModal").style.display = "block";
  }
  
  function closeReportForm() {
    document.getElementById("reportModal").style.display = "none";
  }
  