<template>
  <Layout>
    <BreadcumbMenu :items="[{ name: 'Cadastro', url: route('veiculo') }, { name: 'Veículo', url: route('veiculo') }]" />

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
              <th>Marca</th>
              <th>Modelo</th>
              <th>Cor</th>
              <th>Ano Fabricação</th>
              <th>Ano Modelo</th>
              <th>Placa</th>
              <th>Chassi</th>
              <th>Renavam</th>
              <th>Capacidade(Kg)</th>
              <th>Categoria</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="v in veiculo" :key="v.id">
              <td>{{ v.marca }}</td>
              <td>
                {{ v.modelo }}
              </td>
              <td>{{ v.cor }}</td>
              <td>
                {{ v.ano_fab }}
              </td>
              <td>
                {{ v.ano_mod }}
              </td>
              <td>
                <div class="placa">
                  <img :src="app_url + '/images/placa.svg'" alt="" srcset="">
                  <div class="placa-numero">
                    <span>{{ v.placa }}</span>
                  </div>
                </div>
              </td>
              <td>{{ v.chassi }}</td>
              <td>{{ v.renavam }}</td>
              <td>{{ v.capacidade }}</td>
              <td>{{ v.categoria }}</td>
              <td>
                <a href="#" @click="abrirModal(v)" class="btn btn-info btn-sm" data-bs-toggle="modal"
                  data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal :form="form" :veiculo="veiculo" ref="modalVeiculo" />
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
    veiculo: Object
  },
  methods: {
    modal() {
      $('#modal-report').modal()
    },
    abrirModal(v = null) {
      if (v) {
        this.form = v;
      } else {
        this.form = {};
      }
      this.$refs.modalVeiculo.modal.show()

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
.placa {
  margin-left: -2px;
  height: 40px;
  width: px;
}

.placa .placa-numero span {
  position: absolute;
  color: red;
  margin-top: -27px;
  font-weight: bold;
  margin-left: 15px;
}

.breadcumbmenu {
  width: 50%;
}

.btn-cadastro {
  margin-top: -3.5rem;
}</style>