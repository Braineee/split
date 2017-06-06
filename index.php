<?php
require_once "core/init.php";
	
if(Session::exists('home')){
	echo "<div class='w3-container w3-section w3-green'>
						<span onclick='this.parentElement.style.display='none'' class='w3-closebtn'>×</span>
						<h3>Success!</h3>
						<p>" . Session::flash('home') . "</p>
						</div>";
}

$user = new User(); // curent user
if($user->isLoggedin()){
	include "includes/header.php";
?>
	<div class="w3-card-4">
	<div class="w3-container w3-red">
		<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->Username); ?>"><?php echo escape($user->data()->Username); ?></a>!</p>
	</div>
	<div class="w3-container">
		<ul>
			<li><a href="logout.php">Log Out</a></li>
			<li><a href="update.php">Update Details</a></li>
			<li><a href="changepassword.php">Change Password</a></li>
		</ul>
	</div>
	</div>
<?php	

	if($user->hasPermission('admin')){
		echo "<p>You are an administarator</p>";
	}
}else{
	include "includes/header.php";
?>

			<div class="container">
			<div class="w3-row">
				<div class="w3-row w3-light-grey w3-card-2"style="margin-top:100px;">
				<div class="w3-container">
				<div class="w3-col l6 w3-center section css-hide-when-large w3-container" style="margin-top:50px;">
					<h1 style="font-size:100px;color:">SPLIT.</h1>
					<p>A framework built with PHP</p>
					<a href="register.php" class="w3-btn w3-red">EXAMPLE</a>
					<a href="documentation.php" class="w3-btn w3-red">DOCUMENTATION</a>  
				</div>
				<div class="w3-container w3-col l6 section sectionexample" style="padding-top:40px;">
					<h4>SPLIT Example:</h4>
					<div class="w3-code cssHigh notranslate w3-card-2">
						<span style="color:red;">require_once</span><span style="color:orange;"> "core/init.php";</span><br><br>
	
						<span style="color:red;">if</span>(<span style="color:blue;">Session</span><span style="color:red;">::</span>exists(<span style="color:orange;">'home'</span>)){<br>
						&nbsp;&nbsp;&nbsp;<span style="color:blue;">echo</span><span style="color:red;"></span> <span style="color:blue;">Session</span>::flash(<span style="color:orange;">'home'</span>) <span style="color:red;"></span>;<br>
						}<br><br>

						$user = <span style="color:red;">new</span> <span style="color:blue;">User</span>(); // curent user<br><br>
						<span style="color:red;">if</span>($user<span style="color:red;">-></span>isLoggedin()){<span style="color:blue;">echo</span><span style="color:orange;">  'Hello World!'</span>; }
					</div>
					<a href="#" target="_blank" class="w3-btn w3-theme w3-red">View More</a><br><br>
					
				</div>
				</div>
				<footer class="w3-container w3-red">
					<h5 style="text-align:center;">You need to <a href="login.php">log in</a> or <a href="register.php">register</a></h5>
				</footer>
						<!--p> </p-->
			</div>	
			</div>
		<body>
	</html>

<?php
}
