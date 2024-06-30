$(document).ready(function(){

    // if the user clicks on the like button ...
    $('.like-btn').on('click', function(){
      var post_id = $(this).data('id');
      $clicked_btn = $(this);
      if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
            action = 'like';
      } else if($clicked_btn.hasClass('fa-thumbs-up')){
            action = 'unlike';
      }
      $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                    'action': action,
                    'post_id': post_id
            },
            success: function(data){
                    res = JSON.parse(data);
                    if (action == "like") {
                            $clicked_btn.removeClass('fa-thumbs-o-up');
                            $clicked_btn.addClass('fa-thumbs-up');
                    } else if(action == "unlike") {
                            $clicked_btn.removeClass('fa-thumbs-up');
                            $clicked_btn.addClass('fa-thumbs-o-up');
                    }
                    // display the number of likes and dislikes
                    $clicked_btn.siblings('span.likes').text(res.likes);
                    $clicked_btn.siblings('span.dislikes').text(res.dislikes);
    
                    // change button styling of the other button if user is reacting the second time to post
                    $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
            }
      });           
    
    });
    
    // if the user clicks on the dislike button ...
    $('.dislike-btn').on('click', function(){
      var post_id = $(this).data('id');
      $clicked_btn = $(this);
      if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
            action = 'dislike';
      } else if($clicked_btn.hasClass('fa-thumbs-down')){
            action = 'undislike';
      }
      $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                    'action': action,
                    'post_id': post_id
            },
            success: function(data){
                    res = JSON.parse(data);
                    if (action == "dislike") {
                            $clicked_btn.removeClass('fa-thumbs-o-down');
                            $clicked_btn.addClass('fa-thumbs-down');
                    } else if(action == "undislike") {
                            $clicked_btn.removeClass('fa-thumbs-down');
                            $clicked_btn.addClass('fa-thumbs-o-down');
                    }
                    // display the number of likes and dislikes
                    $clicked_btn.siblings('span.likes').text(res.likes);
                    $clicked_btn.siblings('span.dislikes').text(res.dislikes);
                    
                    // change button styling of the other button if user is reacting the second time to post
                    $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
            }
      });   
    
    });
    
    });






    // Get the button that opens the form
var openFormBtn = document.getElementById("openForm");

// Get the popup form
var popupForm = document.getElementById("popupForm");

// Get the button that closes the form
var closeFormBtn = document.getElementById("closeForm");

// When the user clicks the button, open the form
openFormBtn.onclick = function() {
  popupForm.style.display = "block";
}

// When the user clicks on close button, close the form
closeFormBtn.onclick = function() {
  popupForm.style.display = "none";
}

// Clear button functionality
document.getElementById("clearBtn").onclick = function() {
    document.getElementById("radio1").checked = false;
    document.getElementById("radio2").checked = false;
    document.getElementById("radio3").checked = false;
    document.getElementById("radio4").checked = false;
    document.getElementById("radio5").checked = false;

  document.getElementById("input1").value = "";
  document.getElementById("input2").value = "";
  document.getElementById("input3").value = "";
  document.getElementById("input4").value = "";
}


document.getElementById("submitBtn").onclick = function() {
 
  var checkboxValue = document.getElementById("checkbox").checked;
  var input1Value = document.getElementById("input1").value;
  var input2Value = document.getElementById("input2").value;
  var input3Value = document.getElementById("input3").value;
  var input4Value = document.getElementById("input4").value;
  var input3Value = document.getElementById("radio1").value;
  var input4Value = document.getElementById("radio2").value;

  console.log("Checkbox:", checkboxValue);
  console.log("Input 1:", input1Value);
  console.log("Input 2:", input2Value);
  console.log("Input 3:", input3Value);
  console.log("Input 4:", input4Value);


}



