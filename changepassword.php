<?php 
require_once("core/init.php");

$user = new User();

if(!$user->isLoggedin()){
	Redirect::to('index.php');
}

if (Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
													   'current_password' => array('required'=>true, 'min' => 6),
													   'password_new' => array('required'=>true, 'min' => 6),
													   'password_new_again' => array('required'=>true, 'min' => 6, 'matches' => 'password_new'),		
													)
									  );

		if($validation->passed()){

			if(Hash::make(Input::get('current_password'), $user->data()->Salt) !== $user->data()->Password){
				echo "<div class='w3-container w3-section w3-red'>
						<span onclick='this.parentElement.style.display='none'' class='w3-closebtn'>×</span>
						<h3>Danger!</h3>
						<p>You current password is wron<br></p>
					  </div>";
			}else{
				$salt = Hash::salt(32);
				$user->update(array(
					'Password' => Hash::make(Input::get('password_new'), $salt),
					'Salt'  => $salt
				));

				Session::flash('home','Your password has been changed!');
				Redirect::to('index.php');
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
  <h3>Demo Update password for example purpose</h3>
</div>
<form method="post" action="" class="w3-container">
	<div class="field">
		<input type="password" name="current_password" value=""  autocomplete="off" class="w3-input">
		<label>Current Password</label>
	</div>

	<div class="field">
		
		<input type="password" name="password_new" value="" autocomplete="off" class="w3-input">
		<label>New password</label>
	</div>

	<div class="field">
		<input type="password" name="password_new_again" value="" autocomplete="off" class="w3-input">
		<label>Re-enter New password again</label><br><br>
	</div>


	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

	<input type="submit" class="w3-btn w3-padding w3-teal" value="Change"></input>
</form><br>
</html>
</div>
</div>
</div>