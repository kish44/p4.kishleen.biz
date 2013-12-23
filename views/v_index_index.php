
<div id="main">
  <div class="container">
    <h1>Find Popular Restaurants</h1>
    <h2>Are you hungry!</h2>
    <p>&nbsp;</p>
    <div><a href='/users/login'>Log in here </a>to add your favorite restauarant</div>
  </div>
  <!--main-->
  <div class="mapWrap">
  <p>Find popular restaurants near:</p>
    <div>
      <input type="text" id="addressInput" size="10"/>
      <select id="radiusSelect">
        <option value="25" selected>25mi</option>
        <option value="100">100mi</option>
        <option value="200">200mi</option>
      </select>
      <input type="button" onClick="searchLocations()" value="Search"/>
    </div>
    <div>
      <select id="locationSelect" style="width:100%;visibility:hidden">
      </select>
    </div>
    <div id="map"></div>
    <div class="clear"></div>
    <div class="bottom"> Lets find the best meal! </div>
  </div>
  <!--mapWrap content-->
</div>
<!--main div-->
