<template>
  <div class="register-user">
    <form-edit-register-user-component 
      :title="title"
      :edit="idUser"
    />
  </div>
</template>

<script>
export default {
  props:['idUser'],
  computed:{
    title(){
      if(this.idUser){
        return 'Editar Conta'
      }else{
        return 'Criar Conta'
      }
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