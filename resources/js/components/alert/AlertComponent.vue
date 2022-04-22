<template>
  <div>
    <div :class="estilo"  style="max-width:90%" role="alert">
        <slot></slot>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
</template>

<script>
export default {
    props:['type'],
    computed:{
      estilo(){
        return 'alert alert-'+ this.type +' d-flex justify-content-center mx-auto alert-dismissible fade show'
      }
    }
}
</script>

<style>
.alert {
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}
</style>