<?php

include('connection.php');
 $chefname = $_POST['chefname'];
$Grouprecipename = $_POST['Grouprecipename'];
$Recipe1 = $_POST['Recipe1'];
$Recipe2 = $_POST['Recipe2'];
$Recipe3 = $_POST['Recipe3'];

if (empty($chefname) || empty($Grouprecipename) || empty($Recipe1) || empty($Recipe2) || empty($Recipe3)) 
    {
        echo "All fields are required.";
    }
       
    else
    {   
        $sql = "UPDATE grouprecipe set chefname='$chefname',Grouprecipename='$Grouprecipename',Recipe1='$Recipe1',Recipe2='$Recipe2',Recipe3='$Recipe3' where Grouprecipename='$Grouprecipename'";
        $result = mysqli_query($db, $sql);

        if($result)
        {
            echo "Updated Successfully";
            header("Location: homechef.html");
        }
        else
        {
            echo "Something Went Wrong!";
            header("Location: editRecipe.html");
        }
    }
   
?>