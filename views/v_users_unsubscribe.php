<h2>Unsubscribe</h2>
        
        <p>Are you sure you wish to unsubscribe? If not, click <a href="/users/profile/">here </a>to return.</p>
        <p class="error">* required field.</p>
        
                <!-- form for delete account-->
                <form method='POST' action='/users/p_unsubscribe'>
                
                        Password<span class="error">*</span><br>
                        <input type='password' name='password' class='field' ><br>

                        Confirm Password<span class="error">*</span><br>

                        <input type='password' name='conf_password' class='field'>
                        <br>

                                <!-- checks to see if error isset. If so, echo specific error. -->
                                <?php if(isset($error)): ?>
                                        <div class='error'>
                                                Please enter a valid password.<br>
                                        </div>
                                <?php endif; ?>
                                
                                <input type='submit' value ='Unsubscribe' class='button' >
                
                </form>