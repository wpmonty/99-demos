<?php
if ( ! is_user_logged_in() ) {
	return;
} ?>

<?php if ( $error ) : ?>
	<div class="alert alert-danger" role="alert"><?php self::esc_e( $error ) ?></div>
<?php endif ?>

<form action="" method="post" enctype="multipart/form-data" id="hsd_message_form" class="form" role="form">
	<?php if ( ! $conversation_view ) : ?>
		<div class="form-group">
			<label for="subject"><?php self::_e( 'Subject' ) ?></label>
			<input type="text" class="form-control" id="hsd_subject" name="subject" placeholder="<?php self::_e( 'How can we help you?' ) ?>" required="required">
		</div>
	<?php endif ?>
	<div class="form-group">
		<label for="message"><?php self::_e( 'Message' ) ?></label>
		<textarea name="message" class="form-control" id="hsd_message" rows="10" placeholder="<?php self::_e( 'Please include any information that you think will help us generate a speedy response.' ) ?>" required="required" ></textarea>
		<?php if ( $conversation_view ) : ?>
			<p class="help-block"><?php self::_e( 'This will add a message to our current conversation.' ) ?></p>
		<?php endif ?>
	</div>

	<div class="form-group">
		<label for="message_attachment"><?php self::_e( 'Add attachments' ) ?></label>
		<input type="file" id="message_attachment" name="message_attachment[]" multiple>
	</div>

	<?php if ( $conversation_view ) : ?>
		<div id="close_thread_check" class="checkbox">
			<label for="close_thread"><input type="checkbox" name="close_thread" id="close_thread"> <?php self::_e( 'Close Support Thread' ) ?></label>
		</div>
	<?php endif ?>

	<?php if ( $conversation_view ) : ?>
		<input type="hidden" name="hsd_conversation_id" value="<?php echo $_GET['conversation_id'] ?>">
	<?php endif ?>
	<input type="hidden" name="mid" value="<?php echo $mid ?>">
	<input type="hidden" name="hsd_nonce" value="<?php echo wp_create_nonce( HSD_Controller::NONCE ) ?>">
	<button type="submit" id="hsd_submit" class="button"><?php self::_e( 'Submit' ) ?></button>
</form>