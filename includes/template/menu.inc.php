<!-- MENU -->
<nav class="clearfix">
    <ul class="grid-16-desktop grid-16-tablet">
        <?php 
            if($_USER['tipo'] <> 2):
        ?>
                <li><a href="<?= BASE_SITE ?>">Listar Pedidos</a></li>
        <?php
            endif;

            # Permissões do usuário
            if($_USER['tipo'] == 2 || $_USER['perm_colegios'] > 1): ?>
                <li>
                    Colégios
                    <ul class="submenu">
                        <li><a href="colegios/listar">Listar Colégios</a></li>
                        <?php if($_USER['tipo'] == 2 || $_USER['perm_colegios'] > 1): ?>
                            <li><a href="colegios_contatos/listar">Listar Contato nos Colégios</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
        <?php
            endif;
            if($_USER['tipo'] == 2 || $_USER['perm_equipamentos'] > 1):
        ?>
                <li>
                    Equipamentos
                    <ul class="submenu">
                        <li><a href="equipamentos/listar">Listar Equipamentos</a></li>
                        <li><a href="equipamentos/estoque">Exibir Estoque</a></li>
                    </ul>
                </li>
        <?php
            endif;
            if($_USER['tipo'] == 2 || $_USER['perm_parceiros'] > 1):
        ?>
                <li>
                    Parceiros
                    <ul class="submenu">
                        <li><a href="parceiros/listar">Listar Parceiros</a></li>
                    </ul>
                </li>
        <?php
            endif;
            if($_USER['tipo'] == 2 || $_USER['tipo'] == 2):
        ?>
                <li>
                    Pedidos
                    <ul class="submenu">
                        <li><a href="pedidos/iniciar">Iniciar Pedido</a></li>
                        <li><a href="pedidos/gerenciar">Listar Pedido</a></li>
                    </ul>
                </li>
        <?php
            endif;
            if($_USER['tipo'] == 2 || $_USER['perm_relatorios'] == 2):
        ?>
                <li><a href="relatorios">Relatórios</a></li>
        <?php
            endif;
            if($_USER['tipo'] == 2):
        ?>
                <li>
                    Usuários
                    <ul class="submenu">
                        <li><a href="usuarios/listar">Listar Usuários</a></li>
                        <li><a href="usuarios/projetos">Vincular Usuários e Projetos</a></li>
                    </ul>
                </li>
        <?php
            endif;
        ?>
    </ul>
    <div class="info-user grid-8-desktop grid-8-tablet">
        <ul><li><a href="sair">Sair</a></li></ul>
        <div class="login-info">
            Olá <strong><?php echo $_USER['nome']; ?></strong>, seja bem vindo.
        </div>
    </div>
</nav>