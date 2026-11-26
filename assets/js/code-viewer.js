(() => {
  document.querySelectorAll('[data-code-tab]').forEach(tab=>tab.addEventListener('click',()=>{
    const id=tab.dataset.codeTab;
    document.querySelectorAll('[data-code-tab]').forEach(item=>{const active=item===tab;item.classList.toggle('selected',active);item.setAttribute('aria-selected',String(active));});
    document.querySelectorAll('[data-code-example]').forEach(example=>{example.hidden=example.dataset.codeExample!==id;});
  }));
  document.querySelectorAll('[data-copy-code]').forEach(button=>button.addEventListener('click',async()=>{
    const code=button.closest('[data-code-example]').querySelector('[data-code-source]');
    try {
      if (navigator.clipboard?.writeText) {
        await navigator.clipboard.writeText(code.textContent);
      } else {
        const selection=window.getSelection();
        const range=document.createRange();
        range.selectNodeContents(code);
        selection.removeAllRanges();
        selection.addRange(range);
        const copied=document.execCommand('copy');
        selection.removeAllRanges();
        if (!copied) throw new Error('Cópia indisponível');
      }
      window.portfolioToast('Código copiado.');
    } catch {
      window.portfolioToast('Não foi possível copiar. Selecione o código para copiar.');
    }
  }));
})();
