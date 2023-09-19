<template>
  <Layout>
    <BreadcumbMenu class="breadcumbmenu"
      :items="[{ name: 'Cadastro', url: route('fichaTecnica') }, { name: 'Ficha Técnica', url: route('fichaTecnica') }]" />

      <div class="btn-cadastro d-flex justify-content-end">
        <a href="#" class="btn btn-primary mb-2" @click="abrirModal()"  >
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
        Cadastrar
      </a>
      </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Origem</th>
              <th>Destino</th>
              <th>Número FT</th>
              <th>Número da Linha</th>
              <th>Data Vigencia Inicial</th>
              <th>Frequência</th>
              <th>Sentido</th>
              <th class="w-1">Arquivo</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="f in fichaTecnica" :key="f.id">
             <td>{{ f.origem }}</td>
             <td>{{ f.destino }}</td>
             <td>{{ f.numero_ft }}</td>
             <td>{{ f.numero_linha }}</td>
             <td>{{ f.vigencia_inicial }}</td>
             <td>{{ f.frequencia }}</td>
             <td>{{ f.sentido }}</td>
             <td>
                <a @click="abrirModal(f)" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal :form="form" :fichaTecnica="fichaTecnica" ref="modalFichaTecnica" />
  </Layout>
</template>
<script>
import Layout from '../../../template/Main.vue'
import BreadcumbMenu from '../../../components/BreadcumbMenu.vue'
import Modal from './Modal.vue'
export default {
  data() {
    return { form: {} }

  },
  mounted() {

  },
  props: {
    fichaTecnica: Object
  },
  methods: {
    modal() {
      $('#modal-report').modal()
    },
    abrirModal(f = null) {
      if (f) {
        this.form = f;
      } else {
        this.form = {};
      }
      this.$refs.modalFichaTecnica.modal.show()

    }
  },
  components: {
    Layout,
    BreadcumbMenu,
    Modal
  }
}
</script>
<style scoped>
.breadcumbmenu {
  width: 50%;
}

.btn-cadastro {
  margin-top: -3.5rem;
}
</style>