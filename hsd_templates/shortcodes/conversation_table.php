<table id="hsd_support_table" class="table table-hover">
	<thead>
		<tr>
			<th><?php self::_e('Status') ?></th>
			<th><span class="cloak"><?php self::_e('Thread') ?></span></th>
			<th><?php self::_e('Tag') ?></th>
			<th><?php self::_e('Subject') ?></th>
			<th><?php self::_e('Preview') ?></th>
			<th><?php self::_e('Date') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if ( !empty( $conversations ) ): ?>
			<?php foreach ( $conversations as $key => $data ): ?>
				<?php
					// match up labels with bootstrap
					switch ( $data['status'] ) {
						case 'active':
							$label = 'primary';
							break;
						case 'closed':
							$label = 'success';
							break;
						case 'pending':
							$label = 'warning';
							break;
						default:
							$label = 'default';
							break;
					} ?>
				<tr>
					<td>
						<span class="label label-<?php echo $label ?>"><?php self::esc_e( $data['status'] ) ?></span>
					</td>
					<td>
						<span class="badge"><?php self::esc_e( $data['threadCount'] ) ?></span>
					</td>
					<td>
						<span class="label label-default"><?php self::esc_e( $data['tags'][0] ) ?></span>
					</td>
					<td>
						<a href="<?php echo add_query_arg( array( 'conversation_id' => self::esc__( $data['id'] ) ), get_permalink( $post_id ) ) ?>"><?php self::esc_e( substr($data['subject'], 0, 60) ) ?></a>
					</td>
					<td>
						<span class="conversation_preview"><?php self::esc_e( $data['preview'] ) ?></span>
					</td>
					<td>
						<time datetime="<?php self::esc_e( $data['createdAt'] ) ?>"><?php echo date( get_option('date_format'), strtotime( self::esc__( $data['createdAt'] ) ) ) ?></time>
					</td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
			<tr><td colspan="5" rowspan="3"><?php self::_e("No support requests found.") ?></td></tr>
		<?php endif ?>


	</tbody>
</table>


