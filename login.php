 <?php
require_once ("core/init.php");

if(Session::exists('home')){
	echo "<div class='w3-container w3-section w3-green'>
						<span onclick='this.parentElement.style.display='none'' class='w3-closebtn'>×</span>
						<h3>Success!</h3>
						<p>" . Session::flash('home') . "</p>
						</div>";
}
if(Input::exists()){
	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
													"username"=>array('required'=>true),
													"password"=>array('required'=>true)
													)
										);
		if ($validation->passed()){
			$user = new User();

			$remember = (Input::get('remember') === 'on') ? true : false;
			
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);

			if ($login){
				Redirect::to('index.php');
			}else{
				echo "<div class='w3-container w3-section w3-red'>
						<span onclick='this.parentElement.style.display='none'' class='w3-closebtn'>×</span>
						<h3>Danger!</h3>
						<p>Log in Failed.</p>
					  </div>";
			}

		}else{
			foreach($validation->errors() as $error){
				echo "<div class='w3-container w3-section w3-red'>
						<span onclick='this.parentElement.style.display='none'' class='w3-closebtn'>×</span>
						<h3>Danger!</h3>
						<p>".$error."<br></p>
					  </div>";
			}
		}
	//}
}
include "includes/header.php";
?>
<div class="w3-row">
  <div class="w3-col m4 l3"></div>

<div class="w3-col m4 l3">
<div class="w3-card-4">

<div class="w3-container w3-red">
  <h2>Demo Login for example purpose</h2>
</div>
<form action="" method="post" class="w3-container">
	<div class="field">
		<input type="text" name="username" id="username" autocomplete="off" class="w3-input">
		<label>Username</label>
	</div>

	<div class="field">
		<input type="password" name="password" id="password" autocomplete="off" class="w3-input">
		<label>Password</label>
	</div>

	<div class="field">
		<label for="remember">
			<input type="checkbox" name="remember" id="remember" class="w3-check" checked> Remember me 
		</label>
	</div><br>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

	<input type="submit" class="w3-btn w3-padding w3-teal" value="Log in">
</form><br>
</div>
</div>
</div>

