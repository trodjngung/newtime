<html>
	<head>
		<title>new time</title>
		<meta charset="UTF-8" >
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				// When clicking on the button close or the mask layer the popup closed
				$('a.close, #mask').live('click', function() { 
				  $('#mask , .setting-popup').fadeOut(300 , function() {
					$('#mask').remove();  
				}); 
				return false;
				});

				//click checkbox
				$('.box').click(function() {
					$(this).find('.done').each(function() {
						var input = $(this).next();
						var inputValue = $(input).attr("value");
						if($(this).hasClass('show')){
							$(this).removeClass('show');
							input.removeAttr("name");
						} else {
							$(this).addClass('show');
							input.attr("name", "setting["+inputValue+"]");
						}
					});
				});
				
				if(!document.cookie) {
					clickSetting();
				}

			}); //end
			function open_popup(){
				window.open("http://www.facebook.com/share.php?u=http://rembachduong.vn");
			}
			//function click setting			
			function clickSetting(){ 
				var loginBox = $('a.setting-window').attr('href');
				//Fade in the Popup and add close button
				$(loginBox).fadeIn(300);
				//Set the center alignment padding + border
				var popMargTop = ($(loginBox).height() + 24) / 2; 
				var popMargLeft = ($(loginBox).width() + 24) / 2; 
				$(loginBox).css({ 
					'margin-top' : -popMargTop,
					'margin-left' : -popMargLeft
				});
				// Add the mask to body
				$('body').append('<div id="mask"></div>');
				$('#mask').fadeIn(300);
				
				return false;
			}
		</script>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /> -->
	</head>
	<body>
		<div class="header-bd">
			<div class="header">
				<div class="logo">
					<!-- <img height="70%" class="res" alt="Clear và Float" src="http://www.izwebz.com/wp-content/uploads/2009/08/xcss_series.jpg.pagespeed.ic.xUOM-YjJiV.jpg"> -->
				</div>
				<div class="setting">
					<a id="btnSetting" href="#setting-box" class="setting-window" onclick="clickSetting()"></a>
				</div>
			</div>
		</div>

		<!-- content -->
		<?php echo $content; ?>
		<div class="clear"></div>
		<div id="tool-right">
			<ul>
				<li class="setting-right">
					<a href="#setting-box" onclick="clickSetting()"></a>
				</li>
				<li class="facebook">
					<!-- <a href="#" onclick="clickSetting()"></a> -->
					<a href="#" onclick="open_popup()"></a>
				</li>
				<li class="twitter">
					<a href="#" onclick="clickSetting()"></a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<h2>Trodjngung</h2>
		</div>
	</body>
	<script type="text/javascript">
		
	</script>
</html>