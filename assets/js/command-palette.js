(() => {
  const dialog = document.querySelector('[data-command-dialog]');
  const input = document.querySelector('[data-command-input]');
  const results = document.querySelector('[data-command-results]');
  const commands = [
    ['Ir para início','#inicio','home topo começo','⌂'],['Sobre o desenvolvedor','#sobre','sobre biografia perfil readme','M'],['Explorar tecnologias','#tecnologias','stack habilidades frontend backend','▦'],['Ver serviços','#servicos','freelance orçamento desenvolvimento','◫'],['Explorar projetos','#projetos','portfolio repositório demonstração','◈'],['Visualizar arquitetura','#arquitetura','diagramas fluxo sistemas','◇'],['Abrir laboratório de código','#code-lab','php html css javascript sql','⌘'],['Solicitar orçamento','#contato','contato projeto orçamento','↗'],['Abrir GitHub','github','repositório código','⌘'],['Enviar e-mail','email','mensagem contato','✉'],['Contato pelo WhatsApp','whatsapp','mensagem telefone','◉'],['Copiar e-mail','copy','email copiar','▢']
  ].map(([name,target,keywords,icon])=>({name,target,keywords,icon}));
  let visible = [], selected = 0;
  function render() {
    const term=input.value.trim().toLocaleLowerCase('pt-BR');
    visible=commands.filter(item=>(item.name+' '+item.keywords).toLocaleLowerCase('pt-BR').includes(term));
    selected=Math.min(selected,Math.max(0,visible.length-1));
    results.replaceChildren();
    if (!visible.length) { const empty=document.createElement('div');empty.className='command-empty';empty.textContent='Nenhum comando encontrado.';results.append(empty);return; }
    visible.forEach((item,index)=>{
      const button=document.createElement('button');button.className='command-option';button.type='button';button.setAttribute('role','option');button.setAttribute('aria-selected',String(index===selected));
      const icon=document.createElement('span');icon.className='option-icon';icon.textContent=item.icon;
      const title=document.createElement('span');title.textContent=item.name;
      const hint=document.createElement('small');hint.textContent=item.target.startsWith('#')?'NAVEGAR':'CONTATO';
      button.append(icon,title,hint);button.addEventListener('click',()=>run(item));results.append(button);
    });
  }
  function run(item) {
    dialog.close();
    if(item.target.startsWith('#')) { window.location.hash=item.target;return; }
    const emailLink=document.querySelector('.direct-contact a[href^="mailto:"]');
    const links={github:document.querySelector('.text-link[href]')?.href,email:emailLink?.href,whatsapp:document.querySelector('.direct-contact a[href*="wa.me/"]')?.href};
    if(item.target==='copy') {
      const address=emailLink?.textContent.trim();
      if(!address)return window.portfolioToast('Configure um e-mail em config/portfolio.php.');
      navigator.clipboard.writeText(address).then(()=>window.portfolioToast('E-mail copiado.')).catch(()=>window.portfolioToast('Não foi possível copiar o e-mail.'));return;
    }
    if(links[item.target])window.open(links[item.target],'_blank','noopener,noreferrer');else window.portfolioToast('Configure este contato em config/portfolio.php.');
  }
  document.querySelectorAll('[data-command-open]').forEach(button=>button.addEventListener('click',()=>{dialog.showModal();input.value='';render();input.focus();}));
  input.addEventListener('input',render);
  input.addEventListener('keydown',event=>{if(event.key==='ArrowDown'){event.preventDefault();selected=Math.min(selected+1,visible.length-1);render();}if(event.key==='ArrowUp'){event.preventDefault();selected=Math.max(0,selected-1);render();}if(event.key==='Enter'&&visible[selected]){event.preventDefault();run(visible[selected]);}});
  document.addEventListener('keydown',event=>{
    const target=event.target;
    const editing=target instanceof HTMLElement && (target.isContentEditable || ['INPUT','TEXTAREA','SELECT'].includes(target.tagName));
    if(!editing&&(event.ctrlKey||event.metaKey)&&event.key.toLowerCase()==='k'){
      event.preventDefault();
      if(dialog.open)dialog.close();else document.querySelector('[data-command-open]').click();
    }
  });
  dialog.addEventListener('click',event=>{if(event.target===dialog)dialog.close();});
  dialog.addEventListener('close',()=>document.querySelector('[data-command-open]')?.focus());
})();
