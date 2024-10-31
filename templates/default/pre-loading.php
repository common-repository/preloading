<?php require_once( 'header.php' ); ?>

	<div id="tbpl-container">
	
		<!-- === Title === -->
		
		<h1 id="tbpl-title"><?php echo esc_html( $this->settings['title'] ); ?></h1>
		
		<?php if ( $this->opt_in_rejected ):	?>	
		
			<!-- === Text when a user reject the opt-in === -->
			
			<div id="tbpl-reject">
				<?php echo esc_html( $this->settings['opt_in_reject_text'] ); ?>
			</div>
		
		<?php elseif( $this->minor ): ?>
		
			<!-- === Text when a user isn't of the required minimum age  === -->
			
			<div id="tbpl-reject">
				<?php echo esc_html( $this->settings['reject_text'] ); ?>
			</div>
			
		<?php else: ?>	
		
			<!-- === Text === -->
			
			<div id="tbpl-text">
				<?php echo $this->settings['text']; ?>
			</div>

			<?php if( ! empty( $this->settings['youtube_id'] ) ) : ?> 
			
			<!-- === YouTube Video === -->
			
			<div id="tbpl-video">
				<iframe id="player" type="text/html" width="<?php echo esc_attr( $this->settings['video_width'] ); ?>" height="<?php echo esc_attr( $this->settings['video_height'] ); ?>" src="http://www.youtube.com/embed/<?php echo esc_attr( $this->settings['youtube_id'] ); ?>?enablejsapi=1&rel=0&iv_load_policy=3&showinfo=0&controls=0&autohide=2&autoplay=<?php echo esc_attr( $this->settings['video_autoplay'] ); ?>" allowfullscreen frameborder="0"></iframe>
			</div>
			
			<?php endif; ?>
			
			<?php if( $this->settings['enable_age_confirmation'] || $this->settings['enable_opt_in'] ): ?>
			
				<form method="POST">
				
					<?php wp_nonce_field( PRE_LOADING_FORM_NONCE, 'tbpl-nonce' ); ?>
					
					<?php if( $this->settings['enable_age_confirmation'] ): ?>
					
					<!-- === Age Verification Form === -->
					
						<fieldset id="tbpl-birthday-fieldset">
							<legend align="center"><?php esc_html_e( 'Enter your Age', 'pre-loading-domain' ); ?></legend>
							<label for="tbpl-month" class="tbpl-confirmation" ><?php esc_html_e( 'Month', 'pre-loading-domain' ); ?></label><input type="number" id="tbpl-month" name="tbpl-month" min="1" max="12" size="2" maxlength="2" value="<?php echo esc_attr( date('m') );?>" placeholder="mm" required="required" />
							<label for="tbpl-day" class="tbpl-confirmation" ><?php esc_html_e( 'Day', 'pre-loading-domain' ); ?></label><input type="number" id="tbpl-day" name="tbpl-day" min="1" max="31" size="2" maxlength="2" value="<?php echo esc_attr( date('d') );?>" placeholder="dd" required="required" />
							<label for="tbpl-year" class="tbpl-confirmation" ><?php esc_html_e( 'Year', 'pre-loading-domain' ); ?></label><input type="number" id="tbpl-year" name="tbpl-year" min="1" max="9999" size="4" maxlength="4" value="<?php echo esc_attr( date('Y') );?>" placeholder="yyyy" required="required" />
						</fieldset>

					<?php endif; ?>
					
					<?php if( $this->settings['enable_opt_in'] ): ?>
					
						<!-- === Opt-In === -->
						
						<span id="tbpl-opt-in">
							<input type="checkbox" id="opt-in-checkbox" name="opt-in-checkbox" value="1" /><label for="opt-in-checkbox"><?php echo esc_html( $this->settings['opt_in_text'] ); ?></label>
						</span>
						
					<?php endif; ?>
				
					<input type="submit" id="tbpl-continue" value="<?php echo esc_attr( $this->settings['continue_button_text'] ); ?>" />
				
				</form>
				
			<?php else: ?>	
			
			<!-- === Continue Button === -->
			
			<a id="tbpl-continue" href="<?php echo esc_url( $this->current_url ); ?>" ><?php echo esc_html( $this->settings['continue_button_text'] ); ?></a>
			
			<?php endif; ?>
				
		<?php endif; ?>
		
	</div> <!-- === END #tbpl-container === -->

<?php require_once( 'footer.php' ); ?>