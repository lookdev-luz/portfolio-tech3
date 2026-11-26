<?php
declare(strict_types=1);

return [
    'full_name' => 'Seu Nome',
    'professional_name' => 'Seu Nome',
    'role' => 'Desenvolvedor web',
    'headline' => 'Seu negócio merece ferramentas que simplificam o dia a dia.',
    'description' => 'Sites e sistemas feitos para apresentar seu trabalho, organizar informações e facilitar tarefas da sua rotina.',
    'bio' => 'Tenho interesse em criar soluções digitais organizadas e funcionais, pensadas a partir do que cada pessoa ou negócio precisa. Este modelo é demonstrativo. Personalize esta apresentação com sua trajetória real antes de publicar.',
    'photo' => '',
    'email' => '',
    'phone' => '',
    'whatsapp' => '',
    'github_user' => '',
    'github_url' => '',
    'linkedin' => '',
    'location' => 'Brasil',
    'available' => true,
    'language' => 'Português (Brasil)',
    'version' => '1.0.0',
    'seo' => [
        'title' => 'Seu Nome — Desenvolvedor web',
        'description' => 'Sites e sistemas web para apresentar serviços, organizar informações e facilitar tarefas do dia a dia.',
        'canonical' => '',
        'indexable' => false,
    ],
    'technologies' => [
        ['name'=>'HTML5','category'=>'Frontend','description'=>'Estrutura semântica e acessível para páginas web.','uses'=>'Sites, landing pages e interfaces.','services'=>'Sites e portfólios'],
        ['name'=>'CSS3','category'=>'Frontend','description'=>'Estilos responsivos para interfaces consistentes.','uses'=>'Layouts adaptáveis e componentes visuais.','services'=>'Sites e sistemas web'],
        ['name'=>'JavaScript','category'=>'Frontend','description'=>'Interações no navegador com APIs nativas.','uses'=>'Formulários, filtros e navegação dinâmica.','services'=>'Interfaces web'],
        ['name'=>'PHP','category'=>'Backend','description'=>'Lógica de servidor para aplicações web.','uses'=>'Sites dinâmicos e integrações.','services'=>'Backend e sistemas web'],
        ['name'=>'MySQL / SQL','category'=>'Dados','description'=>'Consulta e organização de dados relacionais.','uses'=>'Cadastros e relatórios.','services'=>'Modelagem e consultas'],
        ['name'=>'Git e Linux','category'=>'Ferramentas','description'=>'Controle de versão e ambiente de hospedagem.','uses'=>'Colaboração e publicação web.','services'=>'Manutenção e publicação'],
    ],
    'services' => [
        ['name'=>'Sites e páginas de divulgação','icon'=>'◫','description'=>'Para negócios que precisam apresentar seus serviços e facilitar o contato de novos clientes.','problem'=>'Informações espalhadas ou uma presença digital desatualizada podem dificultar que as pessoas entendam o que você oferece.','audience'=>'Pequenas empresas, profissionais autônomos e comércios locais.','benefits'=>['Apresente seus serviços em um só lugar','Facilite o contato pelo celular','Tenha uma página alinhada à identidade do negócio'],'examples'=>'Sites institucionais, páginas de divulgação e portfólios','technologies'=>'HTML, CSS, JavaScript e PHP','enabled'=>true],
        ['name'=>'Sistemas para organizar informações','icon'=>'▦','description'=>'Ferramentas sob medida para cadastrar, consultar e acompanhar informações da empresa.','problem'=>'Planilhas e anotações dispersas podem tornar tarefas repetitivas e consultas mais demoradas.','audience'=>'Equipes pequenas, prestadores de serviços e negócios que controlam dados no dia a dia.','benefits'=>['Reúna informações importantes','Organize etapas de trabalho','Consulte registros com mais facilidade'],'examples'=>'Cadastros, controles internos e painéis de acompanhamento','technologies'=>'PHP, JavaScript e bancos de dados','enabled'=>true],
        ['name'=>'Integrações e manutenção','icon'=>'⌘','description'=>'Ajustes e conexões entre ferramentas para reduzir tarefas manuais e manter um site ou sistema atualizado.','problem'=>'Processos feitos manualmente ou falhas que se repetem podem consumir tempo da equipe.','audience'=>'Negócios que já usam ferramentas digitais e precisam conectá-las ou corrigir seu funcionamento.','benefits'=>['Facilite a troca de informações entre sistemas','Investigue e corrija problemas existentes','Mantenha a solução compreensível para futuras alterações'],'examples'=>'Integrações, correções, melhorias e manutenção de sistemas','technologies'=>'PHP, JavaScript e integração entre sistemas','enabled'=>true],
    ],
    'projects' => [
        ['name'=>'Controle de estoque','category'=>'Sistema demonstrativo','description'=>'Exemplo demonstrativo de como um pequeno comércio pode registrar produtos e acompanhar entradas e saídas.','objective'=>'Reunir em um só lugar o cadastro de produtos e a consulta das movimentações.','features'=>['Cadastro de produtos','Registro de movimentações','Consulta de saldo'],'problem'=>'Quando o controle de produtos fica em anotações separadas, pode ser difícil conferir o saldo disponível.','technologies'=>['PHP','MySQL','JavaScript'],'image'=>'','demo'=>'','github'=>'','type'=>'Projeto demonstrativo'],
        ['name'=>'Página de apresentação','category'=>'Website demonstrativo','description'=>'Exemplo demonstrativo de uma página para um negócio apresentar o que oferece e receber contatos.','objective'=>'Apresentar serviços e facilitar o primeiro contato.','features'=>['Conteúdo responsivo','Seções de serviços','Chamada para contato'],'problem'=>'Um visitante pode não encontrar rapidamente os serviços, a localização ou a forma de entrar em contato.','technologies'=>['HTML5','CSS3','JavaScript'],'image'=>'','demo'=>'','github'=>'','type'=>'Projeto demonstrativo'],
        ['name'=>'Cadastro de clientes','category'=>'Sistema demonstrativo','description'=>'Exemplo demonstrativo para cadastrar clientes e consultar seus registros de forma organizada.','objective'=>'Mostrar um fluxo simples de registro, busca e consulta de informações.','features'=>['Campos estruturados','Busca de registros','Relacionamento de dados'],'problem'=>'Dados anotados em lugares diferentes podem ser difíceis de localizar e manter atualizados.','technologies'=>['PHP','MySQL','SQL'],'image'=>'','demo'=>'','github'=>'','type'=>'Projeto demonstrativo'],
    ],
    'code_examples' => [
        ['id'=>'php','file'=>'pedido.php','label'=>'PHP','description'=>'Calcula um total a partir de itens já validados.','practice'=>'A lógica de domínio pode ficar em funções pequenas e reaproveitáveis.','code'=><<<'PHP_EXAMPLE'
<?php
function totalPedido(array $itens): float
{
    $total = 0.0;

    foreach ($itens as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }

    return $total;
}
PHP_EXAMPLE
        ],
        ['id'=>'html','file'=>'pagina.html','label'=>'HTML','description'=>'Estrutura semântica básica de uma página.','practice'=>'Elementos semânticos ajudam navegação e tecnologias assistivas.','code'=>"<main>\n  <article>\n    <h1>Uma solução para sua equipe</h1>\n    <p>Informação clara para quem visita.</p>\n    <a href=\"#contato\">Conversar sobre o projeto</a>\n  </article>\n</main>"],
        ['id'=>'css','file'=>'layout.css','label'=>'CSS','description'=>'Layout adaptável usando Grid.','practice'=>'Media queries ajustam a composição para telas menores.','code'=>".cards {\n  display: grid;\n  grid-template-columns: repeat(\n    auto-fit, minmax(min(100%, 16rem), 1fr)\n  );\n  gap: 1rem;\n}"],
        ['id'=>'javascript','file'=>'interface.js','label'=>'JavaScript','description'=>'Atualiza um texto com dados da interface.','practice'=>'Use textContent para inserir texto sem interpretar marcação HTML.','code'=>"const botao = document.querySelector('[data-action]');\nconst aviso = document.querySelector('[role=status]');\n\nbotao?.addEventListener('click', () => {\n  aviso.textContent = 'Ação concluída.';\n});"],
        ['id'=>'mysql','file'=>'consulta.sql','label'=>'MySQL','description'=>'Consulta pedidos associados aos clientes.','practice'=>'JOIN relaciona registros usando chaves explícitas.','code'=>"SELECT clientes.nome, pedidos.criado_em\nFROM clientes\nINNER JOIN pedidos\n  ON pedidos.cliente_id = clientes.id\nORDER BY pedidos.criado_em DESC;"],
    ],
    'architectures' => [
        ['id'=>'site','name'=>'Site institucional','description'=>'Fluxo demonstrativo de uma página servida pelo PHP.','nodes'=>[['name'=>'Visitante','responsibility'=>'Solicita uma página no navegador.','benefit'=>'Acesso simples ao conteúdo.'],['name'=>'Navegador','responsibility'=>'Interpreta HTML, CSS e JavaScript.','benefit'=>'Experiência acessível em diferentes dispositivos.'],['name'=>'Servidor web','responsibility'=>'Recebe a requisição HTTP.','benefit'=>'Entrega conteúdo pelo domínio.'],['name'=>'PHP','responsibility'=>'Monta a resposta no servidor.','benefit'=>'Conteúdo configurável e reutilizável.'],['name'=>'HTML','responsibility'=>'Representa a página enviada.','benefit'=>'Conteúdo legível pelo navegador.']]],
        ['id'=>'sistema','name'=>'Sistema web','description'=>'Fluxo educacional de uma aplicação com persistência relacional.','nodes'=>[['name'=>'Usuário','responsibility'=>'Interage com a aplicação.','benefit'=>'Acesso aos fluxos do sistema.'],['name'=>'Interface','responsibility'=>'Apresenta dados e recebe ações.','benefit'=>'Operação clara.'],['name'=>'Backend PHP','responsibility'=>'Valida regras e processa solicitações.','benefit'=>'Regras aplicadas no servidor.'],['name'=>'MySQL','responsibility'=>'Persiste dados relacionados.','benefit'=>'Consulta estruturada de registros.']]],
        ['id'=>'integracao','name'=>'Integração de sistemas','description'=>'Fluxo conceitual de uma comunicação via API.','nodes'=>[['name'=>'Interface','responsibility'=>'Inicia a ação solicitada.','benefit'=>'Ponto de interação do usuário.'],['name'=>'API','responsibility'=>'Define o formato da comunicação.','benefit'=>'Integração organizada.'],['name'=>'Serviço externo','responsibility'=>'Processa a solicitação recebida.','benefit'=>'Compartilhamento de capacidades.'],['name'=>'Processamento','responsibility'=>'Interpreta o retorno.','benefit'=>'Resposta adequada ao contexto.'],['name'=>'Resposta','responsibility'=>'Informa o resultado à interface.','benefit'=>'Retorno compreensível.']]],
    ],
    'process' => [
        ['name'=>'Levantamento','description'=>'Entender objetivos, público, conteúdo e restrições do projeto.'],
        ['name'=>'Planejamento','description'=>'Organizar escopo, etapas e critérios para validar a entrega.'],
        ['name'=>'Desenvolvimento','description'=>'Construir a solução em ciclos claros e revisáveis.'],
        ['name'=>'Testes e validação','description'=>'Verificar navegação, conteúdo e comportamento nos dispositivos previstos.'],
        ['name'=>'Publicação','description'=>'Preparar arquivos e configuração para o ambiente de hospedagem.'],
        ['name'=>'Acompanhamento','description'=>'Ajustes posteriores podem ser combinados conforme o projeto.'],
    ],
];
