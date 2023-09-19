<template>
    <Layout>
        <div class="col-md-3">
            <label class="form-label">Nome</label>
            <input id="nome" v-model="form.nome" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">CPF</label>
            <input v-model="form.cpf" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">E-mail</label>
            <input v-model="form.email" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Endereço</label>
            <input v-model="form.endereco" type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Idade</label>
            <input v-model="form.idade" type="number" class="form-control">
        </div>
        <div class="col-md-3 mt-2">
            <button @click="salvar" class="btn btn-success">Salvar</button>
        </div>
        <!-- </div> -->
        <hr>
        <table class="table table-vcenter card-table">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Editar</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="u in usuario">
                    <td>{{ u.id }}</td>
                    <td>{{ u.nome }}</td>
                    <td>{{ u.email }}</td>
                    <td>{{ u.cpf }}</td>
                    <td>{{ u.idade }}</td>
                    <td><button @click="editar(u)" class="btn btn-info btn-sm">Editar</button></td>
                    <td><button @click="excluir(u)" class="btn btn-danger btn-sm">Excluir</button></td>
                </tr>
            </tbody>
        </table>
    </Layout>
</template>
<script>
import Layout from "../../template/Main.vue";

export default {
    props: { usuario: Array },
    components: { Layout },
    data() {
        return {
            form: {}
        }
    },
    methods: {
        salvar() {
            const self = this
            this.$inertia.post(route('user.store'), this.form, {
                onSuccess() {
                    self.form = {}
                }
            });
        },
        editar(param) {
            this.form = param;
        },
        excluir(param) {
            if (confirm("deseja excluir o usuário ?"))            
                this.$inertia.post(route('user.excluir'), param)
        }
    }
}


</script>