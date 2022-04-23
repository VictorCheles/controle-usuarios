<template>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <alert-component
                    :type="typeAlert"
                    :class="displayAlert"
                >
                    {{msgAlert}}
                </alert-component>
                <div class="text-center">
                      <h3 class="text-primary">Lista de Usuários</h3>
                  </div>
            <table class="table bg-white rounded border">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in listItens" :key="user.email">
                        <th scope="row">{{user.email}}</th>
                        <td>{{user.email}}</td>
                        <td>
                            <li class="nav-item dropdown list-unstyled">
                                <button type="button" class="btn btn-secondary dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opções
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><router-link :to="'/register/'+user.id" class="text-decoration-none"><a class="dropdown-item" href="#">Editar</a></router-link></li>
                                    <li><a class="dropdown-item" href="#" @click="apagar(user.id)">Excluir</a></li>
                                </ul>
                            </li>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            listItens:[],
            url:'list/users',
            msgAlert:'',
            typeAlert:'',
            displayAlert:'d-none',
        }
    },
    mounted(){
        this.listar()
    },
    methods:{
        listar(){
            let config = {
                headers:{
                    'Content-Type' : 'multipart/form-data',
                    'Accept' : 'application/json',
                    'Authorization' : `Bearer ${this.$store.getters.token.login.token}`
                }
            }

            axios.get(this.url,config)
                .then((response) => {
                        this.listItens = response.data
                })
                .catch((e) => {
                    this.displayAlert = 'd-inline'
                    this.typeAlert = 'danger'
                    this.msgAlert = 'Erro ao tentar editar os dados! - Status: '+ e.response.status
                })
        },
        apagar(id){
            let url = `http://127.0.0.1:8000/api/destroy/user/${id}`
            let config = {
                headers:{
                    'Content-Type' : 'multipart/form-data',
                    'Accept' : 'application/json',
                    'Authorization' : `Bearer ${this.$store.getters.token.login.token}`
                }
            }
            axios.delete(url,config)
                .then((response) => {
                    this.listar()
                })
                .catch((e) => {
                    console.log(e.message)
                })
        }
    }

}
</script>

<style>

</style>