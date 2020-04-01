<template>
    <div align="center" v-if="loadingUser">
        <div class="content-header">
            <div class="container-fluid">
                <div v-if="addingSubsidiary">
                    <h1 class="m-0 text-dark">Crear Sucursal</h1>
                </div>
                <div v-else class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Lista de todas las Sucursales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">  
                            <button class="btn btn-primary" v-on:click="addSubsidiary()">Agregar Sucursal</button>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div align="center" v-if="addingSubsidiary">
           <subsidiarycreate-component @cancel="createCancel()" @create="createSubsidiary(...arguments)"></subsidiarycreate-component>
        </div>
        <div v-else>
            <subsidiaryindex-component v-if="subsidiaries" :subsidiaries="subsidiaries" @delete="deleteSubsidiary(...arguments)" @edit="updateSubsidiary(...arguments)"></subsidiaryindex-component>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                subsidiaries: null,
                loadingUser: false,
                user: null,
                addingSubsidiary: false,
                loadingUser: false,
            }
        },
        created: function(){
            this.getUser();
            this.getSubsidiaries();
        },
        methods: {
            getSubsidiaries: function(){
                var url = ''
            },
            getUser: function() {
                var urlAuth = '/authUser';
                axios.get(urlAuth).then(response =>{
                    this.loadingUser = true
                    this.user = response.data
                });
            },
            getSubsidiaries: function(){
                var urlSubsidiaries = '/subsidiaries';
                axios.get(urlSubsidiaries).then(response =>{
                    this.subsidiaries = response.data
                });
            },
            addSubsidiary: function(){
                this.addingSubsidiary = true;
            },
            createCancel: function(){
                this.addingSubsidiary = false;
            },
            createSubsidiary: function(newSubsidiary){
                var urlSubsidiaries = '/subsidiaries'
                axios.post(urlSubsidiaries,newSubsidiary).then(response =>{
                    this.addingSubsidiary = false
                    this.subsidiaries.push(response.data);
                }).catch(error => console.log(error));
            },
            updateSubsidiary: function(newEditSubsidiary,index){
                var urlSubsidiaries = '/subsidiaries' + '/' + newEditSubsidiary.id;
                axios.put(urlSubsidiaries,newEditSubsidiary).then(response =>{
                    this.subsidiaries.splice(index, 1,response.data);
                })
            },
            deleteSubsidiary: function(subsidiary,index){
                var urlSubsidiaries = '/subsidiaries' +'/'+ subsidiary.id
                axios.delete(urlSubsidiaries).then( () => {
                    this.subsidiaries.splice(index, 1);
                })
            }
        }

    }
</script>