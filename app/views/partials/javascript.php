<!-- NADA POR AHORA -->
<script type="text/javascript" src="<?=asset_url() ?>js/app.js"></script>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) { 
	  	App.init('<?=$api_url ?>', '<?=get_api_key() ?>');
	});	
</script>