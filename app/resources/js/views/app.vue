<template>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="#">Club Manager</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!-- TODO: Activar el class si se encuentra en esa pagina -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Estado de cuenta</a>
                    </li>
                </ul>
                <!-- Mostrar cuando esta en la pestaña actividades -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>        
        <router-view></router-view>         
    </div>
</template>
