<template>
    <div v-if="loadingUser"> 
        <div v-if="userHasCompany()">
            <div align="center" v-if="hasCompany">
                <h1>Compañia</h1>
                <companyshow-component v-bind:company="company" v-if="company" @update="updateCompany( ...arguments)"></companyshow-component>
            </div>
            <div align="center" v-else>
                <div class="col-sm-6">
                    <h1>Crear Compañia</h1>
                </div>
                <companycreate-component :user="user" v-if="user" @create="createCompany(...arguments)"></companycreate-component>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                company: null,
                user: null,
                hasCompany: false,
                loadingUser: false,
                id: '',
            }
        },
        created: function(){
            this.getUser();
        },
        methods: {
            getCompany: function(){
                var urlCompany = '/companies/' + this.user.company_id;
                this.id = this.user.company_id;
                axios.get(urlCompany).then(response =>{
                    this.hasCompany = true
                    this.company = response.data
                })
            },
            updateCompany: function(editCompany){
                var urlCompanyUpdate = '/companies/' + editCompany.id;
                axios.put(urlCompanyUpdate,editCompany).then(response =>{
                    this.company = response.data;
                })
            },
            userHasCompany: function(){
                if(this.user.company_id){
                    this.hasCompany = true
                    this.getCompany()
                }
                return true;
            },
            getUser: function(){
                var urlAuth = '/authUser';
                axios.get(urlAuth).then(response =>{
                    this.loadingUser = true
                    this.user = response.data
                }).catch(error => console.log(error));
            },
            createCompany: function(newCompany){
                var urlCompany = '/companies';
                axios.post(urlCompany,newCompany).then(response =>{
                    this.hasCompany = true
                    this.company = response.data
                }).catch(error => console.log(error));
            },
        }
        
    }
</script>