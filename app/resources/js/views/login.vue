<template>
    <div>
        <br>
        <div class="row">
            <div class="col-md-4 col-lg-4 offset-md-4 offset-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                              <label for="Iusuario">Usuario</label>
                              <input type="text" name="Iusuario" id="Iusuario" class="form-control" placeholder="Email" aria-describedby="helpId">
                              <small id="helpId" class="text-muted">Ingrese su correo electronico</small>
                            </div>
                            <div class="form-group">
                              <label for="Ipass">Contraseña</label>
                              <input type="password" name="Ipass" id="Ipass" class="form-control" placeholder="Password" aria-describedby="passA">
                              <small id="passA" class="text-muted">Ingrese su contraseña</small>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button> 
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
