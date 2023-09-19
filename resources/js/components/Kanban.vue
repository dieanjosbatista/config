<template>
    <div class="d-flex  kanban-container">
        <!-- Cols -->
        <div class="col mx-3" v-for="col in integracao">
            <!-- Col Header -->
            <div class="d-flex align-items-center my-3 mx-0">
                <div class="badge bg-primary">
                    {{ col.cartao.length }}
                </div>
                <h4 class="my-auto ms-2">
                    {{ col.nome }}
                </h4>
            </div>
            
            <!-- Col Cards  -->
            <div class="row kanban-row mb-2">
                <div class="col kanban-col rounded border rounded shadow-sm">
                    <!-- Card Body -->
                    <div class="card my-3 card-kanban shadow-sm" v-for="i in col.cartao">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">
                                    Linha: {{ i.ficha_tecnica.numero_linha }}
                                </div>
                                <div class="ms-auto lh-1">
                                    <span class="text-muted subheader">{{ i.ficha_tecnica.numero_ft }}</span>
                                </div>
                            </div>
                            <strong>{{ i.trasportadora.razao_social }} </strong>
                            <div>
                                <span class="text-muted">
                                    {{ i.motorista1.nome }}
                                </span>
                            </div>
                            <div class="mt-1">
                                <div class="row">
                                    <div class="">
                                        <div class="avatar-list avatar-list-stacked">
                                            <div class="placa">
                                                <img :src="app_url + '/images/placa.svg'" alt="" srcset="">
                                                <div class="placa-numero">
                                                    <span>{{ i.veiculo.placa.toUpperCase() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span title="Data da integração">
                                       

                                            <i class="bi bi-calendar"></i>
                                            {{ i.created_at }}
                                        </span>
                                    </div>
                                    <div class="col-auto text-muted">
                                        <span title="Integrações realizadas" class="switch-icon switch-icon-scale">
                                            <span class="switch-icon-a text-muted">
                                                <i class="bi bi-cloud-upload fs-2 me-2"></i>
                                            </span>
                                        </span>
                                        8
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{integracao: Array},
    data() {
        return {
            columns: ['Col 01', 'Col 02', 'Col 03', 'Col 04']
        }
    },
}
</script>
<style scoped>
.kanban-col {
    height: 75vh;
    overflow-y: auto;
    min-width: 300px;
}
.kanban-container {
    max-width: 100vw !important;
    overflow-x: auto;
}
.card-kanban {
    width: 100%;
    cursor: pointer;
}
.card-kanban:hover {
    border: 1px solid gray;
}
.placa {
    margin-left: -2px;
    height: 40px;
}
.placa .placa-numero span {
    position: absolute;
    color: red;
    margin-top: -27px;
    font-weight: bold;
    margin-left: 15px;
}
</style>
