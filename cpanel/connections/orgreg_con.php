<?php
  require_once('db_con.php');
  $con->next_result();
  $qry0 = $con->query("CALL SP_nextorgid()");
  $res0 = $qry0->fetch_array();
  $target_dir  = "../../data/org_img/logo/";
  $target_dir1 = "../../data/org_img/banner/";
  $fname         = basename($res0[0] . $_FILES["logo"]["name"]);
  $fname1        = basename($res0[0] . $_FILES["banner"]["name"]);
  $target_file   = $target_dir . $fname;
  $target_file1  = $target_dir1 . $fname1;
  $uploadOk      = 1;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if (isset($_POST["orgreg_submit"])) {
    if (file_exists($target_file) && file_exists($target_file1)) {
        echo "Sorry, logo and banner files already exists. Please change both file names and try";
        $uploadOk = 0;
    }elseif (file_exists($target_file)) {
        echo "Sorry, logo files already exists. Please change logo file name and try";
        $uploadOk = 0;
    }elseif (file_exists($target_file1)) {
        echo "Sorry, Banner files already exists. Please change Banner file name and try";
        $uploadOk = 0;
    }else{
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") 
    {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. Please change log file format";
          $uploadOk = 0;
    }elseif ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. Please change banner file format";
    }else{
      // Check file size
      if ($_FILES["logo"]["size"] > 500000) {
        echo "Sorry, your Log file is too large file is too large.";
        $uploadOk = 0;
      }elseif ($_FILES["banner"]["size"] > 500000) {
          echo "Sorry, your Banner file is too large file is too large.";
      } else {
          if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file1)) {
              $con->next_result();
              $qry = $con->query("CALL SP_orgdreg_insert('" . $_POST['orgname'] . "','" . $_POST['about'] . "','" . $_POST['blgname'] . "','" . $_POST['city'] . "','" . $_POST['dtid'] . "','" . $_POST['stid'] . "', '" . $_POST['ntnid'] . "', '" . $_POST['catid'] . "', '" . $_POST['phone1'] . "', '" . $_POST['phone2'] . "','" . $_POST['tollfree'] . "', '" . $_POST['pemail'] . "', '" . $_POST['web'] . "', '" . $_POST['cpname'] . "', '" . $_POST['cpphone'] . "', '" . $_POST['cpemail'] . "','" . $_POST['fb'] . "', '" . $_POST['youtube'] . "', '" . $_POST['twitter'] . "','" . $_POST['gplus'] . "', '" . $_POST['pinterest'] . "', '" . $_POST['linkedin'] . "', '" . $_POST['gmap'] . "' , '" . $fname . "', '" . $fname1 . "')");

                    if ($qry) {
                      echo "success";
                    } else {
                        echo "error";
                    }
                  } else {
                    echo "banner upload failed";
                  }
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
            }
          }
        }
      }
?>