<!DOCTYPE html>
<html lang="en">
      <!-- META DATAS -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initail-scale=1.0">

        <!-- Title Name -->
        <title>Book Hub</title>

         <!-- CSS link -->
        <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="home.css">


       





       
    </head>

    <body>
    


        <!-- Content Body Start Here -->
        <!-- Nav Bar Start -->
        <header>
    
            <nav class="navbar navbar-expand-lg navbar-dark bg" >
            <div class ="container">
            <a href="/" class="navbar-brand">
               
            <img src="/Elements/logo.png" class="image" alt="logo" loading="lazy"> 
            </a>

                <button class="navbar-toggler" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#myNavBa" 
                    aria-controls="myNavBar" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>



                    <div class="collapse navbar-collapse mr-auto" id="myNavBa">
                        
                      <ul class="navbar-nav ml">        

                            <li class="nav-item active">
                                <a href="/" class="nav-link" >Home</a>
                            </li>

                            <li class="nav-item">
                                <a href="/" class="nav-link" >Categories</a>
                            </li>

                            <li class="nav-item">
                                <a href="/" class="nav-link">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="/" class="nav-link">Logout</a>
                            </li>

                            <li class="nav-item">
                                <a href="/" class="nav-link"> <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></a>
                            </li>
                        </ul>      
                    </div>    
                </div>
              </nav>
        </header>
        <!-- Nav Bar End -->



          
        <!-- body start -->
            


    <!-- JS link -->
    <script src="/Assets/js/jquery.min.js"></script>
    <script src="/Assets/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JS link END -->


    </body>
</html>