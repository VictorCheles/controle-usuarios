<template>
    <div class="login">
                
        <div class="container-fluid vh-100">
    
            <div class="" style="margin-top:100px">
                <alert-component
                    :type="typeAlert"
                    :class="displayAlert"
                >
                    {{msgAlert}}
                </alert-component>
                <div class="rounded d-flex justify-content-center">     
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                          
                            <h3 class="text-primary">Controle de Usuários</h3>
                        </div>
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" name="email" placeholder="Email" v-model="email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Senha" v-model="password">
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary text-center mt-2" type="button" @click="login()">
                                        Entrar
                                    </button>
                                </div>
                                  
                                <p class="text-center mt-5">Você possue cadastro?
                                    <span class="text-primary" ><router-link to="/register" class="text-decoration-none">Cadastrar-se</router-link></span>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            url: 'login',
            email:'',
            password:'',
            msgAlert:'',
            typeAlert:'',
            displayAlert:'d-none',
        }
    },
    methods:{
        login(){

            let formData = new FormData();
            formData.append('email',this.email)
            formData.append('password',this.password)

            let config = {
                headers:{
                    'Content-Type' : 'multipart/form-data',
                    'Accept' : 'application/json'
                }
            }

            axios.post(this.url,formData,config)
                .then((response) => {
                    this.$store.dispatch('token',response.data.access_token)
                    this.displayAlert = 'd-inline'
                    this.typeAlert = 'success'
                    this.msgAlert = 'Sucesso! Você será direcionado ao sistema!'
                    this.$router.push({name:'list'})
                })
                .catch((e) => {
                    this.displayAlert = 'd-inline'
                    this.typeAlert = 'danger'
                    this.msgAlert = 'Usuário ou Senha não conferem!'
                })
        }
    }
}
</script>

<style>

</style>