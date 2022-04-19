<template>
  <div class="register-user">
    <nav-bar-component />
    <div class="container-fluid vh-100">
      <div class="" style="margin-top:200px">
          <div class="rounded d-flex justify-content-center">
              <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                  <div class="text-center">
                      <h3 class="text-primary">Criar Conta</h3>
                  </div>
                  <div class="p-4">
                      <div class="input-group mb-3">
                          <span class="input-group-text bg-primary"><i
                                  class="bi bi-person-plus-fill text-white"></i></span>
                          <input type="text" class="form-control" name="name" placeholder="Nome Completo" v-model="name">
                      </div>
                      <div class="input-group mb-3">
                          <span class="input-group-text bg-primary"><i
                                  class="bi bi-envelope text-white"></i></span>
                          <input type="email" class="form-control" name="email" placeholder="Email" v-model="email">
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <div class="input-group mb-1">
                            <span class="input-group-text bg-primary">
                              <i class="bi bi-envelope text-white"></i></span>
                            <input type="email" class="form-control" name="telephone_ddd" placeholder="DDD" v-model="telephone_ddd">
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="input-group mb-3">
                            <span class="input-group-text bg-primary">
                              <i class="bi bi-envelope text-white"></i></span>
                            <input type="email" class="form-control" name="telephone" placeholder="Telefone" v-model="telephone">
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input class="form-check-input" type="checkbox" value="" name="telephone_whatsapp" id="flexCheckChecked" checked v-model="telephone_whatsapp">
                        <label class="form-check-label mx-2" for="flexCheckChecked">
                          Autoriza contato através do aplicativo WhatsApp
                        </label>
                      </div>
                      <div class="input-group mb-3">
                          <span class="input-group-text bg-primary">
                              <i class="bi bi-lock-fill text-white"></i></span>
                          <input type="password" class="form-control" name="password" placeholder="Senha" v-model="password">
                      </div>
                      <div class="input-group mb-3">
                          <span class="input-group-text bg-primary">
                              <i class="bi bi-unlock-fill text-white"></i>
                          </span>
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha">
                      </div>
                      <div class="input-group mb-3">
                        <label for="inputGroupFile04" class="form-label">Selecione uma imagem para o seu perfil:</label> 
                        <div class="input-group">
                          <input type="file" class="form-control" name="profile_picture" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" @change="profile_photo">
                        </div>
                      </div>
                      <div class="d-grid col-12 mx-auto">
                          <button class="btn btn-primary" type="button" @click="gravar()"><span></span> Gravar</button>
                      </div>
                      <p class="text-center mt-3">Já tem cadastro?
                          <span class="text-primary"><a href="/" class="text-decoration-none">Entrar</a></span>
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
      name:'',
      email:'',
      telephone_ddd:'',
      telephone:'',
      telephone_whatsapp:'',
      password:'',
      profile_photo:[],
    }
  },
  methods:{
    gravar(){
      console.log(this.name)
    }
  }
}
</script>

<style>
input[type=file]::-webkit-file-upload-button {
    background-color: #0d6efd;
    color: white;
}
</style>