<template>
  <div class="modal fade" id="modal-report" ref="Modal" role="dialog" tabindex="-1" aria-labelledby="modal-report-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-report-label">
            {{ form.id ? 'Atualizar' : 'Cadastro' }}
            Plano de Viagem</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          <button type="button" class="btn-close" @click="close()"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="row">
              <div class="mb-3 col-sm-6">
                <label for="razao-social" class="form-label">Sequência</label>
                <input type="text" v-model="form.sequencia" class="form-control" id="sequencia" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="nome-fantasia" class="form-label">CTO</label>
                <input type="text" v-model="form.cto" class="form-control" id="cto" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="cep" class="form-label">Ponto de Parada</label>
                <input type="text" v-model="form.ponto_parada" class="form-control" id="ponto_parada" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="endereco" class="form-label">KM</label>
                <input type="text" v-model="form.km" class="form-control" id="km" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="cidade" class="form-label">Partida</label>
                <input type="text" v-model="form.partida" class="form-control" id="partida" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="bairro" class="form-label">Chegada</label>
                <input type="text" v-model="form.chegada" class="form-control" id="chegada" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="cnpj" class="form-label">Serviço</label>
                <input type="text" v-model="form.servico" class="form-control" id="servico" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="contato" class="form-label">Espera</label>
                <input type="text" v-model="form.espera" class="form-control" id="espera" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="email" class="form-label">Livre</label>
                <input type="email" v-model="form.livre" class="form-control" id="livre" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="responsavel-nome" class="form-label">Horas</label>
                <input type="text" v-model="form.horas" class="form-control" id="horas" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="responsavel-email" class="form-label">Serviços</label>
                <input type="text" v-model="form.servicos" class="form-control" id="servicos" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="responsavel-cpf" class="form-label">Endereço</label>
                <input type="text" v-model="form.endereco" class="form-control" id="endereco" required>
              </div>
              <div class="card-footer botoes d-flex justify-content-end">
                <button v-if="form.id" type="submit" @click="destroy(form.id)" class="btn btn-danger">Excluir</button>
                <button type="submit" @click="salvar()" class="btn btn-primary">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: { form: Object, planoViagem: Object },
  data() {
    return {
      modal: {}

    }
  },
  mounted() {
    this.modal = new bootstrap.Modal(document.getElementById('modal-report'), { backdrop: "static", keyboard: false });
  },
  methods: {

    close() {
      this.modal.hide()

    },

    submitForm() {
      axios.post('/api/planoViagem', this.form)
        .then(response => {
          this.close();
        })
        .catch(error => {

        });
    },
    salvar() {
      this.$inertia.post(route('planoViagem.store'), this.form);
      this.close();
      this.form = {};
    },

    destroy(id) {
      let vm = this;
      this.$swal
        .fire({
          title: "Tem certeza?",
          html: "O plano de viagem será excluído.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "3085d6",
          cancelButtonColor: "d33",
          confirmButtonText: "Sim, excluir",
          cancelButtonText: "Cancelar",
        })
        .then((result) => {
          if (result.isConfirmed) {
            this.$inertia.delete(
              route("planoViagem.destroy", { id }),
              {
                onSuccess() {
                  console.log(vm);
                  // $("#modal-report").modal("hide");
                  vm.close();
                },
              }
            );
          }
        });
    },
  }
};
</script>