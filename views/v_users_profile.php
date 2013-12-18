


<h2>My Profile</h2>
        
        <!-- displays user's name and date joined -->
        <h4>Name: <span><?=$user->first_name?> <?=$user->last_name?></span></h4>
        <h4>Join Date: <span><?= date('F j, Y', $user->created) ?></span></h4>    
        
        <h4>Unsubscribe</h4>
        Click<a href="/users/unsubscribe/"> here </a>to unsubscribe.
