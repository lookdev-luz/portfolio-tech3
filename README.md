# Terminal Engineer Portfolio

Template de portfólio para desenvolvimento web freelancer. O conteúdo de exemplo está identificado como demonstrativo. Configure seus próprios dados antes de publicar. O projeto usa PHP puro, HTML semântico, CSS, JavaScript vanilla e SVG, sem gerenciador de dependências ou banco de dados.

## Requisitos e execução local

É necessário PHP 8.0 ou superior, com suporte a `json` (incluído nas instalações comuns). Na raiz do projeto, execute:

```sh
php -S 127.0.0.1:8000
```

Abra `http://127.0.0.1:8000`. Para uma verificação rápida de sintaxe, rode `find . -name '*.php' -print0 | xargs -0 -n1 php -l`.

## Estrutura

- `index.php` monta a página e inclui as seções.
- `config/portfolio.php` centraliza identidade, SEO, stack, serviços, projetos, exemplos, diagramas e etapas.
- `includes/` contém cabeçalho, navegação, status e funções de escape HTML.
- `sections/` organiza o conteúdo da página.
- `assets/css/` contém variáveis, estilos do espaço de trabalho, componentes, animações e ajustes responsivos.
- `assets/js/` contém navegação, busca de comandos, explorador e interações dos painéis.
- `assets/icons/` contém o favicon SVG.

## Personalização

Edite `config/portfolio.php`. Substitua `Seu Nome`, cargo, título, descrição, biografia e localização por dados verdadeiros. O texto atual sinaliza que é demonstrativo para evitar declarações de experiência inexistente.

### Contatos

Preencha `email`, `phone`, `whatsapp`, `github_url` e `linkedin`. Deixe campos vazios para ocultar seus links. WhatsApp deve conter código do país e número. Links externos só são exibidos quando usam HTTP ou HTTPS. `photo` aceita caminho de imagem local relativo ao site.

### Tecnologias e serviços

Cada tecnologia configura nome, categoria, descrição, aplicações e serviços relacionados. Ative ou desative serviços alterando `enabled`. Os cartões não atribuem níveis de domínio nem exibem preços.

### Projetos

Adicione itens ao array `projects`, informando nome, categoria, descrição, objetivo, funcionalidades, problema, tecnologias, tipo e caminhos de imagem ou URLs de demonstração e repositório. Apenas URLs HTTP e HTTPS válidas serão apresentadas. Use a classificação demonstrativa, pessoal ou acadêmica conforme corresponda ao projeto real.

### Explorador e paleta de comandos

O explorador de arquivos é uma navegação virtual com âncoras. Para incluir seções, atualize `includes/sidebar.php` e adicione o destino correspondente. A paleta em `assets/js/command-palette.js` possui ações locais predefinidas. Contatos são lidos dos links renderizados e não há execução de comandos do servidor.

### Exemplos de código e arquiteturas

Edite `code_examples` e `architectures` no arquivo de configuração. Exemplos são renderizados como texto escapado e jamais executados. Diagramas são montados a partir de nós textuais configurados.

### Indexação e SEO

Edite o array `seo`. O template inicia com `indexable` falso, que envia `noindex,nofollow`. Configure um endereço canônico HTTPS próprio e revise título e descrição antes de habilitar indexação. `robots.txt` permite rastreamento para que mecanismos encontrem a diretiva meta.

## Publicação em HestiaCP

1. Crie o domínio e a conta de hospedagem PHP no HestiaCP.
2. Envie o conteúdo do projeto para a raiz pública do domínio, normalmente `public_html`.
3. Selecione uma versão PHP compatível e confirme que os arquivos PHP e `assets/` estão acessíveis.
4. Ative HTTPS pelo painel, aguarde a emissão do certificado e confirme o redirecionamento para HTTPS.
5. Revise permissões padrão de leitura e habilite indexação apenas depois de preencher dados reais, URLs e contatos.

Não há banco, compilação, Composer ou NPM. Mantenha `config/portfolio.php` legível pelo PHP e evite armazenar credenciais nesse template.

## Acessibilidade e segurança

A página mantém o conteúdo no HTML renderizado no servidor, inclui controles de teclado, respeita movimento reduzido, escapa os valores PHP e não envia o formulário sem ação explícita. Os dados do formulário permanecem no navegador. Use HTTPS ao publicar.
