<template>
    <!-- Container para tabela responsiva -->
    <div class="table-responsive rounded">

        <!-- Tabela -->
        <table class="table table-hover table-bordered rounded" ref="table">
            <thead>
                <tr>
                    <th v-for="(col, i) in columns" :key="i">{{ col }}</th>
                </tr>
            </thead>
            <tbody ref="tableBody">
                <slot />
            </tbody>
        </table>

        <hr>

        <div v-if="emptyTable" class="w-100 text-center my-4">
            <h6>Nenhum registro encontrado</h6>
        </div>

        <div>
            <div class="p-1 d-flex w-100 align-items-end justify-content-between">

                <!-- Paginação -->
                <div>
                    <div v-if="pagination_data && pagination_data.data.length">
                        <strong>
                            Mostrando {{ pagination_data.from ?? 0 }} até {{ pagination_data.to ?? 0 }} de {{
                                pagination_data.total ?? 0 }}
                            registros.
                        </strong>
                        <ul class="pagination mb-0 mt-2">
                            <li v-for="(link, i) in pagination_data.links" :key="i" class="page-item mx-1"
                                :class="getLinkCSSClass(link)">
                                <Link class="page-link" :class="getLinkCSSClass(link)" :href="link.url"> {{ link.label
                                }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: 'Table',
    props: { columns: Array, pagination_data: Object },
    components: { Link },
    data() {
        return {
            emptyTable: true
        }
    },
    watch: {
        columns() {
            this.emptyTable = this.$refs.table.rows.length === 0;
        }
    },
    mounted() {

        this.emptyTable = this.$refs.tableBody.rows.length < 1;

        // Mutation Observer para escutar mudanças no corpo da tabela para verificar se está vazia ou não
        const observer = new MutationObserver((mutations) => {
            this.emptyTable = this.$refs.tableBody.rows.length < 1;
        });

        observer.observe(this.$refs.tableBody, {
            childList: true,
        });

    },
    methods: {
        getLinkCSSClass(link) {
            let css = '';

            if (link.active) {
                css = ' active ';
            }

            if (isNaN(link.label) && link.url === null) {
                css += ' disabled ';
            }

            return css;
        },

    }
}
</script>
