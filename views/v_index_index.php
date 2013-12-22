<div class="pageContent">

  <div id="main">
    <div class="container">
      <h1>Find a Party Hall</h1>
      <h2>And Get Ready to Party!</h2>
      <p>&nbsp;</p>
    </div>
    <!--main-->
    <div class="login">
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
      <div id="map" style="width: 100%; height: 800px"></div>
      <div class="clear"></div>
      <div class="bottom"> Its Party Time! </div>
    </div>
    <!--page content-->
  </div>
  <!--container div-->

</div>
