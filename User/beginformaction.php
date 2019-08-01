<?php
    //Set variables for connection
    $serverName = "localhost";
    $userName="root";
    $password = "";
    $databaseName="db";
    //Create connection
    $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
    //Check Connection
    if(!$connection)
    {   echo '<script>alert("Connection to database failed : '.mysqli_connect_error().'");';
        //go back to the login page
        echo '<script>window.location.href="../Login/login.php";</script>';
        exit();
    }
    
    //get cookies needed
    $college_code = $_COOKIE['college_code'];
    $sport = $_COOKIE['sport'];
    $gender = $_COOKIE['gender'];

    //Query to get the form details to load the form
    $Query="SELECT * from team WHERE college_code='$college_code' and sport='$sport' and gender='$gender'";
    $Result=mysqli_query($connection,$Query);
    $Nrow=mysqli_num_rows($Result);
    if(!$Result)
    {   $Error = mysqli_error($connection);
        echo '<script>alert("Error in loading team details from database.\nError : '.$Error.'\nPlease try again or contact us." );';
        //refresh the form page on clicking okay button of alert
        echo '</script>';
        header("Refresh:0");
        exit();
    }
    echo '<script>console.log("Query to check if team details already present or not is executed successfully");</script>';

    if(!$Nrow)
    {   $team_name="";
        $champion="";
        $state_player="";
    }
    else
    {   $Row=mysqli_fetch_array($Result);
        $team_name=$Row['team_name'];
        $champion=$Row['champion'];
        $state_player=$Row['state_player'];
    }

    for($i=1;$i<=20;$i++)
    {   //Query to get the player details to load the form
        $Query="SELECT * from member WHERE college_code='$college_code' and sport='$sport' and gender='$gender' and member_id='$i'";
        $Result=mysqli_query($connection,$Query);
        $Nrow=mysqli_num_rows($Result);
        if(!$Result)
        {   $Error = mysqli_error($connection);
            echo '<script>alert("Error in loading member details from database.\nError : '.$Error.'\nPlease try again or contact us." );';
            //refresh the page on clicking okay button of alert
            header("Refresh:0");
            echo '</script>';
            exit();
        }
        echo '<script>console.log("Query to check if team details already present or not is executed successfully");</script>';

        if(!$Nrow)
        {   $name[$i]="";
            $email[$i]="";
            $mob[$i]="";
            $dob[$i]="";
            $food[$i]="Veg";
        }
        else
        {   $Row=mysqli_fetch_array($Result);
            $name[$i]=$Row['name'];
            $email[$i]=$Row['email'];
            $mob[$i]=$Row['mobile'];
            $dob[$i]=$Row['dob'];
            $food[$i]=$Row['food'];
        }
    }
    /*<input type="radio" name="sex" value="Male" <?php echo ($sex=='Male')?'checked':'' ?>size="17">Male
<input type="radio" name="sex" value="Female" <?php echo ($sex=='Female')?'checked':'' ?> size="17">Female
    <input type="datetime-local"  value="<?php echo date("c", strtotime($row['Time'])); ?>" class="date" name="start" REQUIRED>*/
?>