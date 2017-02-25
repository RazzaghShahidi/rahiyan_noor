<?php
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/05/2017
 * Time: 09:05 AM
 *Description:
 */
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rahiyan Noor Login Page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
$login = array(
    'name'	=> 'login',
    'id'	=> 'login',
    'value' => set_value('login'),
    'maxlength'	=> 80,
    'size'	=> 30,
    'class'=>"form-control input-lg",
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'نام کاربری یا ایمیل خود را وارد کنید';
} else if ($login_by_username) {
    $login_label = 'نام کاربری خود را وارد کنید';
} else {
    $login_label = 'ایمیل';
}
$login['placeholder']=$login_label;
$password = array(
    'name'	=> 'password',
    'id'	=> 'password',
    'class'=>"form-control input-lg",
    'placeholder'=>"رمزعبور",

);
$remember = array(
    'name'	=> 'remember',
    'id'	=> 'remember',
    'value'	=> 1,
    'checked'	=> set_value('remember'),
    'class'=>'hidden'

);
$captcha = array(
    'name'	=> 'captcha',
    'id'	=> 'captcha',
    'maxlength'	=> 8,
);
?>
<body>
<div class="container">

    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <?php echo form_open($this->uri->uri_string()); ?>
            <fieldset>
                <h2>لطفا اطلاعات را جهت ورود وارد کنید</h2>
                <hr class="colorgraph">
                <div class="form-group">
                    <?php echo form_input($login); ?>
                    <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
                </div>
                <div class="form-group">
                    <?php echo form_password($password); ?>
                    <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
                </div>
                <span class="button-checkbox">
					<button type="button" class="btn" data-color="info">به خاطر آوری</button>

                    <?php if ($show_captcha) {
                    if ($use_recaptcha) { ?>
                    <div id="recaptcha_image"></div>
                    <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			        <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">متن امنیتی به صورت صوتی</a></div>
		        	<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">متن امنیتی به صورت تصویری</a></div>
                    //
                    <div class="recaptcha_only_if_image">حروف تصویر را وارد کنید</div>
			        <div class="recaptcha_only_if_audio">اعدادی را که می شنوید وارد کنید</div>
                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                        <?php echo form_error('recaptcha_response_field'); ?>
		                <?php echo $recaptcha_html; ?>

                    <?php } else { ?>
                    <p>Enter the code exactly as it appears:</p>
                    <?php echo $captcha_html; ?>
                    <?php echo form_label('Confirmation Code', $captcha['id']); ?>
                        <?php echo form_input($captcha); ?>
                        <?php echo form_error($captcha['name']); ?>
                    <?php }
                    } ?>


                    <?php echo form_checkbox($remember); ?>
                    <?php echo anchor('/auth/forgot_password/', 'رمز عبور خود را فراموش کرده اید؟'); ?>
                    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>


				</span>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <?php echo form_submit('submit', 'ورود',array('class'=>"btn btn-lg btn-success btn-block")); ?>

                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>

</html>






