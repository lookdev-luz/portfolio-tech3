(() => {
  document.querySelectorAll('[data-code-tab]').forEach(tab=>tab.addEventListener('click',()=>{
    const id=tab.dataset.codeTab;
    document.querySelectorAll('[data-code-tab]').forEach(item=>{const active=item===tab;item.classList.toggle('selected',active);item.setAttribute('aria-selected',String(active));});
    document.querySelectorAll('[data-code-example]').forEach(example=>{example.hidden=example.dataset.codeExample!==id;});
  }));
  document.querySelectorAll('[data-copy-code]').forEach(button=>button.addEventListener('click',async()=>{
    try{await navigator.clipboard.writeText(button.closest('[data-code-example]').querySelector('[data-code-source]').textContent);window.portfolioToast('Código copiado.');}
    catch{window.portfolioToast('Não foi possível copiar. Selecione o código para copiar.');}
  }));
})();
