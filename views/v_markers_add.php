<h1>Add Post</h1>

<form id="myForm" name="myForm" method='POST' action='/markers/p_add'>
	<div>
    <label for='content'>New Post:</label>
    </div>
    
    <div>
    <textarea name='content' id='content'></textarea><br>
    </div>
    
    <div>
    <label for="venue">
                        Venue</label>
                    <input id="venue" name="venue" type="text" />
                    </div>
                    
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

    
    <input id="submit" type='submit' value='submit'>

    


</form> 
