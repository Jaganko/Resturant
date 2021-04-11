<?php 
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

.example{
  margin:auto;max-width:300px;
}

.center {
  margin: auto;
  width: 20%;
  padding: 10px;
}
</style>
<div class="center">
<?php 
$form = ActiveForm::begin([
    'method' => 'get',
    'class'=>'example',
    'action'=>['home/search'],
]); ?>

  <input type="text" placeholder="restaurant_name.." name="restaurant_name" id="restaurant_name">
  <button type="submit"><i class="fa fa-search"></i></button>
  <a type="button" href="<?php echo Url::toRoute('index') ?>">Clear</a>
<?php ActiveForm::end(); ?>
</div>
    <!-- Main container -->
    <main class="main-container">


      <div class="main-content">

        <div class="row">
        	<?php if(!empty($data)){
        	foreach ($data as $key => $onedata) { ?>
        	
        	<div class="col-md-6 col-lg-4">
            <div class="card">
             <a href="<?php echo Url::toRoute('home/restdetail').'&restid='.$onedata->restaurant_id?>">
              <div class="card-body text-center pt-1 pb-20">
                <!-- <a href="#">
                  <img class="avatar avatar-xxl" src="assets/img/avatar/1.jpg">
                </a> -->
                <h5 class="mt-2 mb-0"><?php echo $onedata->restaurant_name; ?></h5>
                <span><?php echo $onedata->restaurant_id; ?></span>
                <div class="mt-20">
                	<?php if(isset($onedata->cuisines)){
                		foreach ($onedata->cuisines as $key => $onecuisines) { ?>
                  		<span class="badge badge-default"><?php echo $onecuisines; ?></span>
                		<?php }
                	} ?>
                </div>
              </div>
          	</a>
              <footer class="card-footer flexbox">
                <div>
                  <i class="fa fa-map-marker pr-1"></i>
                  <span><?php echo $onedata->address->formatted; ?></span>
                </div>
                <div>
                  <i class="fa fa-money pr-1"></i>
                  <span><?php echo $onedata->restaurant_phone; ?></span>
                </div>
              </footer>
            </div>
          </div>
        <?php	}
         }	?>
          	


        </div>


      </div><!--/.main-content -->
      <div class="center">
      <?php if($total_pages >= 25){ ?>
      <ul class="pagination">
		    <li><a href="<?php echo Url::toRoute('home/index'); ?>&page=1">First</a></li>
		    <li class="<?php if($current_page <= 1){ echo 'disabled'; } ?>">
		        <a href="<?php echo Url::toRoute('home/index'); if($current_page <= 1){ echo '#'; } else { echo "&page=".($current_page - 1); } ?>">Prev</a>
		    </li>
		    <li class="<?php if($current_page >= $total_pages){ echo 'disabled'; } ?>">
		        <a href="<?php echo Url::toRoute('home/index');if($current_page >= $total_pages){ echo '#'; } else { echo "&page=".($current_page + 1); } ?>">Next</a>
		    </li>
		    <li><a href="<?php echo Url::toRoute('home/index'); ?>&page=<?php echo $total_pages; ?>">Last</a></li>
		</ul>
	 <?php } ?>
  </div>
      <!-- <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#">
                <span class="ti-arrow-left"></span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="ti-arrow-right"></span>
              </a>
            </li>
          </ul>
        </nav> -->

      <!-- Footer -->
      <footer class="site-footer">
        <div class="row">
          <div class="col-md-6">
            <p class="text-center text-md-left">Copyright © 2021 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</p>
          </div>

          <div class="col-md-6">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
              <li class="nav-item">
                <a class="nav-link" href="../help/articles.html">Documentation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../help/faq.html">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://themeforest.net/item/theadmin-responsive-bootstrap-4-admin-dashboard-webapp-template/20475359?license=regular&open_purchase_for_item_id=20475359&purchasable=source&ref=thethemeio">Purchase Now</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
      <!-- END Footer -->

    </main>
    <!-- END Main container -->
    <script type="text/javascript">
      

    </script>