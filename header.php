<?php
 //Code to change which to use depending on if logged in or not and if admin or not
 
 ?>
 
 <!--Not logged in -->
		<header id="header">
			<a href = "home.html">
				<img id="logo" src="images/logo.png" alt="Kitty Threads" />
			</a>
			<nav>
				<ul>
          <li><a href="home.php">home</a></li>
          <li><a href="login.php">profile</a></li>
          <li><a href="login.php">log in</a></li>
        </ul>
      </nav>
    </header>
	
<!--Logged in -->
		<header id="header">
			<a href = "home.html">
				<img id="logo" src="images/logo.png" alt="Kitty Threads" />
			</a>
			<nav>
				<ul>
          <li><a href="home.php">home</a></li>
          <li><a href="profile.php">profile</a></li>
          <li><a href="signout.php">sign out</a></li>
        </ul>
      </nav>
    </header>
	
	<!--Logged in and admin -->
		<header id="header">
			<a href = "home.html">
				<img id="logo" src="images/logo.png" alt="Kitty Threads" />
			</a>
			<nav>
				<ul>
          <li><a href="home.php">home</a></li>
          <li><a href="profile.php">profile</a></li>
          <li><a href="signout.php">sign out</a></li>
		  <li><a href="admin.php">admin</a></li>
        </ul>
      </nav>
    </header>