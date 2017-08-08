<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="description" content="A geoinformatics consultancy helping values-based organizations with analysis and communication." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.custom.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body>
    <div class="container" id="top">
        <div class="row">
            <div id="banner">
                <div class="col-md-7" id="title">
                    <a href="<?php bloginfo('url'); ?>">
<!--                         <object id="vanIsl" type="image/svg+xml" data="--><?php //bloginfo('template_url'); ?><!--\images\vanisl.svg" width="32" height="44"><img id="vanIsl" src='--><?php //bloginfo('template_url'); ?><!--\images\vanisl.png' /></object>-->
                        <span id="geocology">Geocology</span> <span id="research">research</span>
                    </a>
                    <!-- <a id='beta' href="<?php bloginfo('url'); ?>/beta" title="testing our new site">beta!</a> -->
                </div>
                <div class="col-md-5" id="blurb">
                    <!-- GIS, geodesign and informatics consultancy working with organizations in Vancouver and the coastal region. -->
                    <!-- An environmental and human geography consultancy helping public benefit organizations with analysis and communications. -->
                    A geoinformatics consultancy helping values-based organizations with analysis and communication.
                </div>
            </div>
            <div id="contactNav">
                <div class="col-md-7 contactDetail">
                    <a href="mailto:hugh@geocology.ca">hugh@geocology.ca</a>
                    <span class="contactDetailBullet">&bull;</span>
                    <span id="phoneNumber">604-440-1989</span>
                </div>