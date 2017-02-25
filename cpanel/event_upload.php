<?php include_once('includes/header.php');?>
<?php include_once('connections/db_con.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<h1 class="page-title">Event Upload<small> New</small></h1>
<div class="row">
  <div class="col-lg-10">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <h3 class="panel-title">Events Details </h3>
        <ul class="panel-tool-options">
          <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
          <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
          <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
        </ul>
      </div>
      <div class="panel-body">
        <form action="connections/orgreg_con.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <h2><b>Events Details</b></h2>
          <div class="form-group"> 
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-briefcase"></i></span> 
                <select name="orgid" class="form-control">
                  <option disabled="" selected="">Organiser Name *</option>
                  <?php 
                  $con->next_result();
                  $qry = $con->query("CALL SP_organisers_list()");
                  while($res = $qry->fetch_array()){
                    echo '<option value="'.$res['orgid'].'">'.$res['orgname'].'</option>';
                  }
                  ?>
                </select> 
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-briefcase"></i></span> 
                <select name="evcid" class="form-control">
                  <option disabled="" selected="">Choose Category *</option>
                  <?php 
                  $con->next_result();
                  $qry = $con->query("CALL SP_event_categories_list()");
                  while($res = $qry->fetch_array()){
                    echo '<option value="'.$res['evcid'].'">'.$res['evcategory'].'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-briefcase"></i></span> 
                <select name="catid" class="form-control">
                  <option disabled="" selected="">Choose Sub Category</option>
                  <option value="1">Health care</option>
                  <option value="2">Health care</option>
                </select> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-upload"></i></span>
                <input type="text" name="evname"  class="form-control" placeholder="Event Name *">
              </div>
            </div>
          </div>
          <div class="form-group"> 
          <label class="col-md-6">Event start date time <small>(24 Hrs Format )</small> *  </label>
          <label class="col-md-6">Event End date time <small>(24 Hrs Format ) </small> * </label>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                <input type="date" name="dfrom"  class="form-control" placeholder="dd/MM/YY ">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-clock"></i></span>
                <input type="time" name="tfrom"  class="form-control" placeholder="HH:MM ">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                <input type="date" name="dto"  class="form-control" placeholder="dd/MM/YY ">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-clock"></i></span>
                <input type="time" name="tto"  class="form-control" placeholder="HH:MM ">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"></span> 
                <textarea class="form-control" name="evdesc" placeholder="Event Description *" style="height: 450px;"></textarea>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <h2><b>Venue Details</b></h2>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group"> 
              <span class="input-group-addon"><i class="icon-location"></i></span>
                <input type="text" name="vplace" class="form-control" placeholder="Place/Organisation "> 
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <input type="text" name="vcity" class="form-control" placeholder="City">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <input type="text" name="vst" class="form-control" placeholder="State">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <input type="text" name="vdt" class="form-control" placeholder="District">
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-12">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-location"></i></span> 
                <textarea class="form-control" name="vgmap" placeholder="Venue Map *"></textarea>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <h2><b>Event Images</b></h2>
          <div class="form-group">
          <label class="col-md-3">Thumbnail Image <small>(4x4)</small>*</label>
            <div class="col-sm-9">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-upload"></i></span>
                <input type="file" name="timg"  class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-3">Actived Banner <small>(24x7.74)</small>*</label>
            <div class="col-sm-9">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-upload"></i></span>
                <input type="file" name="bactimg"  class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-3">Banner Images </label>
            <div class="col-sm-9">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-upload"></i></span>
                <input type="file" name="bimg1"  class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-3">Banner Images</label>
            <div class="col-sm-9">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-upload"></i></span>
                <input type="file" name="bimg2"  class="form-control">
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