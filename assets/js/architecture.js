(() => {
  document.querySelectorAll('[data-architecture]').forEach(tab=>tab.addEventListener('click',()=>{
    const id=tab.dataset.architecture;
    document.querySelectorAll('[data-architecture]').forEach(item=>{const active=item===tab;item.classList.toggle('selected',active);item.setAttribute('aria-selected',String(active));});
    document.querySelectorAll('[data-architecture-view]').forEach(view=>{view.hidden=view.dataset.architectureView!==id;});
  }));
  document.querySelectorAll('[data-architecture-view]').forEach(view=>{
    const nodes=JSON.parse(view.querySelector('[data-architecture-data]').textContent);
    view.querySelectorAll('[data-node]').forEach(button=>button.addEventListener('click',()=>{
      const node=nodes[Number(button.dataset.node.split('-').pop())];
      view.querySelectorAll('[data-node]').forEach(item=>item.classList.toggle('selected',item===button));
      view.querySelector('[data-node-info] strong').textContent=node.name;
      view.querySelector('[data-node-info] p').textContent=node.responsibility+' '+node.benefit;
    }));
  });
})();
