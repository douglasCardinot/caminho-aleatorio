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

<script async type="text/javascript" src="//sawpf.com/1.0.js"></script>

<?php if($_->analytics != ""){ ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php _r("analytics"); ?>', '<?php echo str_replace("www.", "", $_->site); ?>');
  ga('send', 'pageview');

</script>
<?php } ?>