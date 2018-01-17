<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
    <?php wp_head(); ?>

		
    <meta name="viewport" content="width=device-width">
</head>
<body <?php body_class(); ?>>
        
        
<script>
	var  global_page_id = <?php global $post;echo $post->ID; ?>;
</script>


        
     	
       
