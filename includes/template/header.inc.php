<!-- Header -->
<header class="clearfix">
    <div class="logo grid-4-desktop grid-4-tablet">
        <a href="<?= BASE_SITE ?>"><img src="assets/images/css/logo.png" alt="Grupo Torino"></a>
    </div>
    <form action="?" class="pesquisa grid-20-desktop grid-20-tablet">
        <div class="grid-3-desktop grid-4-tablet">
            <label for="tipo_pesquisa">Pesquisar por</label>
        </div>
        <div class="grid-3-desktop grid-4-tablet">
            <select name="tipo_pesquisa" id="tipo_pesquisa">
                <option value="id">nº do pedido</option>
            </select>
        </div>
        <div class="grid-13-desktop grid-12-tablet">
            <input name="pesquisa" type="search" placeholder="Digite aqui o termo que deseja pesquisar">
        </div>
        <div class="grid-3-desktop grid-4-tablet">
            <button type="button" name="pesquisar" class="btn btn-primary btn-icon icon-left">
                buscar
                <i class="entypo-search"></i>
            </button>
        </div>
    </form>
</header>

<?php include 'includes/template/menu.inc.php'; ?>
