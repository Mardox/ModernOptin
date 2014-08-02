<?php 
/*
Template Name: Modern Optin
*/
?>
<!doctype html>
<html>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php 
		$values= get_post_custom( $post->ID );
		
		$mo_is_mo = isset( $values['mo_is_mo'])? esc_attr($values['mo_is_mo'][0]):'';
		$mo_upload_image = isset( $values['mo_upload_image'])? $values['mo_upload_image'][0]:'';
		$mo_bg_size = isset( $values['mo_bg_size'])? $values['mo_bg_size'][0]:'';
		$mo_Y_position = isset( $values['mo_Y_position'])? $values['mo_Y_position'][0]:'';
		$mo_X_position = isset( $values['mo_X_position'])? $values['mo_X_position'][0]:'';
		$mo_optin_width = isset( $values['mo_optin_width'])? $values['mo_optin_width'][0]:'';
		$mo_optin_height = isset( $values['mo_optin_height'])? $values['mo_optin_height'][0]:'';
		$mo_optin_left = isset( $values['mo_optin_left'])? $values['mo_optin_left'][0]:'';
		$mo_optin_top = isset( $values['mo_optin_top'])? $values['mo_optin_top'][0]:'';
		$mo_popup_text = isset( $values['mo_popup_text'])? $values['mo_popup_text'][0]:'';
		$mo_bg_color_field = isset( $values['mo_bg_color_field'])? $values['mo_bg_color_field'][0]:'';
		$mo_bg_trans = isset( $values['mo_bg_trans'])? $values['mo_bg_trans'][0]:'0.8';


		
	   $hex = str_replace("#", "", $mo_bg_color_field);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	  


		//rgba(104,103,121,0.8);
		?>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<style type="text/css">

		html{
			width:100%;
			font-family: "Open Sans", Helvetica, Arial, sans-serif;
			height:100%;
			background: white url('<?php echo $mo_upload_image; ?>') no-repeat <?php echo $mo_X_position; ?> <?php echo $mo_Y_position; ?>;
			background-size: <?php echo $mo_bg_size; ?>;
		}
		body{
			margin: 0;
		}
		.form {
			margin-top:<?php echo $mo_optin_top; ?>;
			margin-left:<?php echo $mo_optin_left; ?>;
			margin-right: auto;
			background-color: rgba(<?php echo $rgb[0]; ?>,<?php echo $rgb[1]; ?>,<?php echo $rgb[2]; ?>,<?php echo $mo_bg_trans; ?>);   
			width: <?php echo $mo_optin_width; ?>;
			padding:10px;
		    -moz-border-radius: 10px;
		    -webkit-border-radius: 10px;
		    -khtml-border-radius: 10px;
		    border-radius: 10px;
		}
		</style>
	</head>
	<body>
		<?php if (isset($mo_popup_text) && $mo_popup_text != ''){?>
		<script type="text/javascript">


		 	window.onbeforeunload = function(){        
		        var message = "<?php echo $mo_popup_text; ?>",
		        e = e || window.event;
		        // For IE and Firefox
		        if (e) {
		        	e.returnValue = message;
		        }
		        // For Safari
		        return message;
		    }

		    document.onclick=function(){
		        window.onbeforeunload = null;
		        
		    }
		</script>
		<?php } ?>
		<div class="form">
			<div class="post">
				<!-- <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2> -->
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			
			</div>
		</div>
	</body>
	<?php endwhile; endif; ?>
</html>