<template>
  <div>
    <div class="card text-left col-sm-6 col-md-4">
      <img class="card-img-top " src="https://www.nacion.com/resizer/SEmajeLrQgnow0RAiFilMFpA-nE=/600x0/center/middle/filters:quality(100)/arc-anglerfish-arc2-prod-gruponacion.s3.amazonaws.com/public/2ID7LLF6U5DNBHKLP6JWRHEG4A.jpg">
      <div class="card-body">
        <h4 class="card-title">Nombre actividad</h4>
        <h5 class="card-title">Descripcion</h5>
        <p class="card-text">Something</p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#infoActividad">
          Ver Actividad
        </button>        
      </div>
    </div>    
    <!-- Modal -->
    <div class="modal fade" id="infoActividad" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Titulo de la actividad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <p>Descripcion de la actividadasdad
                    adsd 
                    asd 
                  </p>
                </div>
                <div class="col-md-4">
                  <img class="img-fluid img.thumbnail"  src="https://www.nacion.com/resizer/SEmajeLrQgnow0RAiFilMFpA-nE=/600x0/center/middle/filters:quality(100)/arc-anglerfish-arc2-prod-gruponacion.s3.amazonaws.com/public/2ID7LLF6U5DNBHKLP6JWRHEG4A.jpg">
                </div>
              </div>  
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Reservar lugar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>