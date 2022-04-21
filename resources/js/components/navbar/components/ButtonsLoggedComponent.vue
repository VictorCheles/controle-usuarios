<template>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll " style="--bs-scroll-height: 100px;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{this.user.name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><button type="button" class="btn btn-link" @click="logout()">Logout</button></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sistema
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><router-link to="/list" class="text-decoration-none"><a class="dropdown-item" href="#">Lista de Usuários</a></router-link></li>
                </ul>
            </li>
        </ul>
        <!-- Button trigger modal -->

    </div>
</template>

<script>
export default {
    data(){
        return{
            user:'',
            url:'http://127.0.0.1:8000/api/me'
        }
    },
    methods:{
        logout(){
            this.$store.dispatch('tokenLogout',false)
            this.$router.push({name: 'index'});
        }
    },
    mounted(){
        
            let config = {
                headers:{
                    'Content-Type' : 'multipart/form-data',
                    'Accept' : 'application/json',
                    'Authorization' : `Bearer ${this.$store.getters.token.login.token}`
                }
            }
            axios.get(this.url,config)
                .then((response) => {
                        this.user = response.data
                })
                .catch((e) => {
                    console.log(e.message)
                })
    }
}
</script>

<style>

</style>


    
    