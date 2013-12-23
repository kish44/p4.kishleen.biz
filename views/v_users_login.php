<div id="main">
<div class="container">
      <h1>Login</h1>
    </div>
<div class="mapWrap">
<form id="formID" class="formular" method="post" action="p_login">
    <fieldset>
    <p class="heading">Email</p>
    <label>
    <input type='text' class="validate[required,custom[email]] text-input" name='email' id="email">    
    </label>

    <p class="heading">Password</p>
    <label>
    <input type='password' class="validate[required] text-input" name='password'>
    </label>
	</fieldset>
    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Log in'>

</form>
</div>
</div>