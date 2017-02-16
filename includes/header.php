<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nexteve</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style type="text/css">
      .styled-select.slate {
      
      height: 30px;
      width: auto;
      }
      .styled-select.slate select {
      border-top:none;
      border-right: none;
      border-left: none;
      border-bottom:none;
      font-size: 18px;
      height: 30px;
      width: auto;
      color: #777777;
      background: none; 
      }
      .styled-select.slate select option{
        background: #fafafa;
        color: #777777;
      }
      .styled-select.slate select:hover{
      background: none;
      cursor: pointer;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="common.js"></script>
  </head>
  <body>
    <header>
      <div class="container-fluid first-header">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <a class="" href="index.php">
          <img class="img-responsive" src="assets/img/logo.png">
          </a>
        </div>
        <div class="col-md-8 hidden-xs">
          <h3 class="pull-right header-contact-number"><a href="">+91 9447 520986 </a></h3>
        </div>
      </div>
    </header>
    <nav class="navbar navbar-default bg-navy">
      <div class="container-fluid" style="background:#fff; margin-top: -1px; margin-left: -1px;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand" href="">
            <div class="city-font styled-select slate">
              <select>
                <option>Choose City</option>
                <option>Kochi</option>
                <option>Kozhikode</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <div class="search-menu">
            <div class="input-group" id="adv-search">
              <input type="text" class="form-control search-data" placeholder="Search for snippets" />
              <div class="input-group-btn">
                <div class="btn-group" role="group">
                  <div class="dropdown dropdown-lg hidden-xs">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <form class="form-horizontal" role="form">
                        <div class="form-group">
                          <label for="filter">Filter by</label>
                          <select class="form-control">
                            <option value="0" selected>All</option>
                            <option value="1">Medical</option>
                            <option value="2">Entertainment</option>
                            <option value="3">Celibrations</option>
                            <option value="4">Sports</option>
                            <option value="4">Inagurations</option>
                            <option value="4">Offers</option>
                            <option value="4">Cinemas</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="contain">Contains the words</label>
                          <input class="form-control" type="text" />
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                      </form>
                    </div>
                  </div>
                  <button type="button" class="btn btn-info  search_event"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>