<section class="hero-section" id="inicio" tabindex="-1">
  <div class="hero-copy"><p class="eyebrow"><span class="pulse"></span><?= !empty($portfolio['available']) ? 'DISPONÍVEL PARA FREELAS' : 'AGENDA ATUAL' ?></p>
    <p class="hero-greeting">Olá, eu sou</p><h1><?= e($portfolio['professional_name']) ?><span class="hero-period">.</span></h1><p class="hero-role"><?= e($portfolio['role']) ?></p>
    <h2><?= e($portfolio['headline']) ?></h2><p class="hero-description"><?= e($portfolio['description']) ?></p>
    <div class="hero-actions"><a class="button button-primary" href="#contato">Solicitar orçamento <span>↗</span></a><a class="button button-secondary" href="#projetos">Explorar projetos <span>↓</span></a></div>
    <?php $github = external_url($portfolio['github_url']); if ($github !== ''): ?><a class="text-link" href="<?= e($github) ?>" target="_blank" rel="noopener noreferrer">⌘ GitHub <span>↗</span></a><?php endif; ?>
  </div>
  <aside class="overview-panel" aria-label="Resumo profissional demonstrativo">
    <div class="panel-top"><span><i></i><i></i><i></i></span><span>developer-overview.php</span><span>⌘</span></div>
    <div class="overview-body"><div class="profile-row"><?php if ($portfolio['photo'] !== ''): ?><img src="<?= e($portfolio['photo']) ?>" alt="Retrato de <?= e($portfolio['professional_name']) ?>"><?php else: ?><div class="avatar" aria-hidden="true"><?= e(mb_substr($portfolio['professional_name'], 0, 1)) ?></div><?php endif; ?><div><strong><?= e($portfolio['professional_name']) ?></strong><small><?= e($portfolio['role']) ?></small></div><span class="online-dot" title="Disponibilidade configurada"></span></div>
      <div class="overview-block"><div class="overview-label">FOCO DE TRABALHO <span>+</span></div><div class="focus-item"><span>01</span> Sites e experiências web</div><div class="focus-item"><span>02</span> Sistemas sob medida</div><div class="focus-item"><span>03</span> Backend e dados</div></div>
      <div class="overview-block"><div class="overview-label">TECNOLOGIAS CONFIGURADAS <span>⌄</span></div><div class="tag-list"><?php foreach (array_slice($portfolio['technologies'],0,5) as $technology): ?><span class="tech-tag"><?= e($technology['name']) ?></span><?php endforeach; ?></div></div>
      <div class="overview-footer"><span>⌖ <?= e($portfolio['location']) ?></span><span><i></i><?= !empty($portfolio['available']) ? 'Aberto a projetos' : 'Consulte disponibilidade' ?></span></div>
    </div>
    <div class="code-preview"><div class="code-title"><span>exemplo.php</span><span>PHP</span></div><pre aria-label="Exemplo demonstrativo de código PHP"><code><span class="ln">1</span> <span class="syn-purple">&lt;?php</span>
<span class="ln">2</span> <span class="syn-blue">function</span> <span class="syn-yellow">solucao</span>(<span class="syn-blue">string</span> <span class="syn-orange">$objetivo</span>): <span class="syn-blue">array</span>
<span class="ln">3</span> {
<span class="ln">4</span>   <span class="syn-blue">return</span> [
<span class="ln">5</span>     <span class="syn-green">'clareza'</span> =&gt; <span class="syn-green">'sempre'</span>,
<span class="ln">6</span>     <span class="syn-green">'objetivo'</span> =&gt; <span class="syn-orange">$objetivo</span>,
<span class="ln">7</span>   ];
<span class="ln">8</span> }</code></pre></div>
  </aside>
</section>
