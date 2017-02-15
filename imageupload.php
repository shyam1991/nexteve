<?php

    
    require_once('connection.php');
    $link= $con;
    
    function turnOffAutoCommit()
    {
    global $link;
    mysqli_autocommit($link, false);
    }



    function rollBack()
    {
    global $link;
    mysqli_rollback($link);
    }



    function commit()
    {
    global $link;
    mysqli_commit($link);
    }


    if(isset($_FILES['user_image'])){
        $errors= array();
        define ("MAX_SIZE","2000");
       
            $fileName = $_FILES["user_image"]["name"]; // The file name
            $fileTmpLoc = $_FILES["user_image"]["tmp_name"]; // File in the PHP tmp folder
            $fileType = $_FILES["user_image"]["type"]; // The type of file it is
            $fileSize = $_FILES["user_image"]["size"]; // File size in bytes
            $fileErrorMsg = $_FILES["user_image"]["error"];    
     
            


            $organisername = $_POST['organisername'];
            $companyname = $_POST['companyname'];
            $contactnumber = $_POST['contactnumber'];
            $email_id =$_POST['email_id'];
            $website =$_POST['website'];
            $eventname =$_POST['eventname'];
            $eventtime =$_POST['eventtime'];
            $eventvenue =$_POST['eventvenue'];


            turnOffAutoCommit();

            $query1 = "INSERT INTO tb_enent_venue_details(vchr_venue_place,vchr_venue_city) VALUES('$eventvenue',$eventvenue)";
            $result1 = mysqli_query($link,$query1);

            $query2 = "INSERT INTO tb_event_details (ltext_events_details) VALUES('$organisername')";
            $result2 = mysqli_query($link,$query2);


            $query3 = "INSERT INTO tb_event_titles (`vchr_title) VALUES('$eventname')";
            $result3 = mysqli_query($link,$query3);


            $fileName1 = join("','",$fileName); 
            $query4 = "INSERT INTO tb_event_images(vchr_eimage_1,vchr_eimage_2,vchr_eimage_3,vchr_eimage_4) VALUES('$fileName1')";

            //echo $query; die();
            $result4 = mysqli_query($link,$query4);
            // if ($link->query($query) === TRUE) {
            //     echo "New record created successfully";
            //     } else {
            //     $errors= "Error: " . $query . "<br>" . $link->error;
            // }

            if($result1 && $result2 && $result3 && $result4)
                {
                    commit();
                }
                else
                {
                    rollBack();
                    echo "error";
                }


            for($i=0;$i<count( $fileName);$i++)
            {
                
                $size=filesize($_FILES['user_image']['tmp_name'][$i]);
                    if($size < (MAX_SIZE*1024)){
                        $uploadfile=$_FILES["user_image"]["tmp_name"][$i];
                        $folder="assets/img/";
                           move_uploaded_file($_FILES["user_image"]["tmp_name"][$i], "$folder".$_FILES["user_image"]["name"][$i]);
                          
                    }
                    else
                    {
                        $errors = 'File size error';

                    }    

            }
            if(!$errors){
            
                // header("Location: eventupload_form.php");
            }


    }
    else {
        echo "file not";    }
?>