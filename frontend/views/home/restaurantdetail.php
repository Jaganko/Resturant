<?php ?>

      <a class="btn btn-success btn-rounded btn-labeled fa fa-arrow-left" onclick="goBack()" >Back</a>

    <!-- Main container -->
    <main class="main-container">

      <header class="header bg-ui-general">
        <div class="header-info">
          <h1 class="header-title">
            <strong><?php echo $data->restaurant_name; ?></strong>
            <small><?php echo $data->restaurant_id; ?></small>
          </h1>
        </div>
      </header><!--/.header -->



      <div class="main-content">
        <div class="row">

          <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | List styling
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
          <div class="col-12">
            <div class="card">
              <h4 class="card-title"><strong>Menu Items</strong></h4>

              <div class="card-body">
                <div class="row">

                </div>
              </div>
            </div>
          </div>


          <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | Quoting text
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
          <div class="col-md-6">
            <div class="card">
              <h4 class="card-title"><strong>Location</strong></h4>

              <div class="card-body">
                <blockquote class="blockquote">
                  <strong>LAT: </strong> <p><?php echo $data->geo->lat; ?></p>
                  <strong>LONG: </strong> <p><?php echo $data->geo->lon; ?></p>
                </blockquote>
              </div>
            </div>
          </div>







          <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | Address tag
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
          <div class="col-md-6">
            <div class="card">
              <h4 class="card-title"><strong>Address</strong></h4>

              <div class="card-body">
                <address>
                  <strong><?php echo $data->restaurant_id; ?></strong><br>
                  <?php echo $data->address->formatted; ?><br>
                  <abbr title="Phone">P:</abbr> <?php echo $data->restaurant_phone; ?>
                  <abbr title="Website">W:</abbr> <?php echo $data->restaurant_website; ?>
                </address>
              </div>
            </div>
          </div>




        </div>
      </div><!--/.main-content -->


    </main>
    <!-- END Main container -->

<script>
  function goBack() {
    window.history.back();
  } 
</script>