<meta charset="UTF-8">
<title><?php _r('title'); ?></title>

<meta name="language" content="Portuguese" />
<meta name="keywords" content="<?php _r('keywords'); ?>" />
<meta name="description" content="<?php _r('description'); ?>" />
<meta name='author' content='<?php _r('autor'); ?>'/>
<meta name='revised' content='<?php _r('revised'); ?>'/>
<meta name='Classification' content='<?php _r('classification'); ?>'/>
<meta name="distribution" content="Global" />
<meta name="Robots" content="INDEX,FOLLOW" />
<meta name="google-site-verification" content="<?php _r('siteVerification'); ?>" />

<meta rel="author" href='<?php _r('autor'); ?>'/>
<meta rel="publisher" href="<?php _r('publisher'); ?>"/>
<meta rel="alternate" type="" title="RSS" href=""/>
<meta rel="Shortcut icon" type="image/ico" href="/img/apple-touch-icon-76x76.png"/>
<meta rel="fluid-icon" type="image/png" href="/img/apple-touch-icon-76x76.png"/>
<link rel="icon" type="img/jpg" href="/img/favicon.ico" />

<meta itemprop='name' content='<?php _r('title'); ?>'/>
<meta itemprop='description' content='<?php _r('description'); ?>'/>
<meta itemprop='image' content='/img/apple-touch-icon-152x152.png'/>

<meta http-equiv="Expires" content="never" />
<meta http-equiv="CACHE-CONTROL" content="PUBLIC" />
<meta http-equiv="PRAGMA" content="NO-CACHE" />

<meta name="application-name" content="<?php _r('title'); ?>">
<meta name="msapplication-TitleColor" content="#91C556">
<meta name="msapplication-square70x70logo" content="/img/apple-touch-icon-76x76.png">
<meta name="msapplication-square150x150logo" content="/img/apple-touch-icon-152x152.png">
<meta name="msapplication-wide310x150logo" content="/img/apple-touch-icon-152x152.png">
<meta name="msapplication-square310x13web0logo" content="/img/apple-touch-icon-152x152.png">

<meta name="twitter:card" value="summary"/>
<meta name="twitter:site" value="<?php _r('site'); ?>"/>
<meta name="twitter:title" value="<?php _r('title'); ?>"/>
<meta name="twitter:description" value="<?php _r('description'); ?>"/>
<meta name="twitter:creator" value="<?php _r('autor'); ?>"/>
<meta name="twitter:image" value="/img/apple-touch-icon-152x152.png"/>
<meta name="twitter:image:src" value="/img/apple-touch-icon-152x152.png"/>

<meta property="og:title" content="<?php _r('title'); ?>"/>
<meta property="og:latitude" content="<?php _r('latitude'); ?>"/>
<meta property="og:longitude" content="<?php _r('longitude'); ?>"/>
<meta property="og:street-address" content="<?php _r('address'); ?>"/>
<meta property="og:locality" content="<?php _r('locality'); ?>"/>
<meta property="og:type" content="<?php _r('classification'); ?>"/>
<meta property="og:url" content="<?php _r('site'); ?>"/>
<meta property="og:image" content="/img/apple-touch-icon-152x152.png"/>
<meta property="og:description" content="<?php _r('description'); ?>"/>
<meta property="og:site_name" content="<?php _r('title'); ?>"/>

<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="yes" content="apple-touch-fullscreen"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telephone=no"/>

<?php foreach($_->assets['fonts'] as $font){ ?>
<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace(" ", "+", $font) ?>' rel='stylesheet' type='text/css'>
<?php } ?>

<?php 
	foreach($_->assets['styles'] as $style){ 
		if(substr($style, 0, 2) == "//"){
			echo "<link rel=\"stylesheet\" href=\"".$style."\">\n";
		}else{
			echo "<link rel=\"stylesheet\" href=\"/".$_->appPath."/assets/styles/".$style.".css\">\n";
		}
	} 
?>