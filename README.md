# Terminal Engineer Portfolio

Portfólio freelancer demonstrativo, escrito em PHP puro, HTML semântico, CSS, JavaScript vanilla e SVG. Não usa Node, NPM, Composer, banco de dados ou etapas de compilação. Personalize os dados e substitua os exemplos antes de apresentar o site como seu trabalho.

## Requisitos

- PHP 8.0 ou superior, com extensão JSON habilitada.
- Hospedagem web com PHP, como a configuração Nginx/Apache gerenciada pelo HestiaCP.
- HTTPS habilitado no domínio antes de compartilhar formulários de contato.

O servidor embutido do PHP serve apenas para desenvolvimento, não para produção.

## Executar localmente

Clone o projeto e inicie o servidor de desenvolvimento:

```sh
git clone https://github.com/SEU-USUARIO/portfolio-terminal-engineer.git
cd portfolio-terminal-engineer
php -S 127.0.0.1:8000
```

Abra `http://127.0.0.1:8000`. Verifique a sintaxe PHP com `find . -name '*.php' -print0 | xargs -0 -n1 php -l`. Verifique JavaScript com `for f in assets/js/*.js; do node --check "$f"; done` caso Node esteja disponível para desenvolvimento. Ele não é necessário na hospedagem.

## Estrutura

```text
index.php                 entrada da aplicação
config/portfolio.php      conteúdo e opções editáveis
includes/                 metadados, navegação e funções de suporte
sections/                 seções da página
assets/css/               estilos e ajustes responsivos
assets/js/                interações locais do navegador
assets/icons/             favicon SVG
robots.txt                permite rastreamento da diretiva noindex
.user.ini                 opções PHP locais do diretório
```

Includes PHP usam `__DIR__`, portanto não dependem do diretório atual do processo. Os caminhos de CSS, JavaScript, ícones e imagens são relativos à URL da raiz do site. Publique a estrutura de diretórios sem renomear arquivos, respeitando maiúsculas e minúsculas do Linux.

## Personalização do conteúdo

Quase todo o conteúdo fica em `config/portfolio.php`. Trabalhe em uma cópia versionada em desenvolvimento e mantenha uma cópia de segurança dos seus dados personalizados antes de atualizar.

### Perfil e contatos

Edite nome completo, nome profissional, cargo, título, descrição, biografia, localização, disponibilidade e foto. Não inclua afirmações profissionais que não possa comprovar.

Preencha somente os canais que deseja divulgar:

- `email` recebe um endereço de e-mail válido.
- `phone` recebe um telefone com código do país e área. O site cria um link `tel:`.
- `whatsapp` recebe apenas os dígitos com código do país, por exemplo `5511999999999`. O template cria `https://wa.me/` somente quando esse valor está configurado.
- `github_url` e `linkedin` recebem URLs completas HTTPS.

Campos vazios ficam ocultos. O formulário apenas prepara uma mensagem local e abre o canal escolhido após ação explícita da pessoa. Não armazena nem envia dados automaticamente. Confira cada link no seu próprio dispositivo antes de publicar.

### Tecnologias e serviços

Cada tecnologia em `technologies` tem nome, categoria, descrição, aplicações e serviços relacionados. Habilite competências apenas quando correspondam ao seu conhecimento atual.

Cada item em `services` descreve o problema atendido, o público indicado e benefícios possíveis. Use `enabled => false` para ocultar um serviço. A interface não publica preços nem promete resultados ou prazos.

### Projetos

Adicione itens a `projects` informando problema, objetivo, funcionalidades, tecnologias, categoria e classificação. Identifique cada exemplo como demonstrativo, pessoal ou acadêmico conforme aplicável. Não descreva conceitos demonstrativos como trabalhos de clientes. Links de demonstração e repositório vazios não aparecem.

### Explorador virtual e paleta de comandos

O explorador é uma navegação fixa em `includes/sidebar.php`, composta por âncoras de seções. Ele não lê diretórios ou arquivos no servidor. Ao criar ou remover seções, ajuste suas âncoras nessa navegação.

Os comandos disponíveis são uma lista local em `assets/js/command-palette.js`. Edite essa lista quando adicionar destinos ou ações. Não há execução de shell ou acesso arbitrário ao sistema.

### Code Lab e arquiteturas

Edite `code_examples` para adicionar exemplos curtos. O conteúdo é escapado e exibido como texto, sem execução. Edite `architectures` para incluir diagramas explicativos de componentes, responsabilidades e benefícios. Marque conteúdo educacional como exemplo, sem sugerir implantação em produção.

### Aparência e SEO

As cores e tipografia ficam em `assets/css/variables.css`. Os demais arquivos CSS são separados por estrutura, componentes, animações e responsividade.

Configure `seo.title`, `seo.description` e `seo.canonical` com o domínio real. A indexação começa desativada com `indexable => false`, que gera `noindex,nofollow`. Depois de personalizar e revisar o site publicado, altere para `true`. O `robots.txt` permite que os robôs encontrem a diretiva. Não habilite indexação para o conteúdo de demonstração.

## Publicar no HestiaCP

