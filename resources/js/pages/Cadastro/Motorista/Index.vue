<template>
  <Layout>
    <BreadcumbMenu class="breadcumbmenu"
      :items="[{ name: 'Cadastro', url: route('motorista') }, { name: 'Motorista', url: route('motorista') }]" />

    <div class="btn-cadastro d-flex justify-content-end">
      <a href="#" class="btn btn-primary mb-2" @click="abrirModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
          stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12 5l0 14"></path>
          <path d="M5 12l14 0"></path>
        </svg>
        Cadastrar
      </a>
    </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CPF</th>
              <th>RG</th>
              <th>Pai</th>
              <th>Mãe</th>
              <th>CNH</th>
              <th>Endereço</th>
              <th>Contato</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="m in motorista" :key="m.id">
              <td>{{ m?.nome }}</td>
              <td>{{ m?.cpf }}</td>
              <td>{{ m?.rg }}</td>
              <td>{{ m?.pai }}</td>
              <td>{{ m?.mae }}</td>
              <td>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-card-image" viewBox="0 0 16 16">
                  <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                  <path
                    d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
                </svg>
                {{ m.cnh }}
              </td>
              <td>{{ m?.endereco }}</td>
              <td>{{ m?.contato }}</td>
              <td>
                <a @click="abrirModal(m)" class="btn btn-info btn-sm" data-bs-toggle="modal"
                  data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal :form="form" :motorista="motorista" ref="modalMotorista" />
  </Layout>
</template>
<script>
import Layout from '../../../template/Main.vue'
import BreadcumbMenu from '../../../components/BreadcumbMenu.vue'
import Modal from './modal.vue'
export default {
  data() {
    return { form: {} }

  },
  mounted() {

  },
  props: {
    motorista: Object
  },
  methods: {
    modal() {
      $('#modal-report').modal()
    },
    abrirModal(m = null) {
      if (m) {
        this.form = m;
      } else {
        this.form = {};
      }
      this.$refs.modalMotorista.modal.show()

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
}</style>