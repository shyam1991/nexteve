<?php include_once('includes/header.php');?>
<?php include_once('connections/db_con.php');?>
<h1 class="page-title">Registration<small> New</small></h1>
<div class="row">
  <div class="col-lg-10">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <h3 class="panel-title">Organisation Details </h3>
        <ul class="panel-tool-options">
          <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
          <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
          <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <form action="col-md-12 connections/test.php" method="post" class="form-horizontal">
        <h2><b>Organiser Details</b></h2>
          <div class="form-group"> 
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-briefcase"></i></span> 
                <select name="catid" class="form-control">
                  <option disabled="" selected="">Choose Category</option>
                  <option value="1">Health care</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-briefcase"></i></span> 
                <input type="text" name="orgname" placeholder="Organisation Name *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <input type="text" name="blgname" placeholder="Building Name *" class="form-control"> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <input type="text" name="city" placeholder="Place/City *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <input type="text" name="zip" placeholder="ZIP Code" class="form-control">  
              </div>
            </div>
            <div class="col-sm-6">
            <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span>
                <?php 
                $con->next_result();
                $qry = $con->query("call SP_district_list();");
                echo '<select class="form-control" name="dtid">';
                echo "<option disabled selected >Choose District *</option>";
                while($res = $qry->fetch_array()){
                        echo "<option value=".$res[0].">".$res[2]."</option>";
                }
                echo"</select>";
                ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span>
                <select class="form-control" name="stid" disabled>
                  <option value="14">Kerala</option>
                </select>  
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <select class="form-control" name="ntnid" disabled>
                  <option value="356">India</option>
                </select> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-phone"></i></span> 
                <input type="text" name="phone1" placeholder="Primary Phone *" class="form-control"> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-phone"></i></span> 
                <input type="text" name="phone2" placeholder="Secondary Phone (optional)" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-phone"></i></span> 
                <input type="text" name="tollfree" placeholder="Toll free number (Optional)" class="form-control"> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-mail"></i></span> 
                <input type="text" name="email" placeholder="Email *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <textarea class="form-control" name="gmap" placeholder="G-Map Embedded Link"></textarea>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <h2><b>Social Media Links</b></h2>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <input type="text" name="fb" class="form-control" placeholder="Facebook Link"> 
                <span class="input-group-addon"><i class="icon-facebook"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-12">
              <div class="input-group"> 
                <input type="text" name="gplus" class="form-control" placeholder="Google Plus Link"> 
                <span class="input-group-addon"><i class="icon-gplus"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <input type="text" name="twitter" class="form-control" placeholder="Twitter Link"> 
                <span class="input-group-addon"><i class="icon-twitter"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <input type="text" name="pinterest" class="form-control" placeholder="Pinterest Link"> 
                <span class="input-group-addon"><i class="icon-pinterest"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <input type="text" name="linkedin" class="form-control" placeholder="Linkedin Link"> 
                <span class="input-group-addon"><i class="icon-linkedin"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-12">
              <div class="input-group"> 
                <input type="text" name="youtube" class="form-control" placeholder="Youtube Link"> 
                <span class="input-group-addon"> <i class="fa  fa-youtube-square">&nbsp &nbsp </i> </span>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <h2><b>Contact Person Details</b></h2>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-user"></i></span> 
                <input type="text" name="cpname" placeholder="Contact Person Name *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-phone"></i></span> 
                <input type="text" name="cpphone" placeholder="Phone *" class="form-control"> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-mail"></i></span> 
                <input type="text" name="cpemail" placeholder="Email *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <h2><b>Attachments</b></h2>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon">&nbsp &nbsp Logo <i class="icon-upload"></i></span>
                <input type="file" name="imglogo"  class="form-control"> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon">Banner <i class="icon-upload"></i></span>
                <input type="file" name="imgbanner"  class="form-control"> 
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-info"></i></span>
                <textarea class="form-control" name="about" placeholder="About organiser"></textarea> 
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-8">
              <button type="submit" class="btn btn-white">Cancel</button>
              <button type="submit" name="orgreg_submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('includes/footer.php');?>