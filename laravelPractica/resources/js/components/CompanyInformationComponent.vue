<template>
    <div class="col-md-4">
        <!-- Profile Image -->
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
                <div class="text-center">   
                </div>
                Nombre de la compañia:<br/>
                <input type="text" class="" v-if="editMode" v-model="company.name">
                <h3 class="profile-username text-center" v-else>{{company.name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        Descripcion de la compañia:<br/>
                        <input type="text" class="" v-if="editMode" v-model="company.description">
                        <p v-else><b>{{company.description}}</b></p>
                    <li class="list-group-item">
                        Dueño de la compañia:<br/>
                        <b>{{getOwnerName(company.owner_id)}}</b>
                    </li>
                </ul>
                <div v-if="editMode">
                    <button class="btn btn-success btn-block" v-on:click="onClickUpdate(company)">Guardar</button>
                    <button class="btn btn-secondary btn-block" v-on:click="onClickCancelar()">Cancelar</button>
                </div>
                <button class="btn btn-success btn-block" v-on:click="onClickEdit()" v-else>Editar campos</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        //-----------------------------------------fijarse por que no se puede usar un this.company
        props: {
            company: Object,
        },
        data(){
            return {
                owner: [],
                editMode: false,
            }
        },
        methods:{
            getOwnerName: function(id){
                var urlUser = '/users/' + id;
                axios.get(urlUser).then(response  => {
                    this.owner = response.data
                })

                return this.owner.name;
            },
            onClickEdit: function(){
                this.editMode = true;
            },
            onClickUpdate: function(company){
                this.editMode = false;
                this.$emit('update',company)
            },
            onClickCancelar: function(){
                this.editMode = false;
            },
        }
    }
</script>