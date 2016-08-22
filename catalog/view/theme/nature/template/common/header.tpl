<?php if (isset($_SERVER['HTTP_USER_AGENT']) && !strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) echo '<?xml version="1.0" encoding="UTF-8"?>'. "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" xml:lang="<?php echo $lang; ?>">
<head>
<?php include "catalog/view/theme/nature/template/common/include_header.tpl"; ?>
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon"  type="image/png" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/nature/stylesheet/stylesheet.css" />
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<div>
<?php } ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/external/jquery.cookie.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/colorbox/colorbox.css" media="screen" />
<script type="text/javascript" src="catalog/view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/nature/stylesheet/ie7.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/nature/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#logo img');
</script>
<![endif]-->
<?php echo $google_analytics; ?>
</head>
<body>

<!-- - - - - - - - - - -  - - - -  -
  - darthvanger@gmail.com, 2016-08-01:
  - Notification about vacation, uncomment when needed :)
  - Covers header with big text, hiding cart and order buttons.
-->
<div class="vacation-notification-background">
    <div class="vacation-background-image vacation-image-sun">
    </div>
</div>

<div class="vacation-notification-text">
    <big class="text">Магазин в отпуске с 03.08.2016 по 27.08.2016</big>
    <p class="vacation-footer">
        <small class="text">Вы можете смотреть каталог и цены, но заказы принимаются только после 27.08.2016</small>
    </p>
</div>

<!-- logo: a flying tree :) -->
<?php if ($logo) { ?>
<div id="logo"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></div>
<?php } ?>


<div id="header">
  <?php echo $language; ?>
  <?php echo $currency; ?>
  <?php echo $cart; ?>

  <!-- darthvanger@gmail.com, 2015-04-19: do we need search? -->
  <!--
  <div id="search">
    <div class="button-search"></div>
    <input type="text" name="search" placeholder="<?php echo $text_search; ?>" value="<?php echo $search; ?>" />
  </div>
  -->
      <div class="links">
        <a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a>
        <a href="/delivery">Доставка</a>
        <a href="/contact">Контакты</a>
      </div>
    </div>
<div id="menu">
	<div class="menu">
		<ul>
			<?php foreach ($categories as $category) { ?>
			<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
			<?php if ($category['children']) { ?>
			<div>
				<?php for ($i = 0; $i < count($category['children']);) { ?>
				<ul>
				<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
				<?php for (; $i < $j; $i++) { ?>
				<?php if (isset($category['children'][$i])) { ?>
				<li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
				<?php } ?>
				<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<?php } ?>
			</li>
			<?php } ?>

            <!-- custom links -->
            <li><a href="<?=$base?>index.php?route=module/blog">Блог</a></li>
            <!-- ------------ -->

		</ul>
	</div>
</div>
<div id="container">
<div id="notification"></div>
<div id="mainsite">
