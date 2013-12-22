<h1>Add Post</h1>

<form id="formID" class="formular" method="post" action="p_add" style="width:600px">
        <fieldset>
          <p class="heading"> Venue Name </p>
          <label>
            <input value="" class="validate[required, maxSize[100] text-input" type="text" name="venue" id="venue" />
          </label>
          
          
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
         <input type='submit' value='New post'>
      </form>
