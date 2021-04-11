<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Restaurant';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to the Restaurant</h1>

        <p class="lead">There is no love sincerer than the love of food.</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute('site/signup'); ?>">Get started with Signup</a></p>
	
		<h4><p>Already have an account? <a href="<?php  echo Url::toRoute('site/login'); ?>">Login</a>.</p></h4>
    </div>

</div>
