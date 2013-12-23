<div id="main">
<div class="container">
      <h1>Sign Up</h1>
</div>
<div class="mapWrap">
<form id="formID" class="formular" method="post" action="p_signup">
                
                <fieldset>
                <p class="heading">First Name</p>
                <label>
                <input type='text' name='first_name' class='field validate[required,custom[onlyLetterNumber],maxSize[100] text-input' value='<?php if(isset($_POST['first_name'])) echo $_POST['first_name']?>'>
                </label>

                <p class="heading">Last Name</p>
                <label>
                <input type='text' name='last_name' class='field validate[required,custom[onlyLetterNumber],maxSize[100] text-input' value='<?php if(isset($_POST['last_name'])) echo $_POST['last_name']?>'>
                </label>
				
                <p class="heading">Email</p>
                <label>
                <input type='text' name='email' class='field validate[required,custom[email]] text-input' value='<?php if(isset($_POST['email'])) echo $_POST['email']?>'>
                </label>
        
            	<p class="heading">Password</p>
                <label>
                <input type='password' name='password' id="password" class='field validate[required] text-input'>
                </label>
                
                <p class="heading">Retype Password</p>
                <label>
                <input type='password' name='retype' id="password2" class='field validate[required,equals[password]] text-input'>
				</label>
                
                </fieldset>
                
                <!-- checks to see if error isset. If so, echo specific error. -->                
                <?php if(isset($error)): ?>
                        <div class='error'>
                                Sign up failed.<br>
                                <?php echo $error; ?>
                        </div>
                <?php endif; ?>  
                        
                <input type='submit' value='Submit' class='button'>
                        
        </form>

</div>