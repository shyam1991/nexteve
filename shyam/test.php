<?php 
    require_once('includes/header.php');
    require_once('connection.php');
    require_once('functions.php');
    $event_id = $_POST['event'];
    global $link;
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
    WHERE `Fk_ai_int_eid` = '$event_id'";

      $result = mysqli_query($link,$query);
      $row = mysqli_fetch_assoc($result);
     print_r($row);
    ?>
    <script src="test/js/jssor.slider-22.1.8.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 4,
                $SpacingX: 4,
                $SpacingY: 4,
                $Orientation: 2,
                $Align: 0
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 810);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
    <style>
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 25px;
            height: 25px;
            cursor: pointer;
            background: url('test/img/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -113px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }
        .jssora02l.jssora02lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
        .jssora02r.jssora02rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
       .jssort11 .p {    position: absolute;    top: 0;    left: 0;    width: 200px;    height: 69px;    background: #181818;}.jssort11 .tp {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}.jssort11 .i, .jssort11 .pav:hover .i {    position: absolute;    top: 3px;    left: 3px;    width: 60px;    height: 30px;    border: white 1px dashed;}* html .jssort11 .i {    width /**/: 62px;    height /**/: 32px;}.jssort11 .pav .i {    border: white 1px solid;}.jssort11 .t, .jssort11 .pav:hover .t {    position: absolute;    top: 3px;    left: 68px;    width: 129px;    height: 32px;    line-height: 32px;    text-align: center;    color: #fc9835;    font-size: 13px;    font-weight: 700;}.jssort11 .pav .t, .jssort11 .p:hover .t {    color: #fff;}.jssort11 .c, .jssort11 .pav:hover .c {    position: absolute;    top: 38px;    left: 3px;    width: 194px;    height: 32px;    line-height: 32px;    color: #fff;    font-size: 11px;    font-weight: 400;    overflow: hidden;}.jssort11 .pav .c, .jssort11 .p:hover .c {    color: #fc9835;}.jssort11 .t, .jssort11 .c {    transition: color 2s;    -moz-transition: color 2s;    -webkit-transition: color 2s;    -o-transition: color 2s;}.jssort11 .p:hover .t, .jssort11 .pav:hover .t, .jssort11 .p:hover .c, .jssort11 .pav:hover .c {    transition: none;    -moz-transition: none;    -webkit-transition: none;    -o-transition: none;}.jssort11 .p:hover, .jssort11 .pav:hover {    background: #333;}.jssort11 .pav, .jssort11 .p.pdn {    background: #462300;}
    </style>
    <div class="container" style="background: #fff; border-bottom: 3px dotted #ccc;">
<div class="row" style="padding:1%;">
  <div class="col-md-8 col-sm-11 col-xs-11">
        <div id="jssor_1" style="position:relative;margin:0;top:0px;left:0px;width:810px;height:300px;overflow:hidden;visibility:hidden;background-color:#000000;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:300px;overflow:hidden;">
            <div>
                <img data-u="image" src="test/img/002.jpg" />
                <div data-u="thumb">
                    <img class="i" src="test/img/thumb-002.jpg" />
                    <div class="t">Banner Rotator</div>
                    <div class="c">360+ touch swipe slideshow effects</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="test/img/003.jpg" />
                <div data-u="thumb">
                    <img class="i" src="test/img/thumb-003.jpg" />
                    <div class="t">Image Gallery</div>
                    <div class="c">Image gallery with thumbnail navigation</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="test/img/004.jpg" />
                <div data-u="thumb">
                    <img class="i" src="test/img/thumb-004.jpg" />
                    <div class="t">Carousel</div>
                    <div class="c">Touch swipe, mobile device optimized</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="test/img/005.jpg" />
                <div data-u="thumb">
                    <img class="i" src="test/img/thumb-005.jpg" />
                    <div class="t">Themes</div>
                    <div class="c">30+ professional themems + growing</div>
                </div>
            </div>
            <a data-u="any" href="http://www.jssor.com" style="display:none">List Slider</a>
            <div>
                <img data-u="image" src="test/img/006.jpg" />
                <div data-u="thumb">
                    <img class="i" src="test/img/thumb-006.jpg" />
                    <div class="t">Tab Slider</div>
                    <div class="c">Tab slider with auto play options</div>
                </div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort11" style="position:absolute;right:5px;top:0px;font-family:Arial, Helvetica, sans-serif;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;width:200px;height:300px;" data-autocenter="2">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div data-u="thumbnailtemplate" class="tp"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:218px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
  </div>
  <div class="col-md-4 hidden-sm hidden-xs" style=" height: 285px; background: #6d6a64; color: #fff;">
    <h2 class="ename1"><?php echo $row['event_title']; ?></h2>
      <h4 class="small-head"><b>Venue</b></h4>
      <div class="address">
      <h5><?php echo $row['org_name']; ?></h5>
      <h5><?php echo $row['event_place']; ?></h5>
      <h5><?php echo $row['event_city']; ?></h5>
      </div>
      <hr>
      <h4 class="small-head" ><b>Date & Time</b></h4>
      <div class="address">
      <h5><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp <?php echo $row['event_time']; ?></h5>
      <h5><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp  10:00 AM - 05:00 PM</h5>
      </div>
      
      <hr>
  </div>
</div>
</div>
<div class="container" style="background: #fff;" >
    <div class="col-md-8" style="background: #fff; ">
        <h2 class="sub-head">Ticket </h2>
        <div class="table-responsive">
        <table class="table table-bordered table-inverse" style="background: #fafafa;">
  <thead style="background: #000; color: #fff;" class="table-head">
    <tr>
      <th>#</th>
      <th>Category</th>
      <th>Price (Rs)</th>
      <th width="75px;">Qty</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Platinum</td>
      <td>500.00</td>
      <td><div class="">
          <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
          </select>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Gold</td>
      <td>350.00</td>
      <td><div class="">
          <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
          </select>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Silver</td>
      <td>250.00</td>
      <td><div class="">
          <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
          </select>
    </tr>
  </tbody>
</table>
</div>
        <div class="col-md-12">
        <h3 class="small-head">Event Description</h3>
        <div class="" style="min-height: 350px;">
        <p>Every year since 1987, National Science Day is celebrated on February 28. On this day in 1928, Great Indian Scientist Sir C.V. Raman discovered the famous “Raman Effect”, about scattering of light and was awarded Nobel Prize in physics for this discovery in 1930.





Main objective of National Science Day Celebrations is to bring science in the forefront, inculcate scientific temper and take pride in the scientific achievements of the country.





RAISE, Hyderabad planned a series of activities through SCIENCE MARATHON – 2017, with a view to effectively organise these celebrations, SCIENCE MARATHON- 2017 aims to educate the younger generations about the outstanding achievements of our Country in Science, Technology and Industry; inspire them to take a serious view into the national development; grow them as responsible citizens to meet the challenges of future and sensitise them to work for the National Self Reliance.





OBJECTIVES:




To widely spread a message about the significance of science and technology in the daily life of the people.

Enable students to know about the latest developments in the fields of science and technology.

Enhance interaction between scientists and students.

To encourage innovative ideas of students and others.

Creating interest among high school students on Science and Technology.

To promote the science and technology through 10 K RUN FOR SCIENCE, 5K RUN FOR SCIENCE, 3.5 K WALK FOR SCIENCE, SCIENCE AND TECHNOLOGY EXHIBITION, CULTURAL ACTIVITIES like DRAMA'S ON SCIENCE, FILMS ON SCIENCE, SCIENCE TALKS and many more.



THE CAUSE:



UTILISATION OF SCIENCE MARATHON - 2017 SPONSORSHIP FUND FOR THE FOLLOWING SPECIAL PROGRAMMS :



To bring Science & Technology more closer to the under privileged students, RAISE, Hyderabad implements the following programs on a long term basis by utilising of SCIENCE MARATHON - 2017 Sponsorship Fund.






To sustain the education for marginalised students in Mathematics and Science Subjects.






To build the Science Labs and Learning centres for rural students in order to develop interest in Science based courses.
- See more at: https://www.eventsnow.com/hyderabad-event/science-marathon/7052#sthash.2TCG2RS9.dpuf</p></div>
    </div></div>
    <div class="col-md-4" style="background: #fff; border-left:1px solid #ccc;">
    <h2 class="social-head">Spred the world</h2>
    <button class="btn" style="display: block; width: 100%; background: #00c1db; ">Invite Friends</button>
        <hr>
        <h3 class="small-head">Contact Info</h3>
        <div class="address">
        <h5>Organiser Name</h5>
        <h5>Contact person name</h5>
        <h5><a href="tel:+9194475209786" id="no-style">+91 9447 520986</a></h5>
        <h5><a href="" id="no-style">info@armcivf.com</a></h5>
        </div>
        <button class="btn btn-info btn-sm">Click More</button>
        <hr>
        <h3 class="small-head">How to reach ?</h3>
        <div class="address">
        <h4><b>The Raviz International</b></h4>
        <div class="hidden-lg hidden-md visible-sm visible-xs">
      <h5>Opp New Bus stand |Jafarkan Colony road</h5>
      <h5>Kozhikode </h5>
      </div>
        </div>
        <div class="" style="height: 150px; width: 100%">
         <iframe width="100%" frameborder="0" style="border:0"src="https://www.google.com/maps/embed/v1/place?q=ARMC+IVF+Fertility+Centre,+Kannur,+Kerala,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU" allowfullscreen></iframe> 
      </div>
      <hr>
      <h4 class="text-center small-head">More Events in Kochi</h4>

      <div class="row ename-suggessions" style="background: #fff; border:1px solid #fafafa; padding: 1%; box-shadow: 2px 2px 3px #ccc; margin: 1%;">
            <div class="col-md-4"><img src="http://www.sgbizinsure.com/wp-content/uploads/2012/09/event-liability-insurance-image.png" width="100%"></div>
            <div class="col-md-8"><h4>Event Name</h4></div>
           
      </div>
            <div class="row ename-suggessions" style="background: #fff; border:1px solid #fafafa; padding: 1%; box-shadow: 2px 2px 3px #ccc; margin: 1%;">
            <div class="col-md-4"><img src="http://www.sgbizinsure.com/wp-content/uploads/2012/09/event-liability-insurance-image.png" width="100%"></div>
            <div class="col-md-8"><h4>Event Name</h4></div>
           
      </div>
            <div class="row ename-suggessions" style="background: #fff; border:1px solid #fafafa; padding: 1%; box-shadow: 2px 2px 3px #ccc; margin: 1%;">
            <div class="col-md-4"><img src="http://www.sgbizinsure.com/wp-content/uploads/2012/09/event-liability-insurance-image.png" width="100%"></div>
            <div class="col-md-8"><h4>Event Name</h4></div>
           
      </div>
      <hr>
      <button class="btn" style="display: block; width: 100%;">Click More</button>
    </div>
</div>
<div class="container" style="background: #fff; padding: 10px">
<hr>
<h3>Comments..!</h3>
    <div class="media" style="border:1px solid #e3e4e5; padding: 10px; box-shadow: 2px 2px 3px #e3e4e5; margin: 10px;">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src="https://www.arcadia.edu/sites/default/files/default-user.png" width="50px;" alt="..." style="border:1px solid #f4f4f4; background: #fafafa">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Middle aligned media</h4>
    Nice event ljsdflsjadfl;kjasdl;fkjasdfl;
    sdf;lkasfl;kasjdfas
    sdfasdkljfas'[df
    ]
  </div>
</div>
  <div class="col-md-1 col-sm-2 col-xs-2" style="">
      <img class="media-object" src="https://www.arcadia.edu/sites/default/files/default-user.png" width="100%" alt="..." style="border:1px solid #f4f4f4; background: #fafafa">
  </div>
  <div class="col-md-11 col-sm-10 col-xs-10">
      <textarea class="form-control"></textarea>
      <br>
      <button class=" pull-right btn btn-primary">Submit</button>
  </div>
</div>
 <script type="text/javascript">jssor_1_slider_init();</script>
<?php include_once('includes/footer.php') ?>