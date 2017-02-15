<?php
require_once('connection.php');


$link= $con;
function eventdisplay($event_id)
{
global $link;

// print_r($event_id);

$event_id = join("','",$event_id);   
$query = "SELECT 
    Fk_ai_int_eid AS eid,
    vchr_title AS event_title,
    LEFT(ltext_events_details, 100) AS event_details,
    vchr_org_name AS org_name,
    vchr_org_place AS event_place,
    vchr_org_city AS event_city,
    CONCAT(date_events_start_date,
            ' ',
            date_events_start_time,
            ' ',
            DATE_FORMAT(date_events_start_date, '%W'),
            ' to ',
            date_events_end_date,
            ' ',
            date_events_end_time,
            ' ',
            DATE_FORMAT(date_events_end_date, '%W')) AS event_time,
    CONCAT('data/event_images/', vchr_eimage_1) AS eimg1,
    CONCAT('data/event_images/', vchr_eimage_2) AS eimg2,
    CONCAT('data/event_images/', vchr_eimage_3) AS eimg3,
    CONCAT('data/event_images/', vchr_eimage_4) AS eimg4,
    CONCAT('data/event_images/', vchr_eimage_5) AS eimg5
FROM
    tb_event_titles ti
        LEFT JOIN
    tb_organiser_details od ON ti.Fk_ai_int_eid = od.Fk_int_orgid
        LEFT JOIN
    tb_event_images i ON ti.Fk_ai_int_eid = i.Fk_int_eid
        LEFT JOIN
    tb_event_details ed ON ti.Fk_ai_int_eid = ed.Fk_int_eid
        LEFT JOIN
    tb_events_timing tm ON ti.Fk_ai_int_eid = tm.Fk_int_eid
    WHERE `Fk_ai_int_eid` IN ('$event_id')";
//  SELECT * FROM `tb_event_titles` LEFT JOIN `tb_organiser_details` ON tb_event_titles.Fk_ai_int_eid = tb_organiser_details.Fk_int_orgid WHERE `Fk_ai_int_eid` IN ('1001','1002','1003')


$result = mysqli_query($link,$query);
//print_r($result);die();

// if($result){
// $data=mysqli_fetch_row($result);



// //print_r($data);die();

// // print_r($data);die();
// }
// else
// {	pri
// 	echo "error";
// }


$output='<div class="container" style="margin-top:-20px;">
			<div class="col-md-2 hidden-xs hidden-sm" style="border-right: 1px solid #ccc; height: 620px; ">
			<div class="" style="margin-top:75px;">
				<div style="background: #fafafa; padding:5px; margin-bottom: 10px;"><i class="fa fa-eye" aria-hidden="true"></i> <a href="#" class="align-center" style="padding-left: 20px;"> Events
					<span class="badge pull-right">4</span></a><br>
				</div>
				<div style="background: #fafafa; padding:5px; margin-bottom: 10px;">
					<i class="fa fa-handshake-o" aria-hidden="true"></i> <a href="#" class="align-center" style="padding-left: 20px;">Conferences
					<span class="badge pull-right">4</span></a><br>
				</div>
				<div style="background: #fafafa; padding:5px; margin-bottom: 10px;">
					<i class="fa fa-camera-retro" aria-hidden="true"></i> <a href="#" class="align-center" style="padding-left: 20px;"> Tourism
					<span class="badge pull-right">4</span></a><br>
				</div>
				<div style="background: #fafafa; padding:5px; margin-bottom: 10px;">
					<i class="fa fa-futbol-o" aria-hidden="true"></i> <a href="#" class="align-center" style="padding-left: 20px;"> Sports
					<span class="badge pull-right">4</span></a><br>
				</div>
				<div style="background: #fafafa; padding:5px; margin-bottom: 10px;">
					<i class="fa fa-users" aria-hidden="true"></i> <a href="#" class="align-center" style="padding-left: 20px;"> Organizers
						<span class="badge pull-right">4</span></a>
				</div>
				</div>
			</div>
			<div class="col-md-8" style=" padding-bottom:5%;">';
				while($row = mysqli_fetch_assoc($result)){	
					$output.='<a href="events.php?event='.$row['eid'].'"><div class="container sresult_box ">
								<div class="col-md-4 col-xs-12">
									<img src="'.$row['eimg1'].'" class="zoom-img-4" width="100%" >
									<div class="rating">
									<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div>
								<div class="col-md-8 col-xs-12">
									<h4><b>'.$row['event_title'].'</b></h4>
									<h6>'.$row['event_details'].'</h6>
									<p><i class="fa fa-map-marker" aria-hidden="true"></i><a href=""> ' .$row['event_place'].',' .$row['event_city'].' | ' .$row['org_name'].'</a><a href=""> </a>
									</p>
									<p style="color:#9f9fa0;"><i class="fa fa-calendar" aria-hidden="true"></i> ' .$row['event_time'].'
									</p>
								</div>
							</div></a>';
						}

					$output.= '</div>
									<div class="col-md-2 hidden-xs" style="border-left: 1px solid #ccc; height: 620px;"></div>
									</div>
								</div>';
					return $output;
				}

				


?>