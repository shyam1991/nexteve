<?php 
require_once ('includes/header.php');
require_once('connection.php');
require_once('functions.php');
?>
<style type="text/css">
  * {
  box-sizing: border-box;
  }
  li{
  float:left;
  }
  .container{
    width: 100%;
    margin:0px;
  }
  .flag {
  width: 200px;
  height: 30px;
  margin: 2%;
  padding-top: 5px;
  position: relative;
  background: #777777;
  color: white;
  font-size: 11px;
  letter-spacing: 0.2em;
  text-align: center;
  text-transform: uppercase;
  list-style:none;
  }
  .flag:before {
  content: ' ';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 0;
  height: 0;
  border-left: 10px solid white;
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
  }
  .flag:after {
  content: ' ';
  position: absolute;
  right: 0;
  bottom: 0;
  width: 0;
  height: 0;
  border-top: 15px solid white;
  border-left: 10px solid transparent;
  border-bottom: 15px solid white;
  }
  @import"https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700";
  body{font-family:'Open Sans Condensed',sans-serif;font-size:18px}
  .backto{background:#039; padding:12px 0; color:#fff}
  .backto a{color:#FFF; text-decoration:none}
  .cards-row{padding-top:40px; padding-bottom:20px; background:#eee}
  .thumbnail{padding:0; border-radius:0; border:none; box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12)}
  .thumbnail>img{width:100%; display:block}
  .thumbnail h3{font-size:20px}
  .thumbnail h3,.card-description{margin:0; padding:8px 0; border-bottom:solid 1px #eee; text-align:center;}
  .thumbnail p{padding-top:8px; font-size:12px}
  .thumbnail .btn{border-radius:0; box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12); font-size:20px}
</style>
<?php
$search = $_POST['search'];
$query = "SELECT *FROM `tb_event_titles` WHERE vchr_title LIKE '%$search%'";
$result = mysqli_query($con,$query);


$event_id=array();


  if($result){
  while ($data=mysqli_fetch_assoc($result)) {
     $id =  $data['Fk_ai_int_eid'];
    //$event_list = eventdisplay($id);
     array_push($event_id,"$id");
    
  };
    $event_list = eventdisplay($event_id);  
    echo $event_list;
  }
  else
  {
    echo "fail";
  }

?>
<div class="container">
<div class="col-md-12"> 
      </div>
    </div>
<?php include_once('includes/footer.php') ?>+