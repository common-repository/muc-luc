<?php
// code add muc luc setting admin
function mucluc_options_page() {
	global $mucluc_options;
	ob_start(); ?>
	<div class="wrap">
		<h2 style="background:#0c0;padding:10px;color:#fff;"><b><?php echo __('Muc luc Settings', 'muc-luc'); ?></b></h2>
		<form method="post" action="options.php">
			<?php settings_fields('mucluc_settings_group'); ?>
		   <h4 style="font-size:20px;color:#444"><?php _e('Change display color parameters', 'muc-luc'); ?></h4>
		   <div style="margin-top:20px;background:#fff;padding:10px;border-left:3px solid #0c0">
		       <div style="margin-bottom:20px;"><b style="font-size:18px;"><?php _e('Change theme', 'muc-luc'); ?></b></div>
		       <?php $styles = array('white', 'dark'); ?>
               <select name="mucluc_settings[theme]" id="mucluc_settings[theme]" > 
               <?php foreach($styles as $style) { ?> 
               <?php if($mucluc_options['theme'] == $style) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
               <option value="<?php echo $style; ?>" <?php echo $selected; ?>><?php echo $style; ?></option> 
               <?php } ?> 
               </select>
		   </div>
           <div style="margin-top:20px;background:#fff;padding:10px;border-left:3px solid #0c0">
		       <div style="margin-bottom:20px;"><b style="font-size:18px;"><?php _e('Hide the Muc luc icon displayed on the screen', 'muc-luc'); ?></b></div>
		       <input id="mucluc_settings[enable]" type="checkbox" name="mucluc_settings[enable]" value="1" <?php checked('1', $mucluc_options['enable']); ?> />
               <label class="description" for="mfwp_settings[enable]"><?php _e('Disable', 'muc-luc'); ?></label>
		   </div>
		   <div style="margin-top:20px;background:#fff;padding:10px;border-left:3px solid #0c0">
		        <div style="margin-bottom:20px;"><b style="font-size:18px;"><?php _e('Set a title for the table of contents', 'muc-luc'); ?></b></div>
				<p><label class="description" for="mucluc_settings[title-name]"><?php _e('Title name', 'muc-luc'); ?></label></p>
				<input id="mucluc_settings[title-name]" name="mucluc_settings[title-name]" type="text" value="<?php echo $mucluc_options['title-name']; ?>"/>
			</div>
		   <div class="submit"><input style="background:#0c0;color:#fff;padding: 2px 10px 2px 10px;border:none;font-size:18px;" type="submit" class="button-primary" value="<?php _e('Save settings', 'muc-luc'); ?>" /></div>
		</form>
	</div>
	<?php
	echo ob_get_clean();
}
// add muc luc menu admin
function mucluc_add_options_link() {
	add_options_page('Muc luc Options', 'Muc luc', 'manage_options', 'mucluc-options', 'mucluc_options_page');
}
add_action('admin_menu', 'mucluc_add_options_link');
// add thong tin vao database
function mucluc_register_settings() {
	register_setting('mucluc_settings_group', 'mucluc_settings');
}
add_action('admin_init', 'mucluc_register_settings');