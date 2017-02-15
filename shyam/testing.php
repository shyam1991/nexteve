<?php include_once ('includes/header.php') ?>
<style type="text/css">
	* {
box-sizing: border-box;
}
li{
float:left;
}
.flag {
width: 200px;
height: 50px;
margin: 2%;
padding-top: 15px;
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
border-left: 25px solid white;
border-top: 25px solid transparent;
border-bottom: 25px solid transparent;
}
.flag:after {
content: ' ';
position: absolute;
right: 0;
bottom: 0;
width: 0;
height: 0;
border-top: 25px solid white;
border-left: 25px solid transparent;
border-bottom: 25px solid white;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<li class="flag">
				Sports
			</li>
			<li class="flag">
				Entertainment
			</li>
			<li class="flag">
				Dance/Music <b class="" style="background: #fff; color: #000; font-size: 14px; padding: 5px; border-radius: 75px;">  01</b>
			</li>
			<li class="flag">
				Conferences
			</li>
			<li class="flag">
				Inagurations
			</li>
			<li class="flag">
				Offers
			</li>
		</div>
	</div>
</div>