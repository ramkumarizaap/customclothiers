<?php

if(isset($_SESSION['admin_user_id']) ||  isset($_SESSION['emp_user_id']))

{

   require_once('includes/topbar.php');

   require_once('includes/sidebar.php');

?>

<body class="skin-black sidebar-mini">

<div class="wrapper">

<div class="content-wrapper">

    <section class="content-header">

          <h1>Checkout </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Checkout</li>

          </ol>

        </section>

<section class="content">

  <div class="row">

    <div class="col-md-12">

      <div class="box box-info">

      <form action="<?php echo $adminurl;?>includes/action.php" method="post" class="checkout-form">

      <input type="hidden" name="order_id" value="<?php echo $_GET['oid'];?>">

      <input type="hidden" name="userid" value="<?php echo $_GET['id'];?>">

        <div class="box-header">

          <h3>1. Shipping Address</h3>

        </div>

        <?php 

        $sql=mysqli_query($con,"select * from shipping_address where userid=".$_GET['id']." order by sa_id desc limit 1");

        $r=mysqli_fetch_array($sql);

        ?>

        <input type="hidden" name="ship_id" value="<?php echo $r['sa_id'];?>">

        <div class="box-body no-pading">

          <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Firstname</label>

              <input type="text" class="form-control" placeholder="Firstname" name="firstname" 

              value="<?php echo $r['sa_firstname'];?>" required>

            </div>

          </div>

           <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Lastname</label>

              <input type="text" class="form-control" placeholder="Lastname" name="lastname"

              value="<?php echo $r['sa_lastname'];?>" required>

            </div>

          </div>

           <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Address 1</label>

              <input type="text" class="form-control" placeholder="Address 1" name="address1"

              value="<?php echo $r['sa_address1'];?>" required>

            </div>

          </div>

          <!--<div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Address 2</label>

              <input type="text" class="form-control" placeholder="Address 2" name="address2"

              value="<?php echo $r['sa_address2'];?>" required>

            </div>

          </div>-->

           <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">City</label>

              <input type="text" class="form-control" placeholder="City" name="city"

              value="<?php echo $r['sa_city'];?>" required>

            </div>

          </div>

           <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Zipcode</label>

              <input type="text" class="form-control" placeholder="Zipcode" name="zipcode"

              value="<?php echo $r['sa_zipcode'];?>" required>

            </div>

          </div>

           <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Province/State/Region</label>

              <!--<input type="text" class="form-control" placeholder="Province" name="province"

              value="<?php //echo $r['sa_province'];?>" required>-->

              <select class="form-control tax_state" name="province" required>

              <option value="">--Select State--</option>

               <?php

               $s_list=$site->get_state();

               foreach ($s_list as $key => $value) {?>

                    <option <?php if($s_list[$key]['name']== $r['sa_province']){?>

                        selected <?php }?>

                      value="<?php echo $s_list[$key]['name'];?>">

                    <?php echo $s_list[$key]['name'];?></option>

                    <?php

                    }

               ?>

               </select>

            </div>

          </div>

           <div class="row">

            <div class="form-group col-md-6">

              <label class="control-label">Country</label>

              <!--<input type="text" class="form-control" placeholder="Country" name="country"

              value="<?php //echo $r['sa_country'];?>" required>-->

              <select class="chosen chosen-select-deselect form-control" required id="country" data-placeholder=" " tabindex="1" name="country">

                  <option value="">--Select Country--</option>

                 <?php

                 $c_list=$site->get_countries();

                    foreach ($c_list as $key => $value) {?>

                      <option <?php if($c_list[$key]['country_name']==$r['sa_country']){?>

                          selected <?php }?>

                        value="<?php echo $c_list[$key]['country_name'];?>">

                      <?php echo $c_list[$key]['country_name'];?></option>

                      <?php

                      }

                  ?>

                  

              </select>

            </div>

          </div>



        </div>

         <div class="col-md-12">

            <div class="box-footer">

                <button type="submit" name="place_order" class="place_order btn btn-primary">Place Order</button>

            </div>

        </div>

        </form>

      </div>

    </div>

  </div>

</section>

<a href="javascript:void(0);" data-href="modal1" class="place popup save" style="display:none;">asd</a>



<div class="place example-modal" id="modal1">

  <div class="modal">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Loading</h4>

        </div>

        <div class="modal-body popup-body">

          Please Wait...

        </div>

        

      </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

  </div><!-- /.modal -->

</div>  

<?php }

else

{

  header("Location:{$adminurl}");

}