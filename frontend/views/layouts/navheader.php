<?php 

   use yii\helpers\Html;
   use yii\bootstrap\Nav;
   use  yii\web\Session;
   use common\widgets\Alert;


?>
 <header id="navbar">
    <div id="navbar-container" class="boxed">
        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">
                <!-- <i class="fa fa-cube brand-icon"></i> -->
                <div class="brand-title">
                    <h2>Restaurant</h2>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->
        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">                       
            <ul class="nav navbar-top-links pull-left">
                <!--Profile toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <li class="hidden-xs" id=" ">
                    <div class="left">
                    <span class="welcome"><?php echo $schoolname_html ?></span>
                    </div>
              </li></ul>
                <style>
                      .logout-btn{
                        background: none;border: none;background-color: #fffdfa;
                        font-size: 16px;
                        color: #0a356f;
                       line-height: 0;
                      }
                      .logout-btn:hover{
                        background-color: #F44336;
                        color:#fff;
                      }
                      .li-logout-btn:hover,.navbar-top-links>li.li-logout-btn>a:hover{
                        background-color: transparent;
                      }
                
                </style>
                
            
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Profile toogle button-->
                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ul class="nav navbar-top-links pull-right">
                        <li class="li-logout-btn">
                              <?php  if (Yii::$app->user->isGuest) {
                                 Html::beginForm(['/site/logout'], 'post');
                                    //echo  ['label' => 'Sign out', 'url' => ['/site/login']];
                                 }else{
                                    echo '<a>'
                                           . Html::beginForm(['/site/logout'], 'post')
                                           . Html::submitButton(
                                               '<i class="fa fa-fw fa-sign-out"></i><strong>  Logout</strong>',
                                               ['class' => 'btn logout-btn']
                                           )
                                           . Html::endForm()
                                           . '</a>';

                                 } ?>
                           </li>
                </ul>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->
            </ul>
        </div>
     
    </div>
</header>
 <style>
    .left{
          display: table-cell;
          padding: 6px 12px 0 15px;
          vertical-align: middle;
          height: 60px;
          color: #ffffff;
          -webkit-transition: all .4s;
          transition: all .4s;
          font-size:22px;
}

#navbar-container.boxed{
    background: #93bbde;
}

span.sr-only.welcome{
    position: relative;
    font-size: 20px;
    font-weight: bold;
    color: #ffffff;}

ul.nav.navbar-nav li.dropdown:hover ul.dropdown-menu {
display: block !important;
} 
  </style>
