<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedin()){
	Redirect::to('index.php');
}

if (Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
													"name"=>array('required'=>true,
																  'min'=>2, 
																  'max'=>20)
													));
		if($validation->passed()){

			try{
				$user->update(array(
					'Name' => Input::get('name')
				));

				Session::flash('home', 'Your details have been updated.');
				Redirect::to('index.php');

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
  <h2>Demo Update for example purpose</h2>
</div>
<form action="" method="post" class="w3-container">
	<div class="field">
		
		<input type="text" name="name" value="<?php echo escape($user->data()->Name); ?>" class="w3-input">
		<label>Name</name><br><br>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

		<input type="submit" class="w3-btn w3-padding w3-teal" value="Update"></input>
	</div>
</form><br>
</div>