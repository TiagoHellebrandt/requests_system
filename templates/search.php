<div class="col s12">
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">
                <form method="get">
                    <div class="row">
                        <div class="input-field col s11">
                            <input id="icon_prefix" type="text" class="validate" name="search" value="<?php echo isset($_GET["search"])?$_GET["search"]:"" ?>">
                            <label for="icon_prefix">Pesquisar</label>
                        </div>
                        <div class="col s1">
                            <button class="btn-floating waves-effect waves-light btn-large blue"><i class="material-icons left">search</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>