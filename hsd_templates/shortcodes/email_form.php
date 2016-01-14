<div class="row">
	<div class="col-sm-offset-3 col-md-6">
		<?php if ( $error ): ?>
			<div class="alert alert-danger" role="alert"><?php self::esc_e( $error ) ?></div>
		<?php endif ?>

		<form id="hsd_email_form" action="" method="post" accept-charset="utf-8" class="form" role="form">
			<div class="form-group">
				<label for="email"><?php self::_e( 'Your e-mail' ) ?></label>
				<input type="email" class="form-control" id="hsd_email" name="email" placeholder="<?php self::_e( 'you@gmail.com' ) ?>" required="required">
			</div>
			<?php do_action('hsd_email_form_fields') ?>
			<input type="hidden" name="mid" value="<?php echo $mid ?>">
			<input type="hidden" name="hsd_nonce" value="<?php echo $nonce ?>">
			<button type="submit" class="button"><?php self::_e( 'Submit' ) ?></button>
		</form>
	</div><!-- .col-sm-offset-3 col-md-6 -->	
</div><!-- .row -->