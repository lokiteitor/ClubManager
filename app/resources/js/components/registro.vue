<template>
    <div class="card">
        <div class="card-header">
            Consultar empleado
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
                        aria-describedby="Hnombre">
                    <small id="Hnombre" class="text-muted">Ingrese el nombre</small>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder=""
                        aria-describedby="Hapellido">
                    <small id="Hapellido" class="text-muted">Ingrese el apellido paterno</small>
                </div>
                <div class="form-group">
                    <label for="apellidoM">Apellido Materno</label>
                    <input type="text" name="apellidoM" id="apellidoM" class="form-control" placeholder=""
                        aria-describedby="HapellidoM">
                    <small id="HapellidoM" class="text-muted">Ingrese el apellido materno</small>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder=""
                        aria-describedby="Hdireccion">
                    <small id="Hdireccion" class="text-muted">Ingrese la direccion</small>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" placeholder=""
                        aria-describedby="Htelefono">
                    <small id="Htelefono" class="text-muted">Ingrese un numero telefonico</small>
                </div>
                <label>Tipo de empleado</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="tipo" value="empleado" checked>
                        Empleado
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="tipo" class="form-check-input" value="administrador">
                        Administrador
                    </label>
                </div>
                <br>
                <label>Modificar Contraseña</label>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password"
                        aria-describedby="Hpassword">
                    <small id="Hpassword" class="text-muted">Ingrese su contraseña</small>
                </div>
                <div class="form-group">
                    <label for="Rpassword">Repita la contraseña</label>
                    <input type="password" name="Rpassword" id="Rpassword" class="form-control" placeholder="password"
                        aria-describedby="HRpassword">
                    <small id="HRpassword" class="text-muted">Ingrese nuevamente la constraseña</small>
                </div>
                <div class="form-group">
                    <button type="button" name="registrar" id="registrar" class="btn btn-primary btn-lg btn-block">Registrar</button>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-lg" style="margin-right:1ex">Modificar</button>
                    <div></div>
                    <button type="button" class="btn btn-danger btn-lg">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</template>
