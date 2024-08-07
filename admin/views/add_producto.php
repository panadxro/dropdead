<?php
$categorias = (new Categoria())->catalogo_completo();
$talles = (new Talle())->catalogo_completo();
?>

<div class="row pt-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">AGREGAR PRODUCTO</h1>
        <div class="row mb-5 d-flex justify-content-center align-items-center">
            <form class="row g-3" action="actions/add_producto_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre de producto</label>
                    <input class="form-control" type="text" name="nombre" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Alias</label>
                    <input class="form-control" type="text" name="alias" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_id" id="categoria_id" required>
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen</label>
                    <input class="form-control" type="file" name="imagen" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mt-2 d-flex form-label" for="">Talles Disponibles</label>
                    <?php foreach ($talles as $talle) { ?>
                    <div class="d-inline">
                        <input class="btn-check" type="checkbox" name="talles[]"
                            id="talle<?= $talle->getId() ?>"
                            value="<?= $talle->getId() ?>"
                        >
                        <label class="btn" for="talle<?= $talle->getId() ?>">
                            <?= $talle->getNombre() ?>
                        </label>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="7" required></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>
