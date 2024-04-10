<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amalajoint</title>
    <link rel="stylesheet" href="../html file/style.css">
</head>
<body>
<nav class="home-nav">
        <div ><img class='logo' src="../html file/Amalajoint logo.jpg" alt=""></div>
        <div class="options">
            <div ><a href="../php files/home1.php">Home</a></div>
            <div style="display: none;">Profile</div>
            <div ><a href ="../php files/Group Recipee.php">Group Recipes</a></div>
            <div ><a href ="../php files/Individual Recipe.php">Individual Recipes</a></div>
            <div ><a href ="../php files/about us.html">about Us</a></div>
            <div ><a href ="../php files/contact us.html">contact us</a></div>
            <!--<div style="color: #f86f14;">About Us</div>-->
            <!--<div class="auth">
                <div>Sign Up</div>
            </div>-->
            <div ><a href ="../php files/blog.html">blog</a></div>
            <div class="auth">
                <div><a href="../php files/logout.php" >Sign out</a></div>
                <div style="display: none;">Log Out</div>
            </div>
            <div class="search-container">
            <form action="homesearch.php" method="GET">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>

</form>

                
              </div>
        </div>
    </nav>
    <div class="first-container">        
        <div class="fader"></div>
        <div class="about-text">
            <div class="text_a">
                <h2>Welcome <?php echo isset($_GET['fname']) ? htmlspecialchars($_GET['fname']) : ''; ?>!</h2>
                <h1>AmalaJoint</h1>
                <h4>Home from home</h4>
            </div>            
        </div>
        <img class="bg1" src="../html file/image/amala2.jpeg" alt="">        
    </div>
    <div class='homeimages'>
        <img src="../html file/image/Amala and Egusi soup.jpg" alt="">
        <img src="../html file/image/amala and efo riro.jpg" alt="">
        <img src="../html file/image/amala2.jpeg" alt="">
        <img src="../html file/image/amalapix.jpg" alt="">
        <img src="../html file/image/offal meat.jpg" alt="">
        <img src="../html file/image/served beef stew.jpg" alt="">
    </div>
    <footer>
    <h2 class="foot">
        <p>Connect With Us</p>
    </h2>
     <ul class="connect">
        <li><a href="http://www.facebook.com"><img src="Facebook_logo_36x36.svg.png" alt="Facebook" width="20px" height="20px"></a></li>
        <li><a href="http://www.twitter.com"><img src="Twitter-260nw-601425683.webp" alt="Twitter" wigth="20px" height="20px"></a></li>
        <li><a href="http://www.linkedIn.com"><img src="in.jpeg" alt="linkedIn" wigth="20px" height="20px"></a></li>
     </ul>
</footer>

</body>

</html>
