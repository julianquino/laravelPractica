<template>
	<div class="col-md-4">
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
            	<form @submit.prevent="createCompany(newCompany,user.id)">
	                <div class="text-center"> 
	                </div>
	                Nombre de la compañia:<br/>
	                <input type="text" class="form-control" pLaceHolder="Nombre" v-model="newCompany.name">

	                <ul class="list-group list-group-unbordered mb-3">
	                    <li class="list-group-item">
	                        Descripcion de la compañia:<br/>
	                        <input type="text" class="form-control" pLaceHolder="Descripcion" v-model="newCompany.description">
	                    </li>
	                </ul>
	                <div>
	                    <button class="btn btn-success btn-block" type="submit">Crear</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['user'],
        data(){
            return {
                newCompany:{
                	name: '',
                	description: '',
                	logo: '',
                },
            }
        },
        methods: {
            createCompany: function(newCompany,id){
                this.$emit('create',newCompany);
            },
        }   
    }
</script>