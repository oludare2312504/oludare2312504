<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amalajoint</title>
    <link rel="stylesheet" href="../html file/style.css">
</head>
<body >
<nav class="home-nav">
        <div ><img class='logo' src="../html file/Amalajoint logo.jpg" alt=""></div>
        <div class="options">
            <div ><a href="../php files/home.php">Home</a></div>
            <div style="display: none;">Profile</div>
            <div ><a href ="../php files/Group Recipee.php">Recipes</a></div>
            <div ><a href ="../php files/about us.html">about us</a></div>
            <!--<div style="color: #f86f14;">About Us</div>-->
            <!--<div class="auth">
                <div>Sign Up</div>
            </div>-->
            <div class="auth">
                <div><a href="../php files/login.html" >Sign In</a></div>
                <div style="display: none;">Log Out</div>
            </div>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
                
              </div>
        </div>
    </nav>
    <div class="first-container">
        
        <div class="fader"></div>
        <div class="about-text">
            <div class="text_a">
        
    
        <h1>INDIVIDUAL RECIPE</h1><br>
               <?php include('fetchindividualrecipe.php'); ?>
    </div>
</div>

    <img class="bg1" src="../html file/image/amala2.jpeg" alt="">
        
    </div>
    <div class='homeimages'>
        <img src="../html file/image/Amala and Egusi soup.jpg"" alt="">
        <img src="../html file/image/amala and efo riro.jpg" alt="">
        <img src="../html file/image/amala2.jpeg" alt="">
        <img src="../html file/image/amalapix.jpg" alt="">
        <img src="../html file/image/offal meat.jpg" alt="">
        <img src="../html file/image/served beef stew.jpg" alt="">
    </div>
   


</body>
</html>


