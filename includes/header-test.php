<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nexteve</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="common.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default bg-navy">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png"></a>
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
                            <option value="0" selected>All Snippets</option>
                            <option value="1">Featured</option>
                            <option value="2">Most popular</option>
                            <option value="3">Top rated</option>
                            <option value="4">Most commented</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="contain">Author</label>
                          <input class="form-control" type="text" />
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
          <ul class="nav navbar-nav navbar-right">
            <div class="col-md-12 loc-menu">
              <select class="form-control">
                <option value="">Choose City </option>
                <option>Kochi</option>
                <option>Kozhikode</option>
                <option>Kochi</option>
                <option>Kochi</option>
                <option>Kochi</option>
              </select>
            </div>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>