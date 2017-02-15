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
	<div class="container">
		<div class="row" style="margin:50px; ">
			
			<form action="imageupload.php" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-responsive">

				<div class="col-md-5">
					<label for="organisername">Organiser name</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="organisername" name="organisername" placeholder="Organiser name" class="form-control">
				</div>
				
				<div class="col-md-5">
					<label for="firstName">Company name</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="companyname" name="companyname" placeholder="Company name" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="contactnumber">Contact number</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="contactnumber" name="contactnumber" placeholder="Contact number" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="email">Email</label>
				</div>
				<div class="col-md-7">
					<input type="text" name="email_id" id="email" placeholder="Email"  class="form-control">
				</div>
				<div class="col-md-5">
					<label for="Website">Website</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="Website" placeholder="Website" name="website" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="eventname">event name</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="eventname" name="eventname" placeholder="event name" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="eventdate">event date</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="eventdate" name="eventdate" placeholder="event date" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="eventtime">event time</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="eventtime" name="eventtime" placeholder="event time" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="eventplace">event place</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="eventplace" name="eventplace" placeholder="event place" class="form-control">
				</div>
				<div class="col-md-5">
					<label for="eventvenue">event venue</label>
				</div>
				<div class="col-md-7">
					<input type="text" id="eventvenue" name="eventvenue" placeholder="event venue" class="form-control">
				</div>	
 
   
    <tr>
     <td><label class="control-label">event Img1.</label></td>
        <td><input class="input-group" type="file" name="user_image[]" accept="image/*" /></td>
    </tr>
     <tr>
     <td><label class="control-label">event Img2.</label></td>
        <td><input class="input-group" type="file" name="user_image[]" accept="image/*" /></td>
    </tr>
     <tr>
     <td><label class="control-label">event Img3.</label></td>
        <td><input class="input-group" type="file" name="user_image[]" accept="image/*" /></td>
    </tr>
     <tr>
     <td><label class="control-label">event Img4.</label></td>
        <td><input class="input-group" type="file" name="user_image[]" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>

			</form>

		</div> 
	</div>



	</body>
</html>