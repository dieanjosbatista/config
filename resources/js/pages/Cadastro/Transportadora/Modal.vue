<template>
  <div class="modal fade" id="modal-report" ref="Modal" role="dialog" tabindex="-1" aria-labelledby="modal-report-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-report-label">
            {{ form.id ? 'Atualizar' : 'Cadastro' }}
            Transportadora</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          <button type="button" class="btn-close" @click="close()"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="row">
              <div class="mb-3">
                <label for="razao-social" class="form-label">Razão Social</label>
                <input type="text" v-model="form.razao_social" class="form-control" id="razao-social" required>
              </div>
              <div class="mb-3">
                <label for="nome-fantasia" class="form-label">Nome Fantasia</label>
                <input type="text" v-model="form.nome_fantasia" class="form-control" id="nome-fantasia" required>
              </div>
              <div class="mb-3 col-sm-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" v-model="form.cep" @input="applyCepMask" @blur="buscaCep" class="form-control" id="cep"
                  required>
              </div>
              <div class="mb-3 col-sm-9">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" v-model="form.endereco" class="form-control" id="endereco" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="endereco" class="form-label">Complemento</label>
                <input type="text" v-model="form.complemento" class="form-control" id="complemento" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" v-model="form.bairro" class="form-control" id="bairro" required>
              </div>
              <div class="mb-3 col-sm-5">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" v-model="form.cidade" class="form-control" id="cidade" required>
              </div>
              <div class="mb-3 col-sm-7">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" v-model="form.cnpj" class="form-control" id="cnpj" required @input="applyCnpjMask">
              </div>
              <div class="mb-3 col-sm-6">
                <label for="contato" class="form-label">Contato</label>
                <input type="text" v-model="form.contato" class="form-control" id="contato" required
                  @input="applyPhoneMask">
              </div>
              <div class="mb-3 col-sm-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" v-model="form.email" class="form-control" id="email" required>
              </div>
              <div class="mb-3">
                <label for="responsavel-nome" class="form-label">Nome do Responsável</label>
                <input type="text" v-model="form.responsavel_nome" class="form-control" id="responsavel-nome" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="responsavel-email" class="form-label">E-mail do Responsável</label>
                <input type="text" v-model="form.responsavel_email" class="form-control" id="responsavel-email" required>
              </div>
              <div class="mb-3 col-sm-6">
                <label for="responsavel-cpf" class="form-label">CPF do Responsável</label>
                <input type="text" v-model="form.responsavel_cpf" class="form-control" id="responsavel-cpf" required
                  @input="applyCpfMask">
              </div>
              <div class="mb-3 col-sm-7">
                <label for="responsavel-rg" class="form-label">RG do Responsável</label>
                <input type="text" v-model="form.responsavel_rg" class="form-control" id="responsavel-rg" required>
              </div>
              <div class="mb-3 col-sm-5">
                <label for="responsavel-contato" class="form-label">Contato do Responsável</label>
                <input type="text" v-model="form.responsavel_contato" class="form-control" id="responsavel-contato"
                  required>
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
  props: { form: Object, transportadora: Object },
  data() {
    return {
      modal: {}

    }
  },
  mounted() {
    this.modal = new bootstrap.Modal(document.getElementById('modal-report'), { backdrop: "static", keyboard: false });
  },
  methods: {

    applyCepMask() {
      let cep = this.form.cep;
      cep = cep.replace(/\D/g, '');
      if (cep.length > 8) {
        cep = cep.slice(0, 8);
      }
      cep = cep.replace(/(\d{5})(\d)/, '$1-$2');
      this.form.cep = cep;
    },
    applyPhoneMask() {
      let phone = this.form.contato;
      phone = phone.replace(/\D/g, '');
      if (phone.length > 11) {
        phone = phone.slice(0, 11);
      }
      phone = phone.replace(/^(\d{2})(\d)/, '($1) $2');
      phone = phone.replace(/(\d{5})(\d)/, '$1-$2');
      this.form.contato = phone;
    },

    applyCpfMask() {
      let cpf = this.form.responsavel_cpf;
      cpf = cpf.replace(/\D/g, '');
      if (cpf.length > 11) {
        cpf = cpf.slice(0, 11);
      }
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
      cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      this.form.responsavel_cpf = cpf;
    },

    applyCnpjMask() {
      let cnpj = this.form.cnpj;
      cnpj = cnpj.replace(/\D/g, '');
      if (cnpj.length > 14) {
        cnpj = cnpj.slice(0, 14);
      }
      cnpj = cnpj.replace(/(\d{2})(\d)/, '$1.$2');
      cnpj = cnpj.replace(/(\d{3})(\d)/, '$1.$2');
      cnpj = cnpj.replace(/(\d{3})(\d)/, '$1/$2');
      cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2');
      this.form.cnpj = cnpj;
    },

    close() {
      this.modal.hide()

    },

    buscaCep() {
      axios.get('https://viacep.com.br/ws/' + this.form.cep + '/json/')
        .then(response => {
          console.log(response.data)
          this.form.cidade = response.data.localidade,
            this.form.endereco = response.data.logradouro,
            this.form.bairro = response.data.bairro
        })
    },

    submitForm() {
      axios.post('/api/transportadoras', this.form)
        .then(response => {
          this.close();
        })
        .catch(error => {

        });
    },
    salvar() {
      this.$inertia.post(route('transportadora.store'), this.form);
      this.close();
      this.form = {};
    },

    destroy(id) {
      let vm = this;
      this.$swal
        .fire({
          title: "Tem certeza?",
          html: "A transportadora será excluída.",
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
              route("transportadora.destroy", { id }),
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