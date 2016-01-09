<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Login</title>
	<!-- CSS  -->
  <link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/style-icon.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<div class="container">

	<div class="row">

		<div class="col s12 m6 offset-m3 l4 offset-l4">
			<div class="card-panel grey lighten-5 z-depth-1">
				<div class="row">
					<div class="col s12">
						<h4 class="center-align"><span class="black-text">Login</span></h4>
					</div>
				</div>
				<div class="divider"></div>
				<div class="row">
					<div class="col s12">
            <?php echo form_open("auth/login","class='col s12'");?>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>

                    <?php echo lang('login_identity_label', 'identity');?>
                    <?php echo form_input($identity,'class="validate"');?>
								</div>

							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">vpn_key</i>
                  <?php echo lang('login_password_label', 'password');?>
                  <?php echo form_input($password,'','class="validate"');?>
								</div>
							</div>
              <div class="row">
                <div class="input-field col m4 s6">

                    <?php echo lang('login_remember_label', 'remember');?>
                </div>
                  <div class="input-field col m8 s6">
                      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                      <label for="remember"></label>
                </div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<div class="right">
                    <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn waves-effect waves-light"');?></p>
									</div>
								</div>
							</div>
					  <?php echo form_close();?>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>


<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/materialize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init.js"></script>
	<script>

	</script>
</body>
</html>
