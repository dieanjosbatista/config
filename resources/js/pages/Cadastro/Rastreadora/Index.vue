<template>
  <Layout>
    <BreadcumbMenu
      :items="[{ name: 'Cadastro', url: route('rastreadora') }, { name: 'Rastreadora', url: route('rastreadora') }]" />

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
              <th>Nome</th>
              <th>Contato</th>
              <th>Link do Portal</th>
              <th>Usuário</th>
              <th>Senha/Token</th>
              <th class="w-1">Arquivos</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="r in rastreadora" :key="r.id">
              <td>{{ r.nome }}</td>
              <td>{{ r.contato }}</td>
              <td>{{ r.portal }}</td>
              <td>{{ r.usuario }}</td>
              <td>{{ r.senha }}</td>
              <td>
                <a @click="abrirModal(r)" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal :form="form" :rastreadora="rastreadora" ref="modalRastreadora" />
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
    rastreadora: Object
  },
  methods: {
    modal() {
      $('#modal-report').modal()
    },
    abrirModal(r = null) {
      if (r) {
        this.form = r;
      } else {
        this.form = {};
      }
      this.$refs.modalRastreadora.modal.show()

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