# Auditoria técnica e regressão

## Ambiente e estado inicial

- Branch: `feat/terminal-engineer-portfolio`, com commit inicial de auditoria `83f38a5`.
- Estado inicial do checkout: limpo.
- Debian 13, usuário sem root, Chromium 156, Node.js 24, Playwright disponível e Docker funcional.
- PHP não existia no host. A imagem oficial `php:8.4-cli` foi obtida com Docker e executada somente neste ambiente isolado.
- O acesso externo a `https://tech3.lucasluz.me` retornou HTTP 403 do proxy de saída. Não foi possível verificar a instalação publicada.

## Bugs reproduzidos

| ID | Prioridade | Problema e causa raiz | Correção | Evidência e status |
|---|---|---|---|---|
| PHP-01 | P0 | Erro fatal em `config/portfolio.php`: o exemplo PHP era uma string dupla com índices como `$item['preco']`, que o parser da versão PHP 8.4 não aceita dessa forma. A aplicação não renderizava. | O código de exemplo foi convertido para nowdoc PHP, evitando interpolação. | Reproduzido em PHP 8.4 com `php -l`; após corrigir, todos os 16 arquivos PHP passaram no lint. |
| CSS-01 | P1 | A aba virtual secundária declarada com `hidden` aparecia vazia. A regra `.editor-tab { display:flex }` sobrepunha o estilo padrão do atributo HTML. | Regra global `[hidden] { display:none!important }` para manter o estado HTML autoritativo. | Reproduzido em Chromium por captura da primeira dobra e teste de visibilidade. Após a correção a aba inicia oculta e abre/fecha corretamente. |
| CSS-02 | P2 | Em celular, a sidebar recolhida permanecia parcialmente visível, porque a translação negativa não considerava o espaço do trilho lateral. | O deslocamento fechado agora inclui largura da sidebar, trilho e margem. | Reprodução visual em viewport 320 px. Chromium mediu sidebar fechada fora da tela em x=-229, aberta em x=40 e fechada novamente em x=-229. |
| JS-01 | P2 | Busca de projetos assumia que os elementos de pesquisa e de estado vazio existiam. | Acesso opcional aos elementos. | Coberto pela revisão do fluxo e teste integrado na página renderizada. |
| JS-02 | P2 | Pesquisa não ignorava acentos e só procurava no nome armazenado. | Normalização Unicode sem diacríticos e busca no texto do cartão. | Playwright encontrou “Página de apresentação” ao buscar “PÁGINA”. |
| JS-03 | P2 | Ctrl/Cmd+K interceptava o atalho mesmo com foco em campos editáveis. | Atalho ignorado em input, textarea, select e conteúdo editável. | Playwright pressionou Ctrl+K num campo e confirmou a paleta fechada. |
| NAV-01 | P2 | A Command Palette usava `history.replaceState`, substituindo o estado atual sem permitir navegação de volta pela seção escolhida. | Navegação passou a atualizar o fragmento via `location.hash`. | Playwright confirmou `#projetos` após selecionar comando. Não foi completado um ciclo de voltar/avançar do navegador. |
| A11Y-01 | P2 | Seleção de nós do diagrama não era exposta como estado. | `aria-pressed` atualizado junto com a seleção visual. | Playwright confirmou atributo no nó selecionado. |
| CLIP-01 | P2 | Cópia de código dependia somente de Clipboard API. | Fallback por seleção de texto e `document.execCommand('copy')`. | Alteração inspecionada; fallback não foi isolado com API bloqueada. |

## Testes da aplicação real

Servidor PHP embutido iniciado em container PHP 8.4 com os arquivos reais do checkout. Playwright acessou `http://127.0.0.1:8188/` com `page.goto`.

- HTTP 200, título renderizado e nove seções no DOM.
- Os CSS, scripts e favicon responderam sem erros HTTP.
- Sem erros de página ou erros de console nos fluxos executados.
- Sem respostas HTTP 4xx/5xx durante a navegação observada.
- Explorador: expandir/recolher diretório, selecionar arquivo virtual, atualizar breadcrumb e abrir/fechar aba. Aprovado.
- Command Palette: botão, pesquisa, setas, Enter, Ctrl+K e Escape. Aprovado.
- Code Lab: troca para MySQL e cópia de código usando a Clipboard API no Chromium. Aprovado, com toast “Código copiado.” O caminho fallback sem API não foi exercitado.
- Projetos: pesquisa com acentos, estado vazio, filtro PHP, modo lista e detalhes nativos. Aprovado.
- Diagrama: alternância de arquitetura e seleção do nó com estado acessível. Aprovado.
- Formulário: campos com caracteres especiais, resumo contextual, reset. Aprovado. Canais de envio ficaram ocultos porque os contatos de exemplo são vazios.
- Menu mobile: abrir e fechar. Aprovado.
- Sidebar mobile: captura visual inicial e aberta em 320 px. A faixa sobre o conteúdo foi reproduzida, corrigida e recapturada sem a sidebar recolhida visível.
- Larguras testadas na aplicação renderizada: 320, 390, 768, 1024, 1366, 1440, 1920 e 2560 pixels. `scrollWidth` coincidiu com a largura da viewport em todas.
- Capturas full-page foram geradas em `/tmp/audit-{320,390,768,1024,1366,1440,1920,2560}.png` e capturas viewport de mobile em `/tmp/audit-mobile-320.png` e `/tmp/audit-mobile-open-320.png`. As imagens full-page foram inspecionadas para a estrutura completa. Capturas full-page podem mostrar artefatos de composição com elementos sticky; as capturas viewport foram usadas para confirmar o drawer mobile.

## Inspeções estáticas e validação

- `php -l` em todos os arquivos PHP com PHP 8.4. Aprovado depois da correção PHP-01.
- `node --check` nos scripts JavaScript. Aprovado.
- `git diff --check`. Aprovado.
- Busca por `innerHTML`, `eval`, execução de comandos e includes variáveis. Nenhuma ocorrência encontrada nos padrões pesquisados.
- Includes da aplicação usam caminhos locais baseados em `__DIR__`; não há rota dinâmica de arquivo. O explorador é virtual.
- Assets usam nomes e caminhos com capitalização consistente no checkout Linux.
- O domínio publicado não foi comparado, porque a requisição externa recebeu 403 do proxy.

## Limitações e pendências

- Nenhum deploy, push, alteração de VPS ou configuração de Nginx foi feito.
- Nginx/PHP-FPM do servidor real não foram testados. A aplicação usa `index.php` e referências locais, sem endpoints ou rotas amigáveis. A regra de execução PHP restrita a `index.php` e bloqueio dos diretórios internos precisam ser confirmados na configuração Nginx já existente.
- Não foram executados leitor de tela, auditoria WCAG automatizada, teste de zoom 200%, Lighthouse ou matriz de outros navegadores.
- Links reais de e-mail, telefone, WhatsApp, GitHub e LinkedIn não puderam ser testados porque os campos estão vazios.
- O teste de responsividade verifica overflow horizontal e screenshots; não certifica todos os aspectos de interação por toque em aparelhos físicos.
- A cópia sem Clipboard API, ciclo de histórico voltar/avançar, orientação móvel e submissão com contatos configurados permanecem sem teste específico. A paleta foi aberta/fechada oito vezes, arquivos foram selecionados em sequência rápida e o reload reiniciou a aba secundária como esperado.
- Inspeção PHP com PHP 8.4 passou. Compatibilidade com versões PHP anteriores a 8.0 não é objetivo, pois o código usa recursos de PHP 8.
