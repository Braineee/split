<?php
require_once("core/init.php");


if (Input::exists()){

	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
													"username"=>array('required'=>true,'min'=>2, 'max'=>20, 'unique'=>'users'),
													"password"=>array('required'=>true,'min'=>6),
													"password_again"=>array('required'=>true,'matches'=>'password'),
													"name"=>array('required'=>true,'min'=>2, 'max'=>20)
													)
										);
		if ($validation->passed()){
			$user = new User();

			$salt = Hash::salt(32);

			try{

				$user->create(array(
							'Username' => Input::get('username'),
							'Password' => Hash::make(Input::get('password'), $salt),
							'Salt'     => $salt,
							'Name'     => Input::get('name'),
							'Joined'   => date('Y-m-d H:i:s'),
							'Group'    => 1 
				));
				Session::flash('home','You have been registered and can now log in!');
				Redirect::to('login.php');

			}catch(Exception $e){
				die($e->getMessage());
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
	}
}

include "includes/header.php";
?>
<div class="w3-row">
  <div class="w3-col m4 l3"></div>

<div class="w3-col m4 l3">
<div class="w3-card-4">

<div class="w3-container w3-red">
  <h2>Demo Registration for example purpose</h2>
</div>

<form method="post" action="" class="w3-container">
	<div class="field">
		<input type="text" name="username" value="<?php if(isset($_POST['username'])){echo escape(Input::get('username'));} ?>" id="username" autocomplete="off" class="w3-input">
		<label>Username</label>
	</div>

	<div class="field">
		<input type="password" name="password" value="" id="password" autocomplete="off" class="w3-input">
		<label>Chooes a password</label>
	</div>

	<div class="field">
		<input type="password" name="password_again" value="" id="password_again" autocomplete="off" class="w3-input">
		<label>Re-enter password</label>
	</div>

	<div class="field">
		<input type="text" name="name" value="<?php if(isset($_POST['username'])){echo escape(Input::get('name'));} ?>" id="name" autocomplete="off" class="w3-input">
		<label>Enter your fullname</label>

	</div><br>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >

	<input type="submit" class="w3-btn w3-padding w3-teal" value="Register"></input>
</form><br>
</html>