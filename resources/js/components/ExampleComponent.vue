<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Componente - Olá {{dados_user.name}}</div>

                    <div class="card-body">
                        I'm an example componentfdf.

                        {{ $store.state.teste}}
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
                dados_user:''
            }
        },
        mounted() {
            let config={
                headers:{
                    'Content-Type' : 'multipart/form-data',
                    'Accept' : 'application/json',
                    'Authorization' : 'Bearer eyJ0eXAiOiJKV1QirLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY1MDM5MTQ1OCwiZXhwIjoxNjUwMzk1MDU4LCJuYmYiOjE2NTAzOTE0NTgsImp0aSI6ImNpbWd3bUpGNVhaVjd0TlgiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.r2nOOT7Ctib4C7Cy8Ju1A_PfMb2Nmu5VVi9dKLSCciA'
                }
            }
            axios.get('http://127.0.0.1:8000/api/me',config)
                .then((response)=>{
                    this.dados_user = response.data
                })
                .catch((e)=>{
                    console.log(e.message)
                })

        }
    }
</script>
