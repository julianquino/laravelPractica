<template>
    <div>
        <div v-if="editMode">       
            <div class="col-md-4">
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <form @submit.prevent="editSubsidiary(newEditSubsidiary)">
                            Nombre de la Sucursal:<br/>
                            <input type="text" class="form-control" v-model="newEditSubsidiary.name">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    Dirección de la Sucursal:<br/>
                                    <input type="text" class="form-control" v-model="newEditSubsidiary.address">
                                </li>
                            </ul>
                            <div>
                                <button class="btn btn-success btn-block" type="submit">Enviar</button>
                                <button class="btn btn-secondary btn-block" v-on:click="cancel()">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>ID_Sucursal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(subsidiary, index) in subsidiaries">
                        
                        <td>{{subsidiary.name}}</td>
                        <td>{{subsidiary.address}}</td>
                        <td>{{subsidiary.id}}</td>
                        <td>
                            <div class="btn-group">
                                 <button class="btn btn-secondary" v-on:click="editSubsidiaryMode(subsidiary,index)">Editar</button>
                                 <button class="btn btn btn-danger" v-on:click="deleteSubsidiary(subsidiary,index)">Eliminar</button>      
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['subsidiaries'],
        data(){
            return {
                editMode: false,
                editIndex: null,
                newEditSubsidiary: null,
            }
        },
        created: function(){

        },
        methods: {
            editSubsidiaryMode: function(subsidiary,index){
                this.editMode = true;
                this.editIndex = index;
                this.newEditSubsidiary = Object.assign({}, subsidiary);
            },
            deleteSubsidiary: function(subsidiary,index){
                this.$emit('delete',subsidiary,index);
            },
            editSubsidiary: function (newEditSubsidiary){
                this.editMode = false;
                this.$emit('edit',newEditSubsidiary,this.editIndex)
            },
            cancel: function(){
                this.editMode = false;
            }
        }
    }
</script>