### 1. Configurar domínio e HTTPS

No painel HestiaCP, adicione o domínio na conta que hospedará o portfólio e habilite o suporte web/PHP disponível. Aponte os registros DNS do domínio para o endereço de hospedagem. Depois que o domínio resolver para o servidor, habilite SSL pelo painel e ative o redirecionamento HTTPS se essa opção estiver disponível. O painel pode usar Nginx na frente do Apache ou outra combinação configurada pelo administrador. Não é preciso editar configuração global nem ter acesso root.

### 2. Preparar a pasta pública

O diretório público costuma ser:

```text
/home/USUARIO/web/DOMINIO/public_html/
```

Mantenha o checkout Git fora do document root, por exemplo:

```text
/home/USUARIO/apps/portfolio-terminal-engineer/   checkout privado da conta
/home/USUARIO/web/DOMINIO/public_html/            apenas arquivos públicos
```

Não publique a pasta `.git`, backups, logs, arquivos temporários ou configurações locais. A opção mais segura é copiar para `public_html` somente os arquivos necessários ao site. A configuração atual não contém credenciais.

### 3. Publicar sem root

Depois de clonar o repositório na pasta privada da conta e personalizar `config/portfolio.php`, copie os arquivos publicados usando a interface de arquivos do painel ou SSH/SFTP da própria conta. Exemplo de sincronização executada pelo usuário da hospedagem:

```sh
rsync -av --delete \
  --exclude='.git/' --exclude='.gitignore' --exclude='README.md' \
  --exclude='backups/' --exclude='*.log' \
  /home/USUARIO/apps/portfolio-terminal-engineer/ \
  /home/USUARIO/web/DOMINIO/public_html/
```

Antes de usar `--delete`, confira a origem e o destino, pois arquivos extras no destino serão removidos. Faça uma cópia de segurança dos dados que deseja preservar. O comando deve ser executado como o usuário da hospedagem, sem `sudo`.

Permissões usuais são diretórios `755` e arquivos `644`, respeitando as permissões recomendadas pelo provedor. Não use `777`. O PHP precisa ler os arquivos. Este template não precisa escrever no diretório público.

### 4. Atualizar mantendo personalização

Faça alterações no checkout privado. Antes de atualizar, preserve sua versão personalizada de `config/portfolio.php`, faça backup e revise o diff. Atualize e publique novamente os arquivos necessários. Se esse arquivo receber mudanças no repositório, integre-as manualmente com os seus dados em vez de sobrescrevê-los sem revisão. Mantenha backups fora de `public_html`.

## Proteção em produção

- Não coloque o repositório Git dentro de `public_html`. A proteção de `.git` via `.htaccess` não protege todos os hosts Nginx.
- Publique somente arquivos necessários. Isso também mantém README, scripts de desenvolvimento, backups e arquivos privados fora do acesso HTTP.
- Não coloque tokens, senhas, chaves SSH ou segredos em `config/portfolio.php` ou no diretório público.
- `.user.ini` desativa a exibição pública de erros e habilita registro de erros no ambiente PHP, além de ocultar a versão do PHP. A aplicação não altera configurações globais. Confirme com o provedor como os logs PHP são coletados.
- `.htaccess` não é necessário para a aplicação. Se a configuração do servidor não reconhecer `.user.ini`, solicite ao provedor as opções equivalentes no escopo do domínio. Não edite Nginx ou Apache globalmente.
- Os links externos são limitados a HTTP/HTTPS para GitHub, LinkedIn, URLs canônicas e links de projeto. Os links de e-mail, telefone e WhatsApp são construídos a partir dos campos configurados.
- O formulário e os painéis funcionam no navegador e não recebem código para execução no servidor.

## Checklist antes de divulgar

- [ ] Alterar nome, cargo, biografia, descrição e disponibilidade.
- [ ] Adicionar foto, se desejar.
- [ ] Configurar e testar e-mail, telefone, WhatsApp, GitHub e LinkedIn, se disponíveis.
- [ ] Revisar tecnologias e serviços habilitados.
- [ ] Substituir projetos demonstrativos por projetos reais ou manter rótulos demonstrativos.
- [ ] Revisar exemplos de código, diagramas e conteúdo do Code Lab.
- [ ] Configurar domínio, URL canônica e HTTPS.
- [ ] Testar links, formulário, explorador, paleta, tecnologias, projetos, Code Lab, diagramas e menu mobile.
- [ ] Conferir o layout em smartphones e navegação por teclado.
- [ ] Habilitar indexação somente depois da personalização.
- [ ] Confirmar que `.git`, backups, logs e arquivos privados não estão em `public_html`.

## Limitações

O formulário não envia e-mail diretamente nem armazena solicitações. A pessoa escolhe abrir WhatsApp ou e-mail configurado, ou copiar a mensagem. Não há painel de administração, banco de dados ou compilação. Os projetos iniciais são apenas conceitos demonstrativos. A disponibilidade real do domínio, PHP, HTTPS, logs e limites de upload depende da configuração da conta HestiaCP e deve ser conferida no painel/provedor.
