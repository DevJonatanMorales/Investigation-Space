
<div id="asideID" class="aside bg-white col-sm-5 col-md-4 col-lg-4">
    <div class="my-2">
        <h5 class="card-title ">Últimas solicitudes</h5>
    </div>
    <div class="bg-light">
        <ul class="list-unstyled">
            <?php for ($i=0; $i < 4; $i++) { ?>
            <li class="media">
                <img src="../../img/defect.jpg" class="rounded-circle my-2 mr-3" alt="..." width="60px" height="60px">
                <div class="media-body">
                    <h5 class="mt-0 mb-1 my-2">Juan Peres</h5>
                    <div class="form-gruop my-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-user-plus"></i>
                            Confirmar
                        </button>
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-user-times"></i>
                            Eliminar
                        </button>
                    </div>
                </div>
            </li>
            <?php } ?>    
        </ul>
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a class="text-primary ">Ver todas las solicitudes</a>
    </div>
</div>