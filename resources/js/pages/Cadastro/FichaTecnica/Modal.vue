<template>
  <div class="modal fade" id="modal-report" ref="Modal" role="dialog" tabindex="-1" aria-labelledby="modal-report-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-report-label">
            {{ form.id ? 'Atualizar' : 'Cadastro' }}
            Ficha Técnica</h5>
          <button type="button" class="btn-close" @click="close()"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="razao-social" class="form-label">Origem</label>
              <input type="text" v-model="form.origem" class="form-control" id="origem" required>
            </div>
            <div class="mb-3">
              <label for="nome-fantasia" class="form-label">Destino</label>
              <input type="text" v-model="form.destino" class="form-control" id="destino" required>
            </div>
            <div class="mb-3">
              <label for="cep" class="form-label">Número FT</label>
              <input type="text" v-model="form.numero_ft" class="form-control" id="numero_ft" required>
            </div>
            <div class="mb-3">
              <label for="endereco" class="form-label">Número Linha</label>
              <input type="text" v-model="form.numero_linha" class="form-control" id="numero_linha" required>
            </div>
            <div class="mb-3">
              <label for="bairro" class="form-label">Data Vigência Inicial</label>
              <input type="text" v-model="form.vigencia_inicial" class="form-control" id="vigencia_inicial" required
                name="input-mask" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000"
                autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="cidade" class="form-label">Frequência</label>
              <input type="text" v-model="form.frequencia" class="form-control" id="frequencia" required>
            </div>
            <div class="mb-3">
              <label for="cnpj" class="form-label">Sentido</label>
              <input type="text" v-model="form.sentido" class="form-control" id="sentido" required>
            </div>
            <div class="botoes d-flex justify-content-end">
              <button v-if="form.id" type="submit" @click="destroy(form.id)" class="btn btn-danger">Excluir</button>
              <button type="submit" @click="salvar()" class="btn btn-primary">Salvar</button>
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
  props: { form: Object, fichaTecnica: Object },
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
      axios.post('/api/fichaTecnica', this.form)
        .then(response => {
          this.close();
        })
        .catch(error => {

        });
    },
    salvar() {
      this.$inertia.post(route('fichaTecnica.store'), this.form);
      this.close();
      this.form = {};
    },

    destroy(id) {
      let vm = this;
      this.$swal
        .fire({
          title: "Tem certeza?",
          html: "A Ficha Técnica será excluída.",
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
              route("fichaTecnica.destroy", { id }),
              {
                onSuccess() {
                  console.log(vm);
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