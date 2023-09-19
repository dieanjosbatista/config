<template>
  <Layout>
    <BreadcumbMenu
      :items="[{ name: 'Cadastro', url: route('planoViagem') }, { name: 'Plano de Viagem', url: route('planoViagem') }]" />
    <div class="sub-itens d-flex flex-row">

      <div class="mb-3 me-3">
        <!-- <label class="form-label">Transportadora</label> -->
        <select type="text" class="form-select" placeholder="Transportadora" id="select-tags" value="Transportadora">
          <option value="Todas">Todas</option>
        </select>
      </div>
      <div class="mb-3 me-3">
        <!-- <label class="form-label">LTU</label> -->
        <select type="text" class="form-select" placeholder="Transportadora" id="select-tags" value="Transportadora">
          <option value="Todas">Todas</option>
        </select>
      </div>

      <div class="input-icon">
        <!-- <label class="form-label">LTU</label> -->
        <input type="text" value="" class="form-control" placeholder="Procurar LTU...">
        <span class="input-icon-addon mb-3">
          <!-- Download SVG icon from http://tabler-icons.io/i/search -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
            <path d="M21 21l-6 -6"></path>
          </svg>
        </span>
      </div>

      <div class="btn-cadastro">
        <a href="#" class="btn btn-primary mb-2" @click="abrirModal()"  >
      <!-- <a href="#" class="btn btn-primary mb-2" @click="abrirModal()"> -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
        Cadastrar
      </a>
      </div>
    </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Sequência</th>
              <th>CTO</th>
              <th>Ponto de Parada</th>
              <th>KM</th>
              <th>Chegada</th>
              <th>Partida</th>
              <th>Serviço</th>
              <th>Espera</th>
              <th>Livre</th>
              <th>Horas</th>
              <th>Serviços</th>
              <th>Endereço</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="p in planoViagem" :key="p.id">
              <td>{{ p?.sequencia }}</td>
              <td>{{ p?.cto  }}</td>
              <td>{{ p?.ponto_parada }}</td>
              <td>{{ p?.km }}</td>
              <td>{{ p?.chegada }}</td>
              <td>{{ p?.partida }}</td>
              <td>{{ p?.servico }}</td>
              <td>{{ p?.espera }}</td>
              <td>{{ p?.livre }}</td>
              <td>{{ p?.horas }}</td>
              <td>{{ p?.servicos }}</td>
              <td>{{ p?.endereco }}</td>
              <td>
                <a href="#" @click="abrirModal(p)" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal :form="form" :planoViagem="planoViagem" ref="modalPlanoViagem" />
  </Layout>
</template>
<script>
import Layout from '../../../template/Main.vue'
import BreadcumbMenu from '../../../components/BreadcumbMenu.vue'
import Modal from './Modal.vue'
export default {
  data(){
    return {form:{}}
    
  },
  mounted(){
    
  },
  props:{
    planoViagem: Object
  },
  methods: {
    modal(){
      $('#modal-report').modal()
    },
    abrirModal(p = null){ 
      if(p) {
        this.form = p;
      } else {
        this.form = {};
      }
      this.$refs.modalPlanoViagem.modal.show()
      
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

.sub-itens{
  border-top: 1px solid rgba(192, 192, 192, 0.49);
  padding-top: 1rem;
}
.btn-cadastro{
  position: absolute;
  right: 1.5rem;
}

.breadcumbmenu{
  width: 50%;
}


</style>