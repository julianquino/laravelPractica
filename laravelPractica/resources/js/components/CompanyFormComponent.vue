<template>
	<div class="col-md-4">
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
            	<form @submit.prevent="create()">
	                <div class="text-center"> 
	                </div>
	                Nombre de la compañia:<br/>
	                <input type="text" class="form-control" pLaceHolder="Nombre" v-model="company.name">

	                <ul class="list-group list-group-unbordered mb-3">
	                    <li class="list-group-item">
	                        Descripcion de la compañia:<br/>
	                        <input type="text" class="form-control" pLaceHolder="Descripcion" v-model="company.description">
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
                company:{
                	id: '',
                	owner_id: '',
                	name: '',
                	description: '',
                	logo: '',
                },
            }
        },
        methods: {
            create: function(){
            	this.company.owner_id = this.user.id;
            	//alert(this.company.owner_id)
            	var urlCompany = '/companies';
            	axios.post(urlCompany,this.company).then(response =>{
            		this.company = response.data;
            		this.getTasks();
            	});
            	var urlNext = '/dasboar' + this.company.id;
            	this.$router.push(urlNext);
            },
        }   
    }
</script>