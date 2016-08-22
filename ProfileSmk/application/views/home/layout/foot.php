        <div class="clearfix">
			<div id="connect">
			</div>
			<p>
				©<?php echo date("Y");?>  SMKN 2 Cimahi. All Rights Reserved.
			</p>
		</div>

		<script>
		var currentUrl  = window.location.href 
		var urlPreg = currentUrl.split("/");
		var currentMenuSelected = null
		if(urlPreg.indexOf("home") == -1){
			currentMenuSelected = 'home'
		}else{
			currentMenuSelected = (urlPreg[urlPreg.indexOf("home") + 1])
			if(currentMenuSelected == 'view_event_home'){
				currentMenuSelected = 'event'
			}
			if(currentMenuSelected == 'view_berita_home'){
				currentMenuSelected = 'event'
			}
		}
		console.log(currentMenuSelected)
		$('#' + currentMenuSelected).addClass('active')
		</script>