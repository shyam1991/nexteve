<?php include_once('includes/header.php');?>
<h1 class="page-title">Registration<small> New</small></h1>
<div class="row">
  <div class="col-lg-12">
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
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">Organisation Name *</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="fa fa-building-o" aria-hidden="true"></i></span> 
                <input type="text" placeholder="Organisation Name *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Organisation Name *</label> 
            <div class="col-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building-o" aria-hidden="true"></i></span> 
                <input type="text" placeholder="Organisation Name *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Organisation Name *</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="fa fa-building-o" aria-hidden="true"></i></span> 
                <input type="text" placeholder="Organisation Name *" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Right addon</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <input type="text" class="form-control"> 
                <span class="input-group-addon">.00</span>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Both addon</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <span class="input-group-addon">$</span>
                <input type="text"  class="form-control"> 
                <span class="input-group-addon">.00</span>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Icon addon</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <span class="input-group-addon"><i class="icon-mail"></i></span>
                <input type="text"  class="form-control"> 
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Input addons</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <span class="input-group-addon"><input type="checkbox"></span>
                <input type="text"  class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <div class="input-group"> 
                <span class="input-group-addon"><input type="radio"></span>
                <input type="text"  class="form-control"> 
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Buttons addons</label> 
            <div class="col-sm-10">
              <div class="input-group"> 
                <span class="input-group-btn"><button class="btn btn-primary" type="button">Go!</button></span>
                <input type="text"  class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <div class="input-group"> 
                <input type="text"  class="form-control"> 
                <span class="input-group-btn"><button class="btn btn-success" type="button">Go!</button></span>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">With dropdowns</label> 
            <div class="col-sm-10">
              <div class="input-group">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <input type="text"  class="form-control"> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <div class="input-group">
                <input type="text"  class="form-control"> 
                <div class="input-group-btn">
                  <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Segmented</label> 
            <div class="col-sm-10">
              <div class="input-group">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-white" tabindex="-1">Action</button>
                  <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <input type="text"  class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <div class="input-group">
                <input type="text"  class="form-control">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-white" tabindex="-1">Action</button>
                  <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="line-dashed"></div>
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
              <button type="submit" class="btn btn-white">Cancel</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('includes/footer.php');?>