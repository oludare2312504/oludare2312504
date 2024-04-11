
<html>
    <body>

        <?php
            include('connection.php');
          
            $Grouprecipename=$_POST['Grouprecipename'];
            $sql = "SELECT * FROM grouprecipe WHERE Grouprecipename like'%$Grouprecipename%'";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) 
                    {
                        $row = $result->fetch_assoc();
                        
                        $chefname = $_POST['chefname'];
                        $Grouprecipename = $_POST['Grouprecipename'];
                        $Recipe1 = $_POST['Recipe1'];
                        $Recipe2 = $_POST['Recipe2'];
                        $Recipe3 = $_POST['Recipe3'];

                        echo"
                        <html>
                        <body>
                        <form method='post' action='updategroupRecipe.php'>
                            <label>Chef Name:</label>
                            <input type='text' name='chefname' value='$chefname'/><br><br>
                            <label>Group recipe name:&nbsp;&nbsp;</label>
                            <input type='text' name='Grouprecipename' value='$Grouprecipename'/> <br><br>
                            <label>Recipe1:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type='text' name='Recipe1 ' value='$Recipe1'/> <br><br>
                            <label>Recipe2:&nbsp;&nbsp;&nbsp;</label>
                            <textarea name='Recipe2' id='Recipe2' value=''  rows='5' cols='100'>".
                            $row['Recipe2'].
                            "</textarea><br><br>
                            <label>Recipe3:&nbsp;&nbsp;&nbsp;</label>
                            <textarea name='Recipe3' id='Recipe3' value='' rows='10' cols='100'>".
                            $row['Recipe3'].
                            "</textarea><br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='submit' name='submit' value='Submit' />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='button' value='Reset' />
                        </form>
                        </body></html>";
                        
                        
                    }
                   
                    else 
                    {
                        echo " Not Found";
                    }
                    
             

            $db->close();
            ?>

</body>
</html>