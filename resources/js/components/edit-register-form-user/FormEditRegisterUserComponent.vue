<template>
  <div>
          <div class="container-fluid vh-100">
      <div class="" style="margin-top:100px">
        <alert-component
                    :type="typeAlert"
                    :class="displayAlert"
                >
                  <div>
                    {{msgAlert}}
                    <div v-if="msgErrors.especific">
                        <ul>
                          <li v-for="erro,key in msgErrors.especific" :key="key"><strong>Campo: </strong>{{key.toUpperCase()}} - {{erro[0]}}</li>
                        </ul>
                    </div>
                  </div>
                </alert-component>
                
          <div class="rounded d-flex justify-content-center">
              <div class="col-md-6 col-sm-12 shadow-lg p-5 bg-light">
                  <div class="text-center">
                      <h3 class="text-primary">{{title}}</h3>
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
                        <input class="form-check-input" type="checkbox" value="1" name="telephone_whatsapp" id="flexCheckChecked" :checked="telephone_whatsapp" v-model="telephone_whatsapp">
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
                          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha" v-model="password_confirmation">
                      </div>
                      <div class="input-group mb-3">
                        <label for="inputGroupFile04" class="form-label">Selecione uma imagem para o seu perfil:</label> 
                        <div class="input-group">
                          <input type="file" class="form-control" name="profile_picture" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" @change="newFile">
                        </div>
                        <div class="mx-auto my-2 bg-photo-profile" v-if="photo" >
                          <img :src="'http://127.0.0.1:8000/storage/'+photo" width="150" alt="">
                        </div>
                        <div class="d-grid col-12 mx-auto" v-if="photo">
                          <p class="text-center">Imagem de Perfil</p>
                        </div>
                      </div>
                      <div class="d-grid col-12 mx-auto">
                          <button class="btn btn-primary" type="button" @click="enviar(id)"><span></span> Gravar</button>
                      </div>
                      <p class="text-center mt-3" v-if="!this.$store.getters.token.login.token">Já tem cadastro?
                          <span class="text-primary"><router-link to="/" class="text-decoration-none">Entrar</router-link></span>
                      </p>
                  </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                      <button type="button" class="btn btn-secondary"><router-link to="/list" class="text-decoration-none text-white">Voltar</router-link></button>
                    </div>
              </div>
          </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props:['title','edit'],
   data(){
    return{
      id:this.edit,
      name:'',
      email:'',
      telephone_ddd:'',
      telephone:'',
      telephone_whatsapp:0,
      password:'',
      password_confirmation:'',
      profile_photo:'',
      msgAlert:'',
      typeAlert:'',
      displayAlert:'d-none',
      msgErrors:'',
      photo:false
    }
  },
  watch:{
    edit(to,from){
      if(from == true){
        this.id=''
        this.name=''
        this.email=''
        this.telephone_ddd=''
        this.telephone=''
        this.telephone_whatsapp=0
        this.password=''
        this.password_confirmation=''
        this.profile_photo=''
        this.msgAlert=''
        this.typeAlert=''
        this.displayAlert='d-none'
        this.msgErrors=''
        this.photo=false
      }
    }
  },
  mounted(){
    this.dadosUser()
  },
  methods:{
    dadosUser() {
      if(!this.edit) return false
      this.consultUser(this.edit)
    },
    consultUser(id){
      let config = {
          headers:{
              'Content-Type' : 'multipart/form-data',
              'Accept' : 'application/json',
              'Authorization' : `Bearer ${this.$store.getters.token.login.token}`
          }
      }

      axios.get(`show/user/${id}`,config)
          .then((response) => {

            this.name = response.data.name
            this.email = response.data.email
            this.telephone_ddd = response.data.telephone_ddd
            this.telephone = response.data.telephone,
            this.telephone_whatsapp = response.data.telephone_whatsapp
            if(response.data.photo != null){
              this.photo = response.data.photo.url
            }
            
            
          })
          .catch((e) => {
              this.displayAlert = 'd-inline'
              this.typeAlert = 'danger'
              this.msgAlert = 'Erro ao tentar acessar os dados do usuário! - Status: '+ e.response.status
          })
    },
    newFile(event){
      if(event.target.files[0].size > 8388608){
            this.displayAlert = 'd-inline'
            this.typeAlert = 'danger'
            this.msgAlert = 'Erro! A imagem tem mais que 8MB'
            this.msgErrors = e.response.data.errors
            return false
      }
      this.profile_photo = event.target.files[0]
    },
    enviar(id){
      if(id){
        this.editar(id)
      }else{
        this.gravar()
      }
    },
    gravar(){
      let url = 'register/user'

      let config = {
          headers:{
              'Content-Type' : 'multipart/form-data',
              'Accept' : 'application/json',
          }
      }
      let formData = new FormData();
        formData.append('name',this.name)
        formData.append('email',this.email)
        formData.append('telephone_ddd',this.telephone_ddd)
        formData.append('telephone',this.telephone)
        formData.append('telephone_whatsapp',(this.telephone_whatsapp == false ? 0 : 1))
        formData.append('password',this.password)
        formData.append('password_confirmation',this.password_confirmation)
        formData.append('new_file',this.profile_photo)
      
      
      axios.post(url,formData,config)
        .then((response) => {
            this.displayAlert = 'd-inline'
            this.typeAlert = 'success'
            this.msgAlert = 'Sucesso! Registro realizado com sucesso!'
            setTimeout( () => this.$router.push({ name: 'index'}), 3000)
        })
        .catch((e) => {
            this.displayAlert = 'd-inline'
            this.typeAlert = 'danger'
            this.msgAlert = 'Erro ao tentar gravar os dados! - Status: '+ e.response.status
            this.msgErrors = e.response.data.errors
        })
    },
    editar(id){
      let url = `edit/user/${id}`
      let config = {
          headers:{
              'Content-Type' : 'multipart/form-data',
              'Accept' : 'application/json',
              'Authorization' : `Bearer ${this.$store.getters.token.login.token}`
          }
      }
      let formData = new FormData();
        formData.append('name',this.name)
        formData.append('email',this.email)
        formData.append('telephone_ddd',this.telephone_ddd)
        formData.append('telephone',this.telephone)
        formData.append('telephone_whatsapp',this.telephone_whatsapp)

        if(this.password !== ''){
          formData.append('password',this.password)
          formData.append('password_confirmation',this.password_confirmation)
        }
        
        formData.append('new_file',this.profile_photo)
      
      axios.post(url,formData,config)
        .then((response) => {
            this.displayAlert = 'd-inline'
            this.typeAlert = 'success'
            this.msgAlert = 'Sucesso! Edição realizada com sucesso!'
            this.consultUser(this.edit)
            
            //setTimeout( () => this.$router.push({ name: 'list'}), 3000)
        })
        .catch((e) => {
            this.displayAlert = 'd-inline'
            this.typeAlert = 'danger'
            this.msgAlert = 'Erro ao tentar editar os dados! - Status: '+ e.response.status
            this.msgErrors = e.response.data.errors
            setTimeout( () => this.$router.go(0), 2000)
        })
    }
  }
}
</script>

<style>
.bg-photo-profile{
  background-color: #ccc;
  padding: 15px;
  border-radius: 50% !important;
}
.bg-photo-profile img{
    border-radius: 50%;
}

</style>