<?php include_once('header.php');?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
  <div class="panel panel-default" >
    <div class="panel-heading" id="bg-head1">
      <h2>Organiser Profile <small style="color: #ccc;"> Registration</small></h2>
    </div>
    <div class="panel-body">
      <form action="connections/orgreg_con.php" method="POST">
        <div class="col-md-12">
          <h3>Address *</h3>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-building" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Organisation Name *" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-building" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Building/Door  *" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Place" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="City" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="District" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <select class="form-control" disabled>
              <option value="14" disabled selected> Kerala</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <select class="form-control" disabled>
              <option value="356" disabled selected> India</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="ZIP Code *" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Phone *" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Alternative Number " />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Toll Free Number " />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Email *" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Website *" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <textarea class="form-control" placeholder="Google Map Embedded Code"></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <h3>Social Links</h3>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-facebook-official" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Facebook Link" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-twitter-square" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Twitter Link" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-google-plus-square" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Google Plus Link " />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-pinterest-square" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Pinterest Link " />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Linked In Link *" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <i class="fa fa-youtube-square" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Youtube Channel Link " />
          </div>
        </div>
        <div class="col-md-12">
          <h3>Contact Details</h3>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Contact person Name " />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Phone " />
          </div>
        </div>
        <div class="col-md-4">
          <div class="inner-addon left-addon">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <input type="text" class="form-control" placeholder="Email " />
          </div>
        </div>
        <div class="col-md-12">
          <h3>Attachments</h3>
        </div>
        <div class="col-md-6">
          <div class="inner-addon left-addon">
            <label>Logo</label>
            <input type="file" class="form-control" placeholder="Contact Person Email " />
          </div>
        </div>
        <div class="col-md-6">
          <div class="inner-addon left-addon">
            <label>Banner</label>
            <input type="file" class="form-control" placeholder="Contact Person Email " />
          </div>
        </div>
        <div class="col-md-12">
          <div class="inner-addon left-addon">
            <label>About Us</label>
            <textarea class="form-control" placeholder="About Organiser *"></textarea>
          </div>
        </div>
        <button class="btn btn-primary pull-right">Create</button>
      </form>
    </div>
  </div>
</div>