<template>
    <!-- Título da Página -->

    <Head :title="$page.props.app_name + ': ' + route().current().toUpperCase().replace('.', ' > ')" />

    <div class="page" id="pages-container">
        <!-- Top Navigation Bar -->
        <TopBar :theme="theme" @themeChanged="toggleTheme" />

        <!-- Top menu -->
        <Menu />

        <div class="page-wrapper px-2">

            <!-- Page Content  -->
            <div class="page-body">
                <div class="container-xl">
                    <slot />
                </div>
            </div>

            <!-- Footer -->
            <Footer />
        </div>
    </div>
</template>

<script>
import TopBar from "./TopBar.vue";
import Menu from "./Menu.vue";
import Footer from "./Footer.vue";
import { usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3'

export default {
    components: { TopBar, Menu, Footer, Head },
    data() {
        return {
            app: {},
            theme: "",
            toast_options: {
                duration: 10000,
            }
        };
    },
    mounted() {
        this.app = document.getElementById("app");
        this.theme = localStorage.getItem("theme") || "theme-light";
        this.theme === 'theme-light' ? this.setLightTheme() : this.setDarkTheme();
    },
    created() {

        this.$watch('$page.props.errors', (errors) => {

            this.$toast.clear();

            this.$nextTick(() => {
                Object.values(errors).forEach((error, i) => {
                    setTimeout(() => {
                        this.$toast.error(error, { timeout: 0 });
                    }, i * 1000)
                });
            });

        }, { immediate: true });


        this.$watch('$page.props.flash.message', (message) => {

            if (message) {
                this.$nextTick(() => {
                    this.$toast[message.type](message.text, { timeout: 6000 });
                });

            }
        }, { immediate: true });

    },
    methods: {
        setDarkTheme() {
            localStorage.setItem("theme", "theme-dark");
            this.theme = "theme-dark";
            app.classList.remove("theme-light");
            app.classList.add("theme-dark");
        },
        setLightTheme() {
            localStorage.setItem("theme", "theme-light");
            this.theme = "theme-light";
            app.classList.remove("theme-dark");
            app.classList.add("theme-light");
        },
        toggleTheme() {
            this.theme === 'theme-light' ? this.setDarkTheme() : this.setLightTheme();
        },
    }
};
</script>
