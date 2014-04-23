<?php
	// foreach ($setting as $key => $value) {
	// 	print_r($key);
	// }
?>
<form id="form-setting" method="post" accept-charset="utf-8" >
<div id="setting-box" class="setting-popup">
	<a href="#" class="close"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
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
			  			echo "<div class='image_check selected'><img src='".$url."/images/logo/".$key.".png'></div>";
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
			  			echo "<div class='image_check selected'><img src='".$url."/images/logo/".$key.".png'></div>";
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

<div class="content">
	<!-- <div class="newbest">
		<div class="newbest1">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
		<div class="newbest2">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
		<div class="newbest3">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
		<div class="newbest4">
			<div class="new_content"></div>
			<div class="new_content"></div>
		</div>
	</div> -->
	<div class="new_all">
		
	<?php
		$data = Yii::app()->cache;
		// die(var_dump($data['24h']['channel']['item']));
		// $data = $data['dantri']['channel']['item'];
		// die(var_dump($data['vnexpress']));
		if($cookies) {
			foreach ($cookies as $key => $valueSetting) {
				$temp = $data[$key]['channel']['item'];
				foreach ($temp as $value) { ?>
					<div class="new_left">
						<div class="new_content">
							<a href="<?php echo $value['link']; ?>" target="_blank"><img class="content" src="<?php echo $value['image']; ?>"></a>
							<span><?php echo $value['content']; ?></span>
						</div>
						<div class="new_content"></div>
					</div>
				<?php }
			}
		} else {
			$temp = $data['vnexpress']['channel']['item'];
			foreach ($temp as $value) { ?>
				<div class="new_left">
					<div class="new_content">
						<a href="<?php echo $value['link']; ?>" target="_blank"><img class="content" src="<?php echo $value['image']; ?>"></a>
						<span><?php echo $value['content']; ?></span>
					</div>
					<div class="new_content"></div>
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