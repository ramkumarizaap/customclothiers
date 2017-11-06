<?php 
$sql=mysqli_query($con,"select a.*,b.sr_title,b.sr_id from appointment_master a,showroom_master b where 
  a.srid=b.sr_id");
?>
  <script src="<?php echo $homeurl;?>assets/fullcalendar/fullcalendar.min.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {

        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('.calendar2').fullCalendar({
          eventLimit:true,
          eventLimitText: "More" ,
          views: {
              month: {
                  eventLimit: 3 // adjust to 6 only for agendaWeek/agendaDay
              },
              day: {
                  eventLimit: 3 // adjust to 6 only for agendaWeek/agendaDay
              }
          },
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
        
          events: [
            <?php 
          while($r=mysqli_fetch_array($sql))
            {
              $a=explode(" ",$r['a_timings']);
              $a=explode("/",$a[0]);
              $a = $a[1]."-".$a[0]."-".$a[2];
              $sd= date("Y-m-d",strtotime($a));

              ?>
            {
              title: '<?php echo $r['a_name'];?>\r\n<?php echo $r['a_email'];?>',
              start: '<?php echo $sd;?>',
              backgroundColor: "#f56954", //red
              borderColor: "#f56954", //red,
              a_id:"<?php echo mysqli_real_escape_string($con,trim($r['a_id']));?>",
              a_email:"<?php echo mysqli_real_escape_string($con,trim($r['a_email']));?>",
              a_phone:"<?php echo mysqli_real_escape_string($con,trim($r['a_phone']));?>",
              a_timing:"<?php echo mysqli_real_escape_string($con,trim($r['a_timings']));?>",
              a_addr:"<?php echo mysqli_real_escape_string($con,trim($r['a_address']));?>",
              a_cmt:"<?php echo mysqli_real_escape_string($con,trim($r['a_comments']));?>",
              sr_name:"<?php echo mysqli_real_escape_string($con,trim($r['sr_title']));?>",
              sr_id:"<?php echo mysqli_real_escape_string($con,trim($r['sr_id']));?>",
            },
            <?php }?>
           
          ],
          editable: false,
          droppable: false, // this allows things to be dropped onto the calendar !!!
          draggable:false,
          eventClick:function(event)
          {
            //console.log(event);
              $("#appointment-modal").modal();
              $(".a_name").html(event.title);
              $(".a_email").html(event.a_email);
              $(".a_phone").html(event.a_phone);
              $(".a_timing").html(event.a_timing);
               $(".a_addr").html(event.a_addr);
              $(".a_cmt").html(event.a_cmt);
               $(".sr_name").html(event.sr_name);
               $(".a_id").val(event.a_id);
               $(".sr_id").val(event.sr_id);
              $(".ip_email").val(event.a_email);
              $(".ip_time").val(event.a_timing);
          },
           eventRender:function rerenderEvents( event, element, view ) {
              return ['all', event.sr_id].indexOf($('.select_rooms').val()) >= 0
    }
         
        });
$('.select_rooms').change(function(){
  //$('.calendar2').fullCalendar('removeEvents');
    $('.calendar2').fullCalendar('rerenderEvents');
})
    

       
      });
    </script>


    <div id="appointment-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="" method="post" id="ajax-apt-form">
        <input type="hidden" name="return_url" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
      <input type="hidden" name="apt_form" value="apt_form">        
      <input type="hidden" class="sr_id" name="sr_id">
         <input type="hidden" class="a_id" name="a_id">
      <input type="hidden" class="ip_email" name="ip_email">
      <input type="hidden" class="ip_time" name="ip_time">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Appointment</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-8">
        <div class="alert alert-dismissable apt_alert hide">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <div class="apt_msg">
                      </div>
           </div>
         <div class="form-group col-md-12">
              <label class="col-md-3" for="email">Showroom Name</label>
              
              <div class="col-md-6 sr_name">
                
              </div>
        </div>
         <div class="form-group col-md-12">
              <label class="col-md-3" for="email">Name</label>
              
              <div class="col-md-6 a_name">
                
              </div>
        </div>
         <div class="form-group col-md-12">
              <label class="col-md-3" for="email">Email</label>
              
              <div class="col-md-6 a_email">
                
              </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-3" for="email">Phone</label>
              
              <div class="col-md-6 a_phone">
                
              </div>
        </div>
        <div class="form-group col-md-12">
             <label class="col-md-3" for="email">Time</label>
              
              <div class="col-md-6 a_timing">
                
              </div>
          </div>
          <div class="form-group col-md-12">
             <label class="col-md-3" for="email">Address</label>
              
              <div class="col-md-6 a_addr">
                
              </div>
          </div>
          <div class="form-group col-md-12">
               <label class="col-md-3" for="email">Comments</label>
              
              <div class="col-md-6 a_cmt">
                
              </div>
          </div>
        </div>
         <div class="col-md-4">
          <a href="javascript:void(0);" class="btn resch_btn pull-right btn-danger btn-xs">Reschedule</a> <div class="reschedule_div hide">
            <div class="form-group col-md-12">
              <label for="email">Date</label>
              <input type="text" class="form-control date-example2 up_date" name="date" value="" placeholder="Select Date">
            </div>
             <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Time</label>
                <select class="form-control " id="up_timings" name="timings" style="margin:0px;">
                  <option value="">--Select Date First--</option>
                </select>
            </div>
             <input type="button" value="Save" class="update-apt btn btn-primary pull-right">
          </div>
        </div>
      </div>
      <div class="modal-footer">
         <label for="password" class="pull-right">&nbsp;</label>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
</form>
  </div>
</div>