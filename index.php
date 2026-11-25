<?php
declare(strict_types=1);

$portfolio = require __DIR__ . '/config/portfolio.php';
require __DIR__ . '/includes/helpers.php';
?>
<?php require __DIR__ . '/includes/head.php'; ?>
<body>
<?php require __DIR__ . '/includes/header.php'; ?>
<div class="workspace">
  <nav class="activity-rail" aria-label="Acesso rápido"><a class="rail-active" href="#inicio" aria-label="Início">⌂</a><a href="#tecnologias" aria-label="Tecnologias">▦</a><a href="#projetos" aria-label="Projetos">◈</a><a href="#contato" aria-label="Contato">✉</a></nav>
  <?php require __DIR__ . '/includes/sidebar.php'; ?>
  <main id="conteudo">
    <div class="tabbar"><div class="editor-tab active-tab"><span class="file-icon md">M</span><span data-current-file>README.md</span><button type="button" aria-label="Fechar aba" data-tab-close>×</button></div><div class="editor-tab secondary-tab" hidden><span class="file-icon php">⌘</span><span data-secondary-file></span><button type="button" aria-label="Fechar aba" data-secondary-close>×</button></div><div class="editor-tools"><button type="button" data-command-open aria-label="Abrir busca">⌕</button></div></div>
    <div class="breadcrumbs"><a href="#inicio">portfolio</a><span>/</span><span data-breadcrumb>README.md</span></div>
    <div class="page-content">
      <?php include __DIR__ . '/sections/hero.php'; ?>
      <?php include __DIR__ . '/sections/about.php'; ?>
      <?php include __DIR__ . '/sections/skills.php'; ?>
      <?php include __DIR__ . '/sections/services.php'; ?>
      <?php include __DIR__ . '/sections/projects.php'; ?>
      <?php include __DIR__ . '/sections/architecture.php'; ?>
      <?php include __DIR__ . '/sections/code-lab.php'; ?>
      <?php include __DIR__ . '/sections/process.php'; ?>
      <?php include __DIR__ . '/sections/contact.php'; ?>
    </div>
  </main>
</div>
<?php require __DIR__ . '/includes/statusbar.php'; ?>
<dialog class="command-dialog" aria-labelledby="command-title" data-command-dialog>
  <div class="command-box"><div class="command-search"><span>⌕</span><input type="search" placeholder="Buscar seções e ações..." aria-label="Buscar comandos" data-command-input><kbd>ESC</kbd></div><h2 id="command-title" class="sr-only">Paleta de comandos</h2><div class="command-results" role="listbox" data-command-results></div><div class="command-hint">↑↓ navegar <span>↵ selecionar</span><span>ESC fechar</span></div></div>
</dialog>
<div class="toast" role="status" aria-live="polite" data-toast></div>
<script src="assets/js/main.js" defer></script><script src="assets/js/explorer.js" defer></script><script src="assets/js/command-palette.js" defer></script><script src="assets/js/code-viewer.js" defer></script><script src="assets/js/architecture.js" defer></script>
</body></html>
