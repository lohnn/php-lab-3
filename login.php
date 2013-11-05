<form method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php
		if (isset($_POST['username']))
			echo $_POST['username'];
        ?>" />
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" />
    </div>
    <label for="remember">Remember me:</label>
    <input type="checkbox" name="remember" id="remember" value="1" />
    <input type="hidden" name="log_in" />
    <input type="submit" value="Log in" />
</form>