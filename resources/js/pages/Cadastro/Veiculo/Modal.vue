<template>
  <div class="modal fade" id="modal-report" ref="Modal" role="dialog" tabindex="-1" aria-labelledby="modal-report-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-report-label">
            {{ form.id ? 'Atualizar' : 'Cadastro' }}
            Veículo</h5>
          <button type="button" class="btn-close" @click="close()"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="row">
            <div class="mb-3 col-sm-6">
              <label for="razao-social" class="form-label">Marca</label>
              <input type="text" v-model="form.marca" class="form-control" id="marca">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="nome-fantasia" class="form-label">Modelo</label>
              <input type="text" v-model="form.modelo" class="form-control" id="modelo">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="cep" class="form-label">Cor</label>
              <input type="text" v-model="form.cor" class="form-control" id="cor">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="endereco" class="form-label">Ano Fabricação</label>
              <input type="text" v-model="form.ano_fab" class="form-control" id="ano_fab">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="bairro" class="form-label">Ano Modelo</label>
              <input type="text" v-model="form.ano_mod" class="form-control" id="ano_mod">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="placa" class="form-label">Placa</label>
              <input type="text" v-model="form.placa" class="form-control placa-input" id="placa" @input="formatarPlaca">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="cnpj" class="form-label">Chassi</label>
              <input type="text" v-model="form.chassi" class="form-control" id="chassi">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="contato" class="form-label">Renavam</label>
              <input type="text" v-model="form.renavam" class="form-control" id="renavam">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="email" class="form-label">Capacidade</label>
              <input type="email" v-model="form.capacidade" class="form-control" id="capacidade">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="responsavel-nome" class="form-label">Categoria</label>
              <input type="text" v-model="form.categoria" class="form-control" id="categoria">
            </div>
            <div class="botoes d-flex justify-content-end">
              <button v-if="form.id" type="submit" @click="destroy(form.id)" class="btn btn-danger me-3">Excluir</button>
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
  props: { form: Object, veiculo: Object },
  data() {
    return {
      modal: {}

    }
  },
  mounted() {
    this.modal = new bootstrap.Modal(document.getElementById('modal-report'), { backdrop: "static", keyboard: false });
  },
  methods: {

    formatarPlaca() {
      if (this.form.placa.length === 7) {
        const letras = this.form.placa.slice(0, 3);
        const numeros = this.form.placa.slice(4, 7);
        const letra = this.obterLetra(this.form.placa[3]);
        this.form.placa = `${letras}-${numeros[0]}${letra}${numeros.slice(1)}`;
      }
    },

    obterLetra(numero) {
      const correspondencias = {
        '0': 'A',
        '1': 'B',
        '2': 'C',
        '3': 'D',
        '4': 'E',
        '5': 'F',
        '6': 'G',
        '7': 'H',
        '8': 'I',
        '9': 'J'
      };

      return correspondencias[numero] || '';
    },

    close() {
      this.modal.hide()

    },

    submitForm() {
      axios.post('/api/veiculo', this.form)
        .then(response => {
          this.close();
        })
        .catch(error => {

        });
    },
    salvar() {
      this.$inertia.post(route('veiculo.store'), this.form);
      this.close();
      this.form = {};
    },

    destroy(id) {
      let vm = this;
      this.$swal
        .fire({
          title: "Tem certeza?",
          html: "O veículo será excluída.",
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
              route("veiculo.destroy", { id }),
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