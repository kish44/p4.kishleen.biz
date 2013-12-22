<?
/*************************************************************
* userinfo.php
*
* Computer Science 50
* Kishleen Saini
*
* Stores user information and lets user add party halls to database
*****************************************************************/
?>
<?php 
/*main.php*/

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Party Hall Finder: User Info Page</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script src="js/jqueryValidation/js/jquery-1.6.min.js" type="text/javascript">
        </script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jqueryValidation/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
        </script>
<script src="js/jqueryValidation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
        </script>
<script src="js/jqueryValidation/js/contrib/other-validations.js" type="text/javascript" charset="utf-8">
        </script>

</head>
<body>
<div class="pageContent">
  <div id="main">
    <div class="container">
      <h1>USER INFO</h1>
      <h2>Advertise your party halls for free!!</h2>
    </div>
    <!--main-->
    <div class="login">
     
      <div class="page"> </div>
      <form id="formID" class="formular" method="post" action="js/jqueryValidation/phpajax/ajaxValidateSubmitHall.php" style="width:600px">
        <fieldset>
          <p class="heading"> Venue Name </p>
          <label>
            <input value="" class="validate[required, maxSize[100] text-input" type="text" name="venue" id="venue" />
          </label>
          <p class="heading"> Phone </p>
          <label>
            <input value="+1 305 768 23 34 ext 23 BUG" class="validate[required,custom[phone]] text-input" type="text" name="telephone" id="telephone" />
          </label>
          <p class="heading">URL</p>
          <label>
            <input value="http://" class="validate[required,custom[url]] text-input" type="text" name="url" id="url" />
          </label>
          <p class="heading">Email</p>
          <label>
            <input value="someone1@here.com" class="validate[required,custom[email]] text-input" type="text" name="email" id="email" />
          </label>
          <p class="heading"> Capacity </p>
          <label>
            <input value="" class="validate[required,custom[integer],max[5000]] text-input" type="text" name="capacity" id="max" />
          </label>
          
          <p class="heading">Features</p>
          <input type="checkbox" id="parking" name="parking" value="parking" />
          Parking<br>
          <input type="checkbox" id="catering" name="catering" value="catering" />
          Catering<br>
          <input type="checkbox" id="music" name="music" value="music" />
          Music<br>
          
          <p class="heading"> Address </p>
          <label>
            <textarea id="address" class="validate[required,funcCall[validateMap]] text-input"  name="address"></textarea>
          </label>
          <div id="map_canvas"></div>
          <div id="results">
            <p>Valid:</p>
            <label>
              <input type="text" id="valid" size="60" />
            </label>
            <p>Matched:</p>
            <label>
              <input type="text" id="type" name="type" size="60" />
            </label>
            <p>Result:</p>
            <label>
              <input type="text" id="result" size="60" />
            </label>
            <p>Lat:</p>
            <label>
              <input type="text" name="lat" id="lat" class="validate[required,funcCall[latlngFilled]] text-input" size="60" />
            </label>
            <p>Lng:</p>
            <label>
              <input type="text" name="lng" id="lng" class="validate[required,funcCall[latlngFilled]] text-input"  size="60" />
            </label>
            <div id="validate">
              <input type="button" value="Validate" />
             
            </div>
          </div>
        </fieldset>
        <input class="bt_login" type="submit" value="Submit"/>
      </form>
    </div>
  </div>
</div>
</body>
</html>