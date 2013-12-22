<div class="container">
      <h1>Login</h1>
    </div>

<form method='POST' action='/users/p_login'>

    <div>
    <p>Email</p>
    <input type='text' name='email'>    
    </div>

    <div>
    <p>Password</p>
    <input type='password' name='password'>
    </div>

    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Log in'>

</form>
