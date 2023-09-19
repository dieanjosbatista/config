<template>
    <Layout>
        <BreadcumbMenu :items="[{ name: 'Home', url: route('home') }, { name: 'Home', url: route('home') }]" />

        <!-- Botão de Cadastro  -->
        <div class="btn-cadastro d-flex justify-content-end">
            <a href="#" class="btn btn-primary mb-2" @click="abrirModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                Cadastrar
            </a>
        </div>

        <div class="card card-body border shadow-sm p-3">
            <Kanban :integracao="integracao"/>
            <!-- <Table :columns="['Col 01', 'Col 02']">
                  <tr>
                      <td>A</td>
                      <td>B</td>
                  </tr>
              </Table> -->
        </div>
        <Modal 
        ref="modalIntegracao"
        :fichaTecnicas="fichaTecnicas"
        :transportadora="transportadora"
        :veiculo="veiculo"
        :motorista="motorista"
        :planoViagem="planoViagem"
        
        />
    </Layout>
</template>
  
<script>
import Layout from "../template/Main.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import BreadcumbMenu from "../components/BreadcumbMenu.vue";
import Kanban from "../components/Kanban.vue";
import Table from "../components/Table.vue";
import Modal from "./Modal_Integracao.vue";

export default {
    props: {integracao: Array, fichaTecnicas: Array, transportadora: Array, motorista: Array, veiculo: Array, planoViagem: Array},
    data() {
        return {
            q: route().params.q,
        };
    },
    mounted() { },
    methods: {
        modal() {
            $('#modal-report').modal()
        },
        abrirModal() {
            // $('#modal-report').show();
      
            this.$refs.modalIntegracao.modal.show()

        },
    },



    components: {
        Head,
        Layout,
        Link,
        BreadcumbMenu,
        Kanban,
        Table,
        Modal,
    },
};
</script>
  
<style scoped>
.breadcumbmenu {
    width: 50%;
}

.btn-cadastro {
    margin-top: -3.5rem;
    margin-bottom: 0.7rem;
}
</style>
  