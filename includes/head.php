<?php
$seo = $portfolio['seo'];
$robots = !empty($seo['indexable']) ? 'index,follow' : 'noindex,nofollow';
$canonical = external_url($seo['canonical'] ?? '');
?>
<!doctype html>
<html lang="pt-BR" data-theme="dark" data-resolved-theme="dark" data-portfolio-model="3">
<head><script src="assets/js/theme-control.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="<?= e($robots) ?>">
  <meta name="description" content="<?= e($seo['description']) ?>">
  <meta name="theme-color" content="#080d0a">
  <title><?= e($seo['title']) ?></title>
  <?php if ($canonical !== ''): ?><link rel="canonical" href="<?= e($canonical) ?>"><?php endif; ?>
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= e($seo['title']) ?>">
  <meta property="og:description" content="<?= e($seo['description']) ?>">
  <meta property="og:locale" content="pt_BR">
  <link rel="icon" href="assets/icons/favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="assets/css/variables.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/workspace.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="assets/css/animations.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <script type="application/ld+json"><?= json_encode(['@context'=>'https://schema.org','@type'=>'Person','name'=>$portfolio['full_name'],'jobTitle'=>$portfolio['role'],'description'=>$portfolio['description'],'address'=>['@type'=>'PostalAddress','addressCountry'=>'BR'],'url'=>$canonical ?: null], JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?></script>
<link rel="stylesheet" href="assets/css/theme-control.css">
</head>
