<template>
  <div class="modal fade" id="modal-report" ref="Modal" role="dialog" tabindex="-1" aria-labelledby="modal-report-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-report-label">
            {{ form.id ? 'Atualizar' : 'Cadastro' }}
            Rastreadora</h5>
          <button type="button" class="btn-close" @click="close()"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="row">
              <div class="mb-3 col-sm-7">
                <label for="razao-social" class="form-label">Nome</label>
                <input type="text" v-model="form.nome" class="form-control" id="nome" required>
              </div>
              <div class="mb-3 col-sm-5">
                <label for="nome-fantasia" class="form-label">Contato</label>
                <input type="text" v-model="form.contato" class="form-control" id="contato" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="endereco" class="form-label">Usuário</label>
                <input type="text" v-model="form.usuario" class="form-control" id="usuario" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="cidade" class="form-label">Senha/Token</label>
                <input type="password" v-model="form.senha" class="form-control" id="senha" required>
              </div>
              <div class="mb-3">
                <label for="cep" class="form-label">Link do Portal</label>
                <input type="text" v-model="form.portal" class="form-control" id="portal" required>
              </div>
              <div class="botoes d-flex justify-content-end">
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
  props: { form: Object, rastreadora: Object },
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
      axios.post('/api/rastreadora', this.form)
        .then(response => {
          this.close();
        })
        .catch(error => {

        });
    },
    salvar() {
      this.$inertia.post(route('rastreadora.store'), this.form);
      this.close();
      this.form = {};
    },

    destroy(id) {
      let vm = this;
      this.$swal
        .fire({
          title: "Tem certeza?",
          html: "A Rastreadora será excluída.",
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
              route("rastreadora.destroy", { id }),
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