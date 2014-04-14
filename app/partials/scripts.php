<script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.1.1/js/vendor/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/app/assets/scripts/lib/jquery.1.11.0.min.js"><\/script>');</script>
<?php 
	foreach($_->assets['scripts'] as $script){ 
		$name = $script['name'];
		$async = $script['async'];
		if(substr($name, 0, 2) == "//"){
			echo "<script "; if($async == true) echo "async"; echo " src=\"".$name."\"></script>\n";
		}else{
			echo "<script "; if($async == true) echo "async"; echo " src=\"/".$_->appPath."/assets/scripts/".$name.".js\"></script>\n";
		}
	} 
?>