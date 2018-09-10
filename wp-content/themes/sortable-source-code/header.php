<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo get_the_title(); ?>">
<meta name="author" content="<?php echo get_option( 'admin_email'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

<!-- wp head -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>

<div class="container">

    <h1>Sortable</h1>

</div><!-- end header container -->
</header><!-- End Header -->