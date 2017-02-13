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


<html>
<head>
    <title>CodeIgniter Remember Me Checkbox</title>
    <style>
        #main {
            width: 285px;
            margin: 50px auto;
            font-family: raleway;
            text-align: right;
            direction: rtl;
        }

        span {
            color: red;
        }

        h2 {
            background-color: #FEFFED;
            text-align: center;
            border-radius: 10px 10px 0 0;
            margin: -10px -40px;
            padding: 30px;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #ccc;
            margin: 10px -40px;
            margin-bottom: 30px;
        }

        #login {
            width: 300px;
            float: none;
            border-radius: 10px;
            font-family: raleway;
            border: 2px solid #ccc;
            padding: 10px 40px 25px;
            margin-top: auto ;
        }

        input[type=text], input[type=password], input[type=email] {
            width: 99.5%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            padding-left: 5px;
            font-size: 16px;
            font-family: raleway;
        }

        input[type=submit] {
            width: 100%;
            background-color: #FFBC00;
            color: white;
            border: 2px solid #FFCB00;
            padding: 10px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        #profile {
            padding: 50px;
            border: 1px dashed grey;
            font-size: 20px;
            background-color: #DCE6F7;
        }

        #logout {
            float: right;
            padding: 5px;
            border: dashed 1px gray;
            margin-top: -126px;
            margin-right: 36px;
            font-size: 20px;
        }

        a {
            text-decoration: none;
            color: cornflowerblue;
        }

        i {
            color: cornflowerblue;
        }

        .error_msg {
            color: red;
            font-size: 16px;
        }

        .message {
            position: absolute;
            font-weight: bold;
            font-size: 28px;
            color: #6495ED;
            width: 500px;
            text-align: center;
            margin: -20px;

        }

        #note {
            clear: left;
            padding-top: 20px;
            margin-left: 20px;
        }

        /*-----CSS for Right Side Advertisement----*/
        #formget_ad {
            position: absolute;
            top: 40px;
            right: 18%;
        }
    </style>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet'
          type='text/css'>
</head>
<body>

<div id="main">
    <div id="login">
        <h2>لطفا اطلاعات را جهت ورود وارد کنید</h2>

        <hr/>
        <?php echo form_open('login/user_login_process'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?><br>
        <label>نام کاربری :</label>
        <input type="text" name="username" id="name" placeholder="نام کاربری"/><br/><br/>
        <label>رمزعبور :</label>
        <input type="password" name="password" id="password" placeholder="**********"/><br/><br/>
        <input type="submit" value=" ورود " name="submit"/><br/>
        <?php echo form_close(); ?>
    </div>


</div>

</body>
</html>