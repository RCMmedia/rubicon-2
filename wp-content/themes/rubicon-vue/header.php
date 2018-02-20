<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
    
		<!-- web app shizzy -->
		<link rel="manifest" href="<?php bloginfo('url') ?>/manifest.json">

		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="application-name" content="Rubicon">
		<meta name="apple-mobile-web-app-title" content="Rubicon">
		<meta name="theme-color" content="#b7202b">
		<meta name="msapplication-navbutton-color" content="#b7202b">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="msapplication-starturl" content="/">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="icon" type="png" sizes="192x192" href="<?php bloginfo('url') ?>/dapperman.png">
		<link rel="apple-touch-icon" type="png" sizes="192x192" href="<?php bloginfo('url') ?>/dapperman.png">
    
    <?php wp_head(); ?>

		
    <meta name="viewport" content="width=device-width">
</head>
<body <?php body_class(); ?>>
        
        
<script>
	var  global_page_id = <?php global $post;echo $post->ID; ?>;
</script>
<script>
	var  root_site_path = "<?php echo $_SERVER['REQUEST_URI'] ?>";
</script>


        
     	
       
