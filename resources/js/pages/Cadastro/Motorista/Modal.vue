<template>
  <div class="modal fade" id="modal-report" ref="Modal" role="dialog" tabindex="-1" aria-labelledby="modal-report-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-report-label">
            {{ form.id ? 'Atualizar' : 'Cadastro' }}
            Motorista</h5>
          <button type="button" class="btn-close" @click="close()"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="row">
            <div class="mb-3 col-sm-7">
              <label for="razao-social" class="form-label col-sm-3">Nome<span>*</span></label>
              <input type="text" v-model="form.nome" class="form-control" id="nome">
            </div>
            <div class="mb-3 col-sm-5">
              <label for="nome-fantasia" class="form-label">CPF*</label>
              <input type="text" v-model="form.cpf" class="form-control" id="cpf"  @input="applyCpfMask">
            </div>
            <div class="mb-3 col-sm-7">
              <label for="cep" class="form-label">RG*</label>
              <input type="text" v-model="form.rg" class="form-control" id="rg" >
            </div>
            <div class="mb-3 col-sm-5">
              <label for="bairro" class="form-label">Contato*</label>
              <input type="text" v-model="form.contato" name="input-mask" class="form-control" data-mask="(00) 0000-0000" data-mask-visible="true" placeholder="(00) 00000-0000" autocomplete="off" id="contato">
            </div>
            <div class="mb-3 col-sm-6">
              <label for="endereco" class="form-label">Pai*</label>
              <input type="text" v-model="form.pai" class="form-control" id="pai" >
            </div>
            <div class="mb-3 col-sm-6">
              <label for="bairro" class="form-label">Mãe*</label>
              <input type="text" v-model="form.mae" class="form-control" id="mae" >
            </div>
            <div class="mb-3">
              <label for="bairro" class="form-label">Endereço*</label>
              <input type="text" v-model="form.endereco" class="form-control" id="endereco">
            </div>
            <div class="mb-3">
              <div class="form-label">Anexo CNH</div>
              <input type="file" class="form-control" id="cnh" @change="handleFileChange">
              <div class="mt-3 border cnh_img">
                <label for="thumbnail"></label>
                <iframe :src="thumbnailUrl" id="thumbnail" alt="Thumbnail"></iframe>
              </div>
            </div>
            
            
            <div class="botoes d-flex justify-content-end">
              <button v-if="form.id" type="submit" @click="destroy(form.id)" class="btn btn-danger mx-2">Excluir</button>
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
  props: { form: Object, motorista: Object },
  data() {
    return {
      modal: {},
      thumbnailUrl: '',

    }
  },
  mounted() {
    this.modal = new bootstrap.Modal(document.getElementById('modal-report'), { backdrop: "static", keyboard: false });
  },
  methods: {
    applyCpfMask() {
      let cpf = this.form.cpf;
      cpf = cpf.replace(/\D/g, '');
      if (cpf.length > 11) {
        cpf = cpf.slice(0, 11);
      }
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
      cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      this.form.cpf = cpf;
    },
    handleFileChange(event) {
      const file = event.target.files[0];
      this.form.file = file;
      const reader = new FileReader();

      reader.onload = () => {
        this.thumbnailUrl = reader.result;
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    },

    close() {
      this.modal.hide()

    },

    submitForm() {
      axios.post('/api/motorista', this.form)
        .then(response => {
          this.close();
        })
        .catch(error => {

        });
    },
    salvar() {
      let vm = this;
      console.log(this.form)
      this.$inertia.post(route('motorista.store'), this.form, {
        onSuccess() {
          vm.close();
          this.form = {};
        }
      });

    },

    destroy(id) {
      let vm = this;
      this.$swal
        .fire({
          title: "Tem certeza?",
          html: "O motorista será excluído.",
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
              route("motorista.destroy", { id }),
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
<style scoped>


</style>