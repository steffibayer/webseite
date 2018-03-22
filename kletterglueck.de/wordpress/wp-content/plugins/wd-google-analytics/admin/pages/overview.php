
<?php
	wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); 
	 wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); 
$new_buttons_refresh = '<button data-hint="Click to refresh this report block." class="handlediv load_tooltip button-link  gawd-refresh" type="button" id="{{refreshid}}">' . gawd_icons( 'dashicons-update' ) . '</button>';
$new_buttons_full = '<button data-hint="Click to navigate to Real Time report on your Reports page." class="handlediv load_tooltip button-link gawd-more" type="button" id="{{moreid}}">' . gawd_icons( 'dashicons-migrate' ) . '</button>';
	
  function gawd_icons($dashicons) {

		return '<img src="' . GAWD_URL . '/assets/' . $dashicons . '.png"/>';
	}
?>

<?php screen_icon('options-general'); ?>
  <div class="wd-upgrade-pro-main-wrap">
    <span class="wd-text">This section lets you check the audience overview of your website.
      <a style="color: #5CAEBD; text-decoration: none;border-bottom: 1px dotted;" target="_blank" href="https://web-dorado.com/wordpress-google-analytics/quick-start/overview.html">Read more in User Guide.</a>
    </span>
    <div class="wd-ugrade-pro-wrap">
      <a class="gawd_support_link" href="https://wordpress.org/support/plugin/wd-google-analytics" target="_blank">
        <img src="<?php echo GAWD_URL; ?>/assets/i_support.png" >
        <?php _e("Support Forum", "gmwd"); ?>
      </a>
      <a class="gawd_update_pro_link" href="https://web-dorado.com/files/fromGoogleAnalyticsWD.php" target="_blank">
        <?php _e("Upgrade to paid version", "gawd"); ?>
      </a>
    </div>
  </div>
	<h2 style="margin-top:10px" class="gawd_page_titles"><?php echo get_admin_page_title(); ?></h2>
  <div class="gawd_wrap">
    <div class="gawd_row" style="float:left;width:35%; margin-bottom:0">
      <div class="gawd_text" style="width: 20%;padding: 9px 12px 9px 14px;">
          DATE RANGE
      </div>
      <div class="gawd_content load_tooltip" style="width: 42%;height: 22px;line-height: 22px;" id="gawd_content_range" data-hint="Choose a date range to display Google Analytics report. Select a predefined or custom period and click Apply.">
        <div id="reportrange" class="pull-right" style="float:none !important">
          <span></span> <b class="caret"></b>
        </div>
        <input type="hidden" id="gawd_start_end_date_compact"/>
      </div>
      <div class='clear'></div>
    </div>
    <div class="gawd_profiles" id="gawd_profile_wrapper" style="float:right;width: 63%; margin:0">
      <form  method="post" id="gawd_overview">
        <select data-hint="Click to pick the website, overview reports of which you’d like to display." style="width: 41%;" class="gawd_profile_select load_tooltip" name="gawd_id" onchange="change_account(this)">
          <?php foreach ($profiles as $property_name => $property): ?>
          <optgroup label="<?php echo $property_name; ?>">
            <?php foreach ($property as $profile):
              $webPropertyId = $profile['webPropertyId'];
              $id = $profile['id']; 
              $name = $profile['name'];
              $selected = '';
              if($id == $gawd_user_data['gawd_id']){
                $selected = 'selected="selected"';
              }
            ?>
              <option value="<?php echo $id; ?>" <?php echo $selected; ?>><?php echo $property_name.' - '.$name ; ?></option>
            <?php endforeach ?>
          </optgroup>
          <?php endforeach ?>
        </select>
        <div class="clear"></div>
        <input type="hidden" name='web_property_name' id='web_property_name'/>
      </form>
    </div>
    <div class="clear"></div>
	<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
	<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
	<div class="metabox-holder" >
		<div class="postbox-container gawd_normal_metabox_conteiner" >
        <?php do_meta_boxes( 'gawd_analytics', 'normal', '' ); ?>
		</div>		
    <div class="postbox-container gawd_side_metabox_conteiner" >
        <?php do_meta_boxes( 'gawd_analytics', 'side', '' ); ?>
		</div>
	</div>
</div>

<script>
function change_account(that){
  jQuery('#web_property_name').val(jQuery(that).find(':selected').closest('optgroup').attr('label'));
  jQuery('#gawd_overview').submit();
}
    var buttons_refresh = '<?php echo $new_buttons_refresh; ?>';
    var buttons_full = '<?php echo $new_buttons_full; ?>';
    datepicker_js_compact();

</script>

 