<?php

namespace frontend\controllers;
use Yii;

class HomeController extends \yii\web\Controller
{   

  public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        $session = Yii::$app->session;

        if(isset($session['__id'])){
        return parent::beforeAction($action);
        }else{
        return $this->redirect(['site/index']);   
        }    

    }

    //Current location based on static values

    public function actionIndex()
    {
    	/*print_r($_GET['page']);
      die;*/
      $page=(isset($_GET['page'])) ? $page=$_GET['page'] : $page=1;
      /*print_r($page);
      die;*/
      $session = Yii::$app->session;
    	$key = \Yii::$app->params['apiKey'];
      $data=array();
      $total_pages=$per_page=$current_page=$more_page=0;
    	//$url="https://api.documenu.com/v2/restaurant/4072702673999819?key=".$key;
    	//$url="https://api.documenu.com/v2/restaurant/4072702673999819";
      //$page=1;

      $url="https://api.documenu.com/v2/restaurants/search/geo?lat=40.729029&lon=-74.158083&distance=5&page=".$page;
    	$headers = array(
	    'Accept: application/json',
	    'Content-Type: application/json',
	    'X-API-KEY:'.$key,
	    );
    	  
     /* print_r($url);
      die;*/
      $conn_check=$this->is_connected();
      if($conn_check == 1){
		  $ch = curl_init($url);
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch); 
      curl_close($ch);

	    $georesult=json_decode($response);

      /*echo "<pre>";
      print_r($georesult);
      die;*/

      $data=$georesult->data;
      $total_pages=$georesult->total_pages;
      $per_page=$georesult->numResults;
      $current_page=$georesult->page;
      $more_pages=$georesult->more_pages;
      }else{
      Yii::$app->session->setFlash('error', 'Please check your internet connection.');
      }


      $this->layout="dashboard";
      return $this->render('index',['data'=>$data,'total_pages'=>$total_pages,'per_page'=>$per_page,'current_page'=>$current_page,'more_pages'=>$more_pages]);
    }

    //Individual restuarant detail page 

    public function actionRestdetail($restid){

    $key = \Yii::$app->params['apiKey'];

    $cuisines=array();
    $address="";
    $geo="";
    $menus=array();

    $url="https://api.documenu.com/v2/restaurant/".$restid;
      $headers = array(
      'Accept: application/json',
      'Content-Type: application/json',
      'X-API-KEY:'.$key,
      );
        
     /* print_r($url);
      die;*/
      $conn_check=$this->is_connected();
      if($conn_check == 1){
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch); 
      curl_close($ch);

      $indivresult=json_decode($response);
      
      $data=$indivresult->result;
      $cuisines=$data->cuisines;
      $menus=$data->menus;
      
      $menuitems=array();
      }else{
      Yii::$app->session->setFlash('error', 'Please check your internet connection.');
      }



      $this->layout="dashboard";
      return $this->render('restaurantdetail',['data'=>$data,'cuisines'=>$cuisines,'menus'=>$menus]);

      }


  //Search based on restaurant_name 

  public function actionSearch()
    {

      $session = Yii::$app->session;
      $key = \Yii::$app->params['apiKey'];
      $data=array();
      $restaurant_name=$zip_code=$restaurant_phone=$restaurant_website=$address=$state=$cuisine="";

      /*print_r($_GET['restaurant_name']);
      die;*/

      $url="";
      $url.="https://api.documenu.com/v2/restaurants/search/fields";

      $page=(isset($_GET['page'])) ? $page=$_GET['page'] : $page=1;

      if(isset($_GET['restaurant_name']) && !empty($_GET['restaurant_name'])){
      $url.="?restaurant_name=".$_GET['restaurant_name'];
      }

      if(isset($_GET['zip_code']) && !empty($_GET['zip_code'])){
      $url.="?zip_code=".$_GET['zip_code'];
      }

      if(isset($_GET['restaurant_phone']) && !empty($_GET['restaurant_phone'])){
      $url.="?restaurant_phone=".$_GET['restaurant_phone'];
      }

      if(isset($_GET['restaurant_website']) && !empty($_GET['restaurant_website'])){
      $url.="?restaurant_website=".$_GET['restaurant_website'];
      }

      if(isset($_GET['address']) && !empty($_GET['address'])){
      $url.="?address=".$_GET['address'];
      }

      if(isset($_GET['state']) && !empty($_GET['state'])){
      $url.="?state=".$_GET['state'];
      }

      if(isset($_GET['cuisine']) && !empty($_GET['cuisine'])){
      $url.="?cuisine=".$_GET['cuisine'];
      }


      $headers = array(
      'Accept: application/json',
      'Content-Type: application/json',
      'X-API-KEY:'.$key,
      );
        

      $conn_check=$this->is_connected();
      if($conn_check == 1){
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch); 
      curl_close($ch);

      $georesult=json_decode($response);


      $data=$georesult->data;
      $total_pages=$georesult->total_pages;
      $per_page=$georesult->numResults;
      $current_page=$georesult->page;
      $more_pages=$georesult->more_pages;
      }else{
      Yii::$app->session->setFlash('error', 'Please check your internet connection.');
      }


      $this->layout="dashboard";
      return $this->render('index',['data'=>$data,'total_pages'=>$total_pages,'per_page'=>$per_page,'current_page'=>$current_page,'more_pages'=>$more_pages]);
    }

    function is_connected()
    { 

      $connected = @fsockopen('www.api.documenu.com', 80);
        if ($connected){
            $is_conn = true; //action when connected
            fclose($connected);
        }else{
            $is_conn = false; //action in connection failure
        }
        return $is_conn;

    }

}
