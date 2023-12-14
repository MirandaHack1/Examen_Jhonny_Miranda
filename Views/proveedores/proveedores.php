<?php require_once('../html/head2.php') ?>
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de proveedores</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_proveedores">
                        Nuevo proveedores
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Producto Suministrado</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha Contrato</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cedula</h6>
                                </th>
                                <!-- <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estado</h6>
                                </th> -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody id="tabla_proveedores">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ventana Modal-->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Modal_proveedores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_proveedores">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Proveedores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ID_Provedores" id="ID_Provedores">
                    <div class="form-group">

                        <!-- <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="Producto_Sumistrado">Producto Sumistrado</label>
                            <input type="text" required class="form-control" id="Producto_Sumistrado" name="Producto_Sumistrado" placeholder="Producto_Sumistrado">
                        </div> -->
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Solo se permiten letras y espacios">
                        </div>

                        <div class="form-group">
                            <label for="Producto_Sumistrado">Producto Sumistrado</label>
                            <input type="text" required class="form-control" id="Producto_Sumistrado" name="Producto_Sumistrado" placeholder="Producto_Sumistrado" pattern="[A-Za-z0-9\s]+" title="Solo se permiten letras, números y espacios">
                        </div>


                        <div class="form-group">
                            <label for="Fecha_Inicio_Contrato">Fecha Contrato</label>
                            <input type="date" required class="form-control" id="Fecha_Inicio_Contrato" name="Fecha_Inicio_Contrato" placeholder="Fecha_Inicio_Contrato">
                        </div>

                        <div class="form-group">
                            <label for="Cedula">Cedula</label>
                            <input type="text" onfocusout="algoritmo_cedula();cedula_repetida();" required class="form-control" id="Cedula" name="Cedula" placeholder="Cedula" pattern="[0-9]+" title="Solo se permiten números">
                            <div class="alert alert-danger d-none" role="alert" id="errorCedula">
                            </div>
                            <div class="alert alert-danger d-none" role="alert" id="CedulaRepetida">
                            </div>
                        </div>


                     

                        <!-- <div class="form-group">
                            <label for="Cedula">Cedula</label>
                            <input type="text" required class="form-control" id="Cedula" name="Cedula" placeholder="Cedula">
                        </div> -->


                        <!-- 
                        <div class="form-group">
                            <label for="Cedula">Cedula</label>
                            <input type="text" onfocusout="algoritmo_cedula();cedula_repetida();" required class="form-control" id="Cedula" name="Cedula" placeholder="Cedula">
                            <div class="alert alert-danger d-none" role="alert" id="errorCedula">
                            </div>
                            <div class="alert alert-danger d-none" role="alert" id="CedulaRepetida">
                            </div>
                        </div> -->


                        <!-- <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" required class="form-control" id="estado" name="estado" placeholder="estado">
                    </div> -->
                        <!-- <div class="form-group">
                            <label for="frm_estado">Estado</label>
                            <input type="text" required class="form-control" id="frm_estado" name="frm_estado" placeholder="frm_estado" value="Activo" readonly>
                        </div> -->



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>


<script src="./proveedores.controller.js"></script>
<script src="./proveedores.model.js"></script>