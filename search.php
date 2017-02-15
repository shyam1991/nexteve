<?php include_once ('includes/header.php') ?>
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
<div class="container">
<div class="col-md-12">
  <div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="border-right: 1px solid #ccc; margin-left: -25px; width:225px;">
    <div class="btn-group full-width">
      <button type="button" class="btn btn-sm home full-width font-14"><i class="fa fa-home pull-left" aria-hidden="true"></i> HOME</button>
      <hr>
      <p class="font-14 text-hash text-uppercase">Category</p>
      <button class="btn btn-sm btn-category full-width pull-left"><i class="fa fa-camera-retro" aria-hidden="true"></i> Entertainment <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width pull-left"><i class="fa fa-camera-retro" aria-hidden="true"></i> Sports <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width"><i class="fa fa-camera-retro" aria-hidden="true"></i> Conferences <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width"><i class="fa fa-camera-retro" aria-hidden="true"></i> Inagurations <span class="badge pull-right">10</span></button>
      <button class="btn btn-sm btn-category full-width"><i class="fa fa-camera-retro" aria-hidden="true"></i> Offers Zone <span class="badge pull-right">10</span></button>
      <hr>
    </div>
  </div>
  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-12">
      <div class="thumbnail">
        <img src="https://1.bp.blogspot.com/-aFQ-W_KTFWQ/V6BdtpSUy6I/AAAAAAAAAH4/xD_U-BYItSsNvk1UGfROqLBzzU1h32oXQCLcB/s320/4-diwali-greeting-cards-by-ajay-acharya.jpg" alt="Bootstrap Thumbnail: Beautiful Bootstrap Thumbnail like Material Design Cards">
        <div class="caption">
          <h5 class="ename1 text-navy text-center"><strong>Happy New Year Pary 2017</strong></h5>
          <h6 class=" social-head text-center text-hash">Kozhikode</h6>
          <h6 class="text-center text-hash"><i class="fa fa-calendar" aria-hidden="true"></i> 27<small>th</small> Jan 2017 -- 29<small>th</small> Jan 2017</h6>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<?php include_once('includes/footer.php') ?>