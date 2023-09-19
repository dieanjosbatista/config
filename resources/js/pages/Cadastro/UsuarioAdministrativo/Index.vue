<template>
  <Layout>
    <BreadcumbMenu
      :items="[{ name: 'Cadastro', url: route('usuarioAdministrativo') }, { name: 'Usuário Administrativo', url: route('usuarioAdministrativo') }]" />

      <div class="btn-cadastro d-flex justify-content-end">
        <a href="#" class="btn btn-primary mb-2">
          Cadastrar
        </a>
      </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Contato</th>
              <th>CNH</th>
              <th>Validade CNH</th>
              <th>Período</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>nome</td>
              <td class="text-muted">
                contato
              </td>
              <td class="text-muted"><a href="#" class="text-reset">cnh</a></td>
              <td class="text-muted">
                validade_cnh
              </td>
              <td>
                periodo
              </td>
              <td>
                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-report">
                  <i class="bi bi-folder2-open"></i>
                  </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Modal />
  </Layout>
</template>
<script>
import Layout from '../../../template/Main.vue'
import BreadcumbMenu from '../../../components/BreadcumbMenu.vue'
import Modal from './modal.vue'
export default {
  methods: {
    modal(){
      $('#modal-cadastro').modal()
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
  .breadcumbmenu{
  width: 50%;
}

.btn-cadastro{
  margin-top: -3.5rem;
}
</style>