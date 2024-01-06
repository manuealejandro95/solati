<div class="container">
  <div class="row">
    <div class="col text-center">
      <h2>Productos</h2>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <button type="button" id="modal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
        Nuevo Producto
      </button>

      <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" id="formuproducto">
                <input type="text" id="accion" style="display: none;">
                <div class="form-group col-md-4" id="codproduc">
                    <label for="id">Codigo</label>
                    <input type="text" class="form-control" name="id" id="id">
                </div>
                <div class="form-row justify-content-center">
                  <div class="form-group col-6">
                    <label for="correo">Usuario</label>
                    <input type="text" class="form-control" name="correo" id="correo">
                  </div>
                </div>
                <div class="form-row  justify-content-center">
                  <div class="form-group col-md-4">
                    <label for="name">Nombres y Apellidos</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password">
                  </div>
                </div>
                <div class="row justify-content-center mb-3">
                  <div class="col-6 col-sm-6 col-xl-6">
                    <button type="button"  id="enviar" class="btn btn-lg btn-block btn-success" >Guardar</button>
                  </div>
                  <div class="col-6 col-sm-6 col-xl-6" id = "delete">
                    <button type="button" id="eliminar" class="btn btn-lg btn-block btn-danger">Eliminar</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-12 col-md-12 col-xl-12">
      <div class="table-responsive" id="registros">
      </div>
    </div>
  </div>
</div>
<script src="js/productos.js?v=<?php echo (rand()); ?>"></script>