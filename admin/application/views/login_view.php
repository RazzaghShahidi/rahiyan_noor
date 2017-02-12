<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/05/2017
 * Time: 09:05 AM
 *Description:
 */

//$this->load->helper('form');
//echo validation_errors();
//echo form_open('verifylogin');
//$username = form_input(array('name' => 'username', 'placeholder' => 'Username or Email', 'required' => 'required'));
//$password = form_password(array('name' => 'password', 'placeholder' => 'Password', 'required' => 'required'));
//$remember = form_checkbox('remember', '1');
//$submit = form_submit('submit', 'Login');
//
//
//echo $username;
//echo $password;
//echo $remember;
//echo $submit;
//echo form_close();

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Simple Login with CodeIgniter</title>
</head>
<body>
<h1>Simple Login with CodeIgniter</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('verifylogin'); ?>
<label for="username">Username:</label>
<input type="text" size="20" id="username" name="username"/>
<br/>
<label for="password">Password:</label>
<input type="password" size="20" id="passowrd" name="password"/>
<br/>
<label for="remember">Password:</label>
<input type="checkbox" id="remember" name="remember" value="1"/>
<br/>
<input type="submit" value="Login"/>
</form>
</body>
</html>