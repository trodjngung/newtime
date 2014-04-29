<?php
	// foreach ($setting as $key => $value) {
	// 	print_r($key);
	// }
?>
<form id="form-setting" method="post" accept-charset="utf-8" >
<div id="setting-box" class="setting-popup">
	<a href="#" class="close"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/close_pop.png" class="btn-close" title="Close Window" alt="Close" /></a>
  	<div class="setting-new">
  		<?php
  			$url = Yii::app()->request->baseUrl;
  			if(isset($cookies)) {
  				foreach ($setting as $key => $value) {
  						echo "<li class='box'>";
  						if (isset($cookies->$key)) {
  							echo "<div class='done show'></div>";
  							echo "<input type='hidden' value='".$key."' class='image-new' name='setting[".$key."]'>";
  						} else {
			  				echo "<div class='done'></div>";
			  				echo "<input type='hidden' value='".$key."' class='image-new'>";
  						}
			  			echo "<div class='image-check selected'><img src='".$url."/images/logo/".$key.".png'></div>";
			  			echo "<div class='name'>".$key."</div>";
			  			echo "</li>";
  				}
  			} else {
  				foreach ($setting as $key => $value) {
  						echo "<li class='box'>";
  						if ($key == 'vnexpress') {
  							echo "<div class='done show'></div>";
  							echo "<input type='hidden' value='".$key."' class='image-new' name='setting[vnexpress]'>";
  						} else {
			  				echo "<div class='done'></div>";
			  				echo "<input type='hidden' value='".$key."' class='image-new'>";
  						}
			  			echo "<div class='image-check selected'><img src='".$url."/images/logo/".$key.".png'></div>";
			  			echo "</li>";
  				}
  			}
  		?>
  		<!-- <li class="box">
  			<div class="done"></div>
  			<input type="hidden" value="dantri" class="image-new">
  			<div class="image_check"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/dantri.png"></div>
  		</li>
  		<li class="box">
  			<div class="done"></div>
  			<input type="hidden" value="vnexpress" class="image-new">
  			<div class="image_check"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/dantri.png"></div>
  		</li>
  		<li class="box">
  			<div class="done"></div>
  			<input type="hidden" value="kenh14" class="image-new">
  			<div class="image_check"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/dantri.png"></div>
  		</li>
  		<li class="box">
  			<div class="done"></div>
  			<input type="hidden" value="tinhte" class="image-new">
  			<div class="image_check"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/dantri.png"></div>
  		</li>
  		<li class="box">
  			<div class="done"></div>
  			<input type="hidden" value="phapluat" class="image-new">
  			<div class="image_check"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/dantri.png"></div>
  		</li> -->
  	</div>
  	<input type="submit" value="Hoàn Thành" id="submitSetting" >
  	<!-- <a href="javascript:void(0);" id="submitSetting">submit</a> -->
</div>
</form>
<?php
	// $ipc = $_SERVER['REMOTE_ADDR'];
	// echo $ipc;
?>
<!-- Dự báo thời tiết VNEXPRESS-->
<!-- <iframe frameborder="0" marginwidth="0" marginheight="0" src="http://muasamcangay.com/tool/weather/?size=300&fsize=12&bg=images/bg.png&repeat=repeat-x&r=1&w=1&g=1&col=1&d=3" width="300" height="285" scrolling="no"></iframe> -->
<!-- /Dự báo thời tiết VNEXPRESS-->
<div class="content">
	<div class="newbest">
		<div class="header-new">
			<img src="images/earth.png" width="25px">
			<h2>tin thế giới</h2>
		</div>
		<div class="newbest1">
			<div class="new-content"></div>
			<div class="new-content"></div>
		</div>
		<div class="newbest2">
			<div class="new-content"></div>
			<div class="new-content"></div>
		</div>
		<div class="newbest3">
			<div class="new-content"></div>
			<div class="new-content"></div>
		</div>
		<div class="newbest4">
			<div class="new-content"></div>
			<div class="new-content"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="new-all">

	<?php
		$data = Yii::app()->cache;
		// die(var_dump($data['24h']['channel']['item']));
		// $data = $data['dantri']['channel']['item'];
		// die(var_dump($data['vnexpress']));
		if($cookies) {
			foreach ($cookies as $key => $valueSetting) {
				$temp = $data[$key]['channel']['item'];
				foreach ($temp as $value) { ?>
					<div class="new-left">
						<div class="new-content">
							<a href="<?php echo $value['link'] ?>" class="title" target="_blank"><?php echo $value['title'] ?></a>
							<a href="<?php echo $value['link']; ?>" target="_blank"><img class="content" src="<?php echo $value['image']; ?>"></a>
							<span><?php echo $value['content']; ?></span>
						</div>
						<div class="new-content"></div>
					</div>
				<?php }
			}
		} else {
			$temp = $data['vnexpress']['channel']['item'];
			foreach ($temp as $value) { ?>
				<div class="new-left">
					<div class="new-content">
						<a href="<?php echo $value['link'] ?>" class="title" target="_blank"><?php echo $value['title'] ?></a>
						<a href="<?php echo $value['link']; ?>" target="_blank"><img class="content" src="<?php echo $value['image']; ?>"></a>
						<span><?php echo $value['content']; ?></span>
					</div>
					<div class="new-content"></div>
				</div>
			<?php }
		}
	?>

		<!-- <div class="new_left">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
		<div class="new">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
		<div class="new">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
		<div class="new_right">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div> -->
	</div>
	
</div>