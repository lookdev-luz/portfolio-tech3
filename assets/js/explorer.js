(() => {
  const sidebar = document.querySelector('.sidebar');
  const menu = document.querySelector('.mobile-menu-button');
  const close = document.querySelector('[data-sidebar-close]');
  const setMenu = open => { sidebar.classList.toggle('mobile-open', open); menu.setAttribute('aria-expanded', String(open)); };
  menu?.addEventListener('click', () => setMenu(!sidebar.classList.contains('mobile-open')));
  close?.addEventListener('click', () => setMenu(false));
  document.querySelectorAll('.tree-link').forEach(link => link.addEventListener('click', () => {
    const file = link.dataset.file;
    document.querySelector('[data-current-file]').textContent = file;
    document.querySelector('[data-breadcrumb]').textContent = file;
    document.querySelector('.secondary-tab').hidden = false;
    document.querySelector('[data-secondary-file]').textContent = file;
    setMenu(false);
  }));
  document.querySelector('[data-tab-close]')?.addEventListener('click', event => { event.currentTarget.closest('.editor-tab').hidden = true; });
  document.querySelector('[data-secondary-close]')?.addEventListener('click', () => { document.querySelector('.secondary-tab').hidden = true; });
  document.addEventListener('keydown', event => { if (event.key === 'Escape') setMenu(false); });
})();
