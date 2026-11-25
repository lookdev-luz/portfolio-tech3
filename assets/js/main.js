(() => {
  const toast = document.querySelector('[data-toast]');
  let timer;
  window.portfolioToast = (message) => {
    toast.textContent = message;
    toast.classList.add('visible');
    clearTimeout(timer);
    timer = setTimeout(() => toast.classList.remove('visible'), 2500);
  };
  const techData = document.querySelector('[data-tech-data]');
  if (techData) {
    const techs = JSON.parse(techData.textContent);
    const fields = {name:'[data-tech-name]',category:'[data-tech-category]',description:'[data-tech-description]',uses:'[data-tech-uses]',services:'[data-tech-services]'};
    document.querySelectorAll('[data-tech-index]').forEach(button => button.addEventListener('click', () => {
      document.querySelectorAll('[data-tech-index]').forEach(item => item.classList.toggle('selected', item === button));
      Object.entries(fields).forEach(([key, selector]) => { document.querySelector(selector).textContent = techs[Number(button.dataset.techIndex)][key]; });
    }));
  }
  const search = document.querySelector('[data-project-search]');
  const cards = [...document.querySelectorAll('[data-project]')];
  const grid = document.querySelector('[data-project-grid]');
  let filter = 'todos';
  function updateProjects() {
    const term = search.value.trim().toLocaleLowerCase('pt-BR');
    let count = 0;
    cards.forEach(card => {
      const show = card.dataset.name.includes(term) && (filter === 'todos' || card.dataset.category.split(' ').includes(filter));
      card.hidden = !show;
      if (show) count++;
    });
    document.querySelector('[data-project-empty]').hidden = count > 0;
  }
  search?.addEventListener('input', updateProjects);
  document.querySelectorAll('[data-filter]').forEach(button => button.addEventListener('click', () => {
    filter = button.dataset.filter;
    document.querySelectorAll('[data-filter]').forEach(item => item.classList.toggle('active', item === button));
    updateProjects();
  }));
  document.querySelectorAll('[data-project-view]').forEach(button => button.addEventListener('click', () => {
    grid.classList.toggle('list-view', button.dataset.projectView === 'list');
    document.querySelectorAll('[data-project-view]').forEach(item => item.classList.toggle('active', item === button));
  }));
  const process = document.querySelector('[data-process-data]');
  if (process) {
    const steps = JSON.parse(process.textContent);
    document.querySelectorAll('[data-process-step]').forEach(button => button.addEventListener('click', () => {
      document.querySelectorAll('[data-process-step]').forEach(item => item.classList.toggle('selected', item === button));
      document.querySelector('[data-process-detail]').textContent = steps[Number(button.dataset.processStep)].description;
    }));
  }
  const form = document.querySelector('[data-request-form]');
  form?.addEventListener('submit', event => {
    event.preventDefault();
    if (!form.reportValidity()) return;
    const values = new FormData(form);
    const summary = ['# Solicitação de projeto','','Nome: '+values.get('name'),'Tipo: '+values.get('type'),'Objetivo: '+values.get('objective'),'Descrição: '+values.get('description'),values.get('deadline')?'Prazo desejado: '+values.get('deadline'):''].filter(Boolean).join('\n');
    document.querySelector('[data-summary-text]').textContent = summary;
    const panel = document.querySelector('[data-contact-summary]');
    panel.hidden = false;
    const wa = document.querySelector('[data-summary-whatsapp]');
    const email = document.querySelector('[data-summary-email]');
    const digits = form.dataset.whatsapp;
    const address = form.dataset.email;
    wa.hidden = !digits;
    if (digits) wa.href = 'https://wa.me/'+digits+'?text='+encodeURIComponent(summary);
    email.hidden = !address;
    if (address) email.href = 'mailto:'+encodeURIComponent(address)+'?subject='+encodeURIComponent('Solicitação de projeto')+'&body='+encodeURIComponent(summary);
    panel.scrollIntoView({behavior:matchMedia('(prefers-reduced-motion: reduce)').matches?'auto':'smooth',block:'nearest'});
    window.portfolioToast('Resumo preparado. Escolha como deseja enviá-lo.');
  });
  document.querySelector('[data-summary-copy]')?.addEventListener('click', async () => {
    try { await navigator.clipboard.writeText(document.querySelector('[data-summary-text]').textContent); window.portfolioToast('Solicitação copiada.'); }
    catch { window.portfolioToast('Não foi possível copiar. Selecione e copie o resumo.'); }
  });
  document.querySelector('[data-form-clear]')?.addEventListener('click', () => { form.reset(); document.querySelector('[data-contact-summary]').hidden = true; window.portfolioToast('Campos limpos.'); });
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(entries => entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('revealed');
      document.querySelectorAll('.tree-link').forEach(link => link.classList.toggle('active', link.hash === '#'+entry.target.id));
    }), {rootMargin:'-25% 0px -60% 0px'});
    document.querySelectorAll('main section[id]').forEach(section => observer.observe(section));
  }
})();
