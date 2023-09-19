<template>
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">

                        <!-- Página Inicial -->
                        <li class="nav-item" :class="route().current('home') ? 'active' : ''">
                            <Link class="nav-link" :href="route('home')">
                            <i class="bi bi-cloud-upload fs-2 me-2"></i>
                            <span class="nav-link-title"> Integração </span>
                            </Link>
                        </li>
                        <li class="nav-item dropdown" :class="route().current('home') ? 'active' : ''">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <i class="bi bi-plus-circle fs-2 me-2"></i>
                                <span class="nav-link-title">
                                    Cadastro
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <Link class="dropdown-item" :href="route('usuarioAdministrativo')">
                                    Usuário Administrativo
                                </Link>
                                <Link class="dropdown-item" :href="route('rastreadora')">
                                    Rastreadora
                                </Link>
                                <Link class="dropdown-item" :href="route('transportadora')">
                                    Transportadora
                                </Link>

                                <Link class="dropdown-item" :href="route('veiculo')">
                                    Veículo
                                </Link>
                                <Link class="dropdown-item" :href="route('motorista')">
                                    Motorista
                                </Link>
                                <Link class="dropdown-item" :href="route('fichaTecnica')">
                                    Ficha Técnica
                                </Link>
                                <Link class="dropdown-item" :href="route('planoViagem')">
                                    Plano de Viagem
                                </Link>


                            </div>
                        </li>

                        <li class="nav-item" :class="route().current('home') ? 'active' : ''">
                            <Link class="nav-link" :href="route('home')">

                            <i class="bi bi-graph-up-arrow fs-2 me-2"></i>
                            <span class="nav-link-title"> Dashboard </span>
                            </Link>
                        </li>
                        <li class="nav-item" :class="route().current('home') ? 'active' : ''">
                            <Link class="nav-link" :href="route('home')">
                            <!-- <i class="bi bi-building fs-2 me-2"></i> -->
                            <i class="bi bi-signpost-2 fs-2 me-2"></i>
                            <span class="nav-link-title"> Rotas </span>
                            </Link>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    name: "Menu",
    components: { Link }

};
</script>
