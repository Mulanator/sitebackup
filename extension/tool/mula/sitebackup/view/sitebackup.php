<?php if (!defined("RAZOR_BASE_PATH")) die("No direct script access to this content"); ?>

<?php
	// include class if not loaded
	include_once(RAZOR_BASE_PATH.'library/php/razor/razor_api.php');
	// include class if not loaded (error handler should always be loaded)	
	include_once(RAZOR_BASE_PATH.'library/php/razor/razor_error_handler.php');

	$api = new RazorAPI();
	$access_level = $api->check_access( 86400 ); // one day
	
	$settings = $this->extension_settings($manifest, $c_data, "tool", "mula", "sitebackup");
	//print_r($settings);
?>

<div class="extension-tool-mula-sitebackup" class="ng-cloak" ng-controller="main"> 
	<?php if(10 == $access_level) : ?>
	<h3>Site Backup</h3>
	<div class="row">
		<div class="col-sm-7">
			<p>Click button to create a full backup of your site: <button ng-click="send()" ng-disabled="isProcessing" type="submit" class="btn btn-success">Create site backup now</button><p>
			<div ng-if="success">
				<p><strong>Backup finished!</strong></p>
				<p>Click on this <strong><a ng-href="{{download.link}}" target="_blank">link</a></strong> to download your site backup file.<p> 
				<p>
				  <small>Remember to delete old backup files from server manually from time to time or new backup files will get large!</small>
				</p> 
			</div>
		</div>
	</div>
	<?php elseif (true == $settings['extension']['noaccessdlg'])  : ?>
		<p class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo $settings['extension']['noaccessmsg']; ?></p>
	<?php endif ?>		
</div>

<script src="<?php echo RAZOR_BASE_URL ?>extension/tool/mula/sitebackup/js/module.js"></script>
