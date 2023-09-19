<template>
  <Layout>
    <BreadcumbMenu
      :items="[{ name: 'Cadastro', url: route('transportadora') }, { name: 'Transportadora', url: route('transportadora') }]" />

    <div class="btn-cadastro d-flex justify-content-end">
      <a href="#" class="btn btn-primary mb-2" @click="abrirModal()">
        <!-- <a href="#" class="btn btn-primary mb-2" @click="abrirModal()"> -->
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
              <!-- <th>Razão Social</th> -->
              <th>Nome Fantasia</th>
              <th>CEP</th>
              <th>Endereço</th>
              <th>Complemento</th>
              <th>Bairro</th>
              <th>Cidade</th>
              <th>CNPJ</th>
              <th>Contato</th>
              <th>E-mail</th>
              <th>Responsável</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="t in transportadora" :key="t.id">
              <!-- <td>{{ t.razao_social }}</td> -->
              <td>{{ t.nome_fantasia }}</td>
              <td>{{ t.cep }}</td>
              <td>{{ t.endereco }}</td>
              <td>{{ t.complemento }}</td>
              <td>{{ t.bairro }}</td>
              <td>{{ t.cidade }}</td>
              <td>{{ applyCnpjMask(t.cnpj) }}</td>
              <td>{{ applyPhoneMask(t.contato) }}</td>
              <td>{{ t.email }}</td>
              <td>{{ t.responsavel_nome }}</td>
              <td>
                <a href="#" @click="abrirModal(t)" class="btn btn-info btn-sm" data-bs-toggle="modal"
                  data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal :form="form" :transportadora="transportadora" ref="modalTrasportadora" />
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
    transportadora: Object
  },
  methods: {
    
    applyPhoneMask(phone) {
      phone = phone.replace(/\D/g, ''); 
      if (phone.length > 11) {
        phone = phone.slice(0, 11);
      }
      phone = phone.replace(/^(\d{2})(\d)/, '($1) $2'); 
      phone = phone.replace(/(\d{5})(\d)/, '$1-$2'); 
      return phone;
    },
    applyCnpjMask(cnpj) {
      cnpj = cnpj.replace(/\D/g, '');
      if (cnpj.length > 14) {
        cnpj = cnpj.slice(0, 14);
      }
      cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2'); 
      cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); 
      cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2'); 
      cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2'); 
      return cnpj;
    },
    modal() {
      $('#modal-report').modal()
    },
    abrirModal(t = null) {
      if (t) {
        this.form = t;
      } else {
        this.form = {};
      }
      this.$refs.modalTrasportadora.modal.show()

    }
  },
  components: {
    Layout,
    BreadcumbMenu,
    Modal,
  }
}
</script>
<style scoped>
.breadcumbmenu {
  width: 50%;
}

.btn-cadastro {
  margin-top: -3.5rem;
}
</style>