<template>
    <header class="navbar navbar-expand-md text-white d-print-none">

        <div class="container-xl">

            <!-- Navbar/Menu Toggle  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--  App's Logo -->
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3 h-25">
                <Link :href="route('home')">
                <img class="logo-navbar" :src="app_url + '/images/logo-navbar.png'" height="40" alt="Logomarca" />
                </Link>
            </h1>

            <div class="navbar-nav flex-row order-md-last">

                <!-- Tema -->
                <div class="d-none d-md-flex pe-2">
                    <a href="#" @click="$emit('themeChanged')" class="nav-link px-0" title="Mudar tema"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <i v-if="theme === 'theme-light'" class="bi bi-moon h2 d-flex my-auto"></i>
                        <i v-else class="bi bi-brightness-high h2 d-flex my-auto"></i>
                    </a>
                </div>

                <!-- Logged in User -->
                <div class="nav-item dropdown" v-if="$page.props?.auth">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm bg-yellow-lt"> {{ $page.props.auth.user.name.substr(0, 2) }}</span>
                        <div class="d-none d-xl-block ps-2 ">
                            <div>{{ $page.props.auth.user.name }}</div>
                            <div class="mt-1 small text-muted text-yellow">{{ $page.props.auth.user.email }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" @click="logout()" class="dropdown-item">Sair</a>
                    </div>
                </div>
            </div>

        </div>
    </header>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: { theme: String },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },

    },
    components: {
        Link,
    },
};
</script>

<style scoped>
.navbar{
    background-color: #23486a;
}

.logo-navbar{
    margin-left: 1.5rem;
}

</style>
