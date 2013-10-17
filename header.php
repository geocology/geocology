<!DOCTYPE html>
<!-- Hi Sherwin. I started using Columnal but the veiwport resizing was interacting weirdly with the featured image resizing, so I gave up on it and it's just a variant on 960gs fixed. But a responsive version may eventually happen. -->
<head>
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="description" content="A geoinformatics consultancy helping values-based organizations with analysis and communication." />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vgs.css" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<script src="<?php bloginfo('template_url'); ?>/scripts/softscroll.js" type="text/javascript"></script>
	<script type='text/javascript'>
		SoftScroll.showHash();
		SoftScroll.noXScroll();
	</script>
	<script type="text/javascript"><!-- google analytics -->

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-30580360-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>
<body>
	<div class="container_12" id="top">
        <div id="banner">
            <div class="grid_7" id="title">
                <a href="<?php bloginfo('url'); ?>">
					<!-- <object id="vanIsl" type="image/svg+xml" data="<?php bloginfo('template_url'); ?>\images\vanisl.svg" width="32" height="44"><img id="vanIsl" src='<?php bloginfo('template_url'); ?>\images\vanisl.png' /></object>-->
					<span id="geocology">Geocology</span> <span id="research">research</span>
                </a>
				<!-- <a id='beta' href="<?php bloginfo('url'); ?>/beta" title="testing our new site">beta!</a> -->
            </div>
            <div class="grid_5 last" id="blurb">
                <!-- GIS, geodesign and informatics consultancy working with organizations in Vancouver and the coastal region. -->
                <!-- An environmental and human geography consultancy helping public benefit organizations with analysis and communications. -->
                A geoinformatics consultancy helping values-based organizations with analysis and communication.
            </div>
        </div>
        <div id="contactNav">
            <div class="grid_7 contactDetail">
                <a href="mailto:hugh@geocology.ca">hugh@geocology.ca</a>
                <span class="contactDetailBullet">&bull;</span>
                <span id="phoneNumber">604-440-1989</span>
                <span class="contactDetailBullet">&bull;</span>
                <!-- <a href="http://twitter.com/geocology">@geocology</a> -->
                <a href="http://maps.google.com/maps?q=211+East+Georgia+Street,+Vancouver,+BC,+Canada&hl=en&ll=49.278576,-123.099434&spn=0.001904,0.009645&sll=49.278649,-123.099372&layer=c&cbp=11,347.66,,0,7.21&cbll=49.278576,-123.099434&hnear=211+E+Georgia+St,+Vancouver,+Greater+Vancouver+Regional+District,+British+Columbia+V6A+1Z7,+Canada&t=m&z=17&panoid=1T3bgakrFvhAwdCdpRpr8Q">105-211 E Georgia St Vancouver BC V6A1Z6</a>
            </div>