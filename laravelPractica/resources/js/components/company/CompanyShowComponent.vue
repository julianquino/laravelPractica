<template>
    <div class="col-md-4">
        <!-- Company Image -->
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
                <div class="text-center">   
                </div>
                Nombre de la compañia:<br/>
                <input type="text" class="" v-if="editMode" v-model="editCompany.name">
                <h3 class="profile-username text-center" v-else>{{company.name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        Descripcion de la compañia:<br/>
                        <input type="text" class="" v-if="editMode" v-model="editCompany.description">
                        <p v-else><b>{{company.description}}</b></p>
                    <li class="list-group-item" v-if="loadingOwner">
                        Dueño de la compañia:<br/>
                        <b>{{owner.name}}</b>
                    </li>
                </ul>
                <div v-if="editMode">
                    <button class="btn btn-success btn-block" v-on:click="onClickUpdate(editCompany)">Guardar</button>
                    <button class="btn btn-secondary btn-block" v-on:click="onClickCancelar()">Cancelar</button>
                </div>
                <button v-else class="btn btn-success btn-block" v-on:click="onClickEdit()">Editar campos</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['company'],
        data(){
            return {
                owner: Object,
                editMode: false,
                editCompany: Object,
                loadingOwner: false,
                owner_id: '',
            }
        },
        created: function(){
            this.getOwner();
        },
        methods:{
            getOwner: function(){
                var urlUser = '/users/' + this.company.owner_id;
                this.owner_id = this.company.owner_id
                axios.get(urlUser).then(response =>{
                    this.loadingOwner = true
                    this.owner = response.data
                })
            },
            onClickEdit: function(){
                this.editCompany = this.company;
                this.editMode = true;
            },
            onClickUpdate: function(editCompany){
                this.editMode = false;
                this.$emit('update',editCompany)
            },
            onClickCancelar: function(){
                this.editMode = false;
            },
        }
    }
</script>