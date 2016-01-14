<div id="hsd_support_conversation" data-item-status="<?php self::esc_e( $item['status'] ) ?>">
	<header id="conversation_header" class="entry-header clearfix">
		<h1 class="entry-title title"><?php self::esc_e( $item['subject'] ) ?></h1>
		<div class="author">
			<span class="posted-on">
				<span class="label label-<?php hsd_status_label( $item['status'] ) ?>"><?php self::esc_e( $item['status'] ) ?></span> 
				<?php 
					$name = self::esc__( $item['customer']['firstName'] ) . ' ' . self::esc__( $item['customer']['lastName'] );
					$time = '<time datetime="'.self::esc__( $item['createdAt'] ).'">'.date( get_option('date_format'), strtotime( self::esc__( $item['createdAt'] ) ) ).'</time>';
					
					printf( self::__( 'By %s on %s' ), $name, $time ); ?>
			</span>
		</div>
	</header><!-- /conversation_header -->

	<a href="<?php echo get_permalink( $post_id ) ?>" class="button hsd_goback"><?php self::esc_e( 'Go back' ) ?></a>

	<section id="hsd_conversation_thread"  class="clearfix">
		<?php 
		$thread = $item['threadCount'];
		foreach ( $threads as $key => $data ): ?>
			<?php if ( $data['type'] != 'lineitem' ): ?>
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<span class="avatar pull-left"><?php echo get_avatar( $data['createdBy']['email'], 36 ) ?></span>
						<h3 class="panel-title pull-right">
							<?php 
								$name = self::esc__( $data['createdBy']['firstName'] ) . ' ' . self::esc__( $data['createdBy']['lastName'] );
								$time = '<time datetime="'.self::esc__( $data['createdAt'] ).'">'.date( get_option('date_format'), strtotime( self::esc__( $data['createdAt'] ) ) ).'</time>';
								
								printf( self::__( '%s on %s' ), $name, $time ); ?>
						</h3>
					</div>
					<div class="panel-body">
						<div class="conversation_body clearfix">
							<div class="message">
								<?php echo wpautop( self::linkify( self::__( $data['body'] ) ) ); ?>
							</div>
							<!-- Image Attachments will be imgs -->
							<?php if ( isset( $data['attachments'] ) && ! empty( $data['attachments'] ) ): ?>
								<div class="img_attachments_wrap clearfix">
									<ul class="attachments img_attachments clearfix">
									<?php foreach ( $data['attachments'] as $key => $att_data ): ?>
										<?php if ( in_array( $att_data['mimeType'], array( 'image/jpeg', 'image/jpg', 'image/png', 'image/gif' ) ) ): ?>
											<li class="image_att">
												<a target="_blank" href="<?php echo esc_url( $att_data['url'] ) ?>" class="file fancyimg" title="View Attachment"><img src="<?php echo esc_url( $att_data['url'] ) ?>" alt="<?php self::esc_e( $att_data['fileName'] ) ?>"></a>
											</li>
										<?php endif ?>
									<?php endforeach ?>
									</ul>
								</div>
								<!-- All Attachments will be linked -->
								<div class="attachments_wrap clearfix">
									<h5><?php self::_e('Attachments') ?></h5>
									<?php if ( isset( $data['attachments'] ) && !empty( $data['attachments'] ) ): ?>
										<ul class="attachments file_attachments">
										<?php foreach ( $data['attachments'] as $key => $att_data ): ?>
											<li class="file_att">
												<a target="_blank" href="<?php echo esc_url( $att_data['url'] ) ?>" class="file fancyimg" title="View Attachment"><?php self::esc_e( $att_data['fileName'] ) ?></a>
											</li>
										<?php endforeach ?>
										</ul>
									<?php endif ?>
								</div>
							<?php endif ?>
						</div>
					</div>
					<div class="panel-footer">
						<?php 
							printf( self::__( '<b>%s</b> of %s' ), $thread, self::esc__( $item['threadCount'] ) ); ?>
					</div>
				</div>
				<?php $thread--; // update thread count ?>
			<?php else: ?>
				<div class="line_item">
					<?php 
						$name = self::esc__( $data['createdBy']['firstName'] ) . ' ' . self::esc__( $data['createdBy']['lastName'] );
						$time = '<time datetime="'.self::esc__( $data['createdAt'] ).'">'.date( get_option('date_format'), strtotime( self::esc__( $data['createdAt'] ) ) ).'</time>';
						$status = sprintf( '<span class="label label-%s">%s</span>', hsd_get_status_label( $data['status'] ), self::esc__( $data['status'] ) );
						printf( self::__( '%s by %s on %s' ), $status, $name, $time ); ?>
				</div>
			<?php endif ?>
		<?php	
		endforeach; ?>
	</section><!-- #hsd_conversation_thread -->

</div><!-- #hsd_support_conversation -->