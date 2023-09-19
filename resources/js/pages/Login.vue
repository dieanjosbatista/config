<template>
    <Head :title="`${$page.props.app_name}: Login`" />

    <div class="page page-center">
        <div class="container-tight py-4 px-5">

            <div class="row justify-content-center">

                <div class="col-lg-4">

                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img
                                :src="app_url + '/images/logo-login.png'" height="94" alt=""></a>
                    </div>

                    <!-- Login Form -->
                    <form @submit.prevent="authenticate()" class="card card-md" autocomplete="off">
                        <div class="card-body">

                            <!-- Login -->
                            <a class="icon-login"><img
                                :src="app_url + '/images/icon-logo.svg'" height="60" alt=""></a>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" v-model="form.email" class="form-control bg-input" placeholder="Insira seu Email"
                                    autocomplete="off">
                            </div>

                            <!-- Password -->
                            <div class="mb-2">
                                <label class="form-label">
                                    Senha
                                </label>
                                <div class="input-group input-group-flat">
                                    <input v-if="showPassword === false" v-model="form.password" type="password"
                                        class="form-control bg-input" placeholder="Senha" autocomplete="off">
                                    <input v-else type="text" v-model="form.password" class="form-control bg-input"
                                        placeholder="Senha" autocomplete="off">
                                    <span class="input-group-text  px-2">
                                        <a href="#" class="link-secondary bg-input" title="" data-bs-toggle="tooltip"
                                            data-bs-original-title="Mostrar senha" @click="showPassword = !showPassword">
                                            <i v-if="showPassword" class="bi bi-eye fs-2"></i>
                                            <i v-else class="bi bi-eye-slash fs-2"></i>
                                        </a>
                                    </span>
                                </div>
                                <div v-show="Object.keys(errors).length > 0" class="alert alert-danger mt-4" role="alert">
                                    <p class="text-danger" v-for="error in errors">
                                        {{ error }}
                                    </p>
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="my-4">
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" v-model="form.remember">
                                    <span class="form-check-label">Lembrar Credenciais</span>
                                </label>
                            </div>

                            <!-- Sign in -->
                            <div class="form-footer">
                                <button type="submit" class="btn btn-enter w-100">Entrar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
export default {
    components: { Head },
    props: { errors: Object },
    data() {
        return {
            showPassword: false,
            form: {
                email: '',
                password: '',
                remember: true
            }
        };
    },
    methods: {
        authenticate() {
            this.$inertia.post(route('login'), this.form);
        }
    }
};
</script>
<style scoped>

/* .bg-input{
    background: rgba(206, 211, 216, 0.24);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.17);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
} */

.form-label, .form-check-label{
    color: #fff;
}
.icon-login{
    margin-left: 40%;
}
.page {
    background-size: cover;
    height: 100vh;
    width: 100vw;
    background-image: url(/public/images/bg.png);
}

.card-md {
    background: rgba(62, 76, 89, 0.4);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.17);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.52);
}

.btn-enter {
    background-color: #da6b34;
    border: none;
    color: #fff;
}

.btn-enter:hover {
    background-color: #EF8854;
    color: #ffffff;
}
</style>