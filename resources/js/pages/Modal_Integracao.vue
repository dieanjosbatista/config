<template>
  <div class="modal" id="modal-report" ref="Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastro de Integração</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
            <div class="mb-3 col-md-6">
              <label for="fichaTecnica" class="form-label">Ficha Técnica</label>
              <select class="form-select" v-model="form.id_ficha_tecnica">
                <option value="" placeholder="Selecione..."></option>
                  <option v-for="i in fichaTecnicas" :value="i.id">{{ i.numero_ft }}</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="transportadora" class="form-label">Transportadora</label>
              <select class="form-select" v-model="form.id_transportadora">
                <option value="" placeholder="Selecione..."></option>
                  <option v-for="i in transportadora" :value="i.id">{{ i.nome_fantasia }}</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="veiculo" class="form-label">Veículo</label>
              <select class="form-select" v-model="form.id_veiculo">
                <option value="" placeholder="Selecione..."></option>
                  <option v-for="i in veiculo" :value="i.id">{{ i.placa }}</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="planoViagem" class="form-label">Plano de Viagem</label>
              <select class="form-select" v-model="form.id_plano_viagem">
                <option value="" placeholder="Selecione..."></option>
                  <option v-for="i in planoViagem" :value="i.id">{{ i.sequencia }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="motorista1" class="form-label">Motorista 1</label>
              <select class="form-select" v-model="form.id_motorista_1">
                <option value="" placeholder="Selecione..."></option>
                  <option v-for="i in motorista" :value="i.id">{{ i.nome }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="motorista2" class="form-label">Motorista 2</label>
              <select class="form-select" v-model="form.id_motorista_2">
                <option value=""></option>
                  <option v-for="i in motorista" :value="i.id">{{ i.nome }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="motorista3" class="form-label">Motorista 3</label>
              <select class="form-select" v-model="form.id_motorista_3">
                <option value=""></option>
                  <option v-for="i in motorista" :value="i.id">{{ i.nome }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="motorista4" class="form-label">Motorista 4</label>
              <select class="form-select" v-model="form.id_motorista_4">
                <option value=""></option>
                  <option v-for="i in motorista" :value="i.id">{{ i.nome }}</option>
              </select>
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="periodo_inicial_1" class="form-label">Período Inicial 1</label>
                  <input type="time" v-model="form.periodo_inicial_1" class="form-control" id="periodo_inicial_1" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="periodo_final_1" class="form-label">Período Final 1</label>
                  <input type="time" v-model="form.periodo_final_1" class="form-control" id="periodo_final_1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="periodo_inicial_2" class="form-label">Período Inicial 2</label>
                <input type="time" v-model="form.periodo_inicial_2" class="form-control" id="periodo_inicial_2" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="periodo_final_2" class="form-label">Período Final 2</label>
                <input type="time" v-model="form.periodo_final_2" class="form-control" id="periodo_final_2" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="periodo_inicial_3" class="form-label">Período Inicial 3</label>
                <input type="time" v-model="form.periodo_inicial_3" class="form-control" id="periodo_inicial_3" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="periodo_final_3" class="form-label">Período Final 3</label>
                <input type="time" v-model="form.periodo_final_3" class="form-control" id="periodo_final_3" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="periodo_inicial_4" class="form-label">Período Inicial 4</label>
                <input type="time" v-model="form.periodo_inicial_4" class="form-control" id="periodo_inicial_4" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="periodo_final_4" class="form-label">Período Final 4</label>
                <input type="time" v-model="form.periodo_final_4" class="form-control" id="periodo_final_4" >
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
        <button type="button" class="btn btn-primary" @click="salvarIntegracao">Salvar</button>
      </div>
    </div>
  </div>
 
</div>
</template>

<script>
import axios from 'axios';

export default {
  props: {fichaTecnicas: Array, transportadora: Array, motorista: Array, veiculo: Array, planoViagem: Array},
  data() {
    return {
      modal: {},
      form:{}
    }
  },
  methods: {
    salvarIntegracao(){
      this.$inertia.post(route('integracao.store', this.form))
    }

  },
  mounted() {
    this.modal = new bootstrap.Modal(document.getElementById('modal-report'), { backdrop: "static", keyboard: false });
  },

  
}
</script>

