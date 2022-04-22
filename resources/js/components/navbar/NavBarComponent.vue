<template>
    <div class="nav-bar-component">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <div class="container-fluid">
             <a class="navbar-brand mx-2" href="#">
                <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
               Controle de Usuários |
            </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ButtonLogged  v-if="this.$store.getters.token.login.token"/>
                <ButtonLoggedOut  v-else/>
            </div>
        </nav>
    </div>
</template>

<script>
import ButtonLogged from './components/ButtonsLoggedComponent.vue'
import ButtonLoggedOut from './components/ButtonsLoggedOutComponent.vue'

export default {
    components:{ButtonLogged,ButtonLoggedOut}
}
</script>

<style>

</style>