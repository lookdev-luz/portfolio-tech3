<header class="topbar">
  <a class="brand" href="#inicio" aria-label="Ir para o início"><span class="brand-mark">&lt;/&gt;</span><span><?= e($portfolio['professional_name']) ?><small>portfolio</small></span></a>
  <div class="topbar-actions">
    <span class="top-status"><i></i> <?= !empty($portfolio['available']) ? 'Disponível para projetos' : 'Agenda fechada' ?></span>
    <button class="command-trigger" type="button" data-command-open aria-haspopup="dialog"><span>⌕</span> Buscar no portfólio <kbd>Ctrl K</kbd></button>
    <button class="mobile-menu-button" type="button" aria-expanded="false" aria-controls="explorer">Menu</button>
  </div>
</header>
