<template>
	<div class="col-md-4">
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
            	<form @submit.prevent="create(newSucursal)">
	                Nombre de la Sucursal:<br/>
	                <input type="text" class="form-control" pLaceHolder="Nombre" v-model="newSucursal.name">
	                <ul class="list-group list-group-unbordered mb-3">
	                    <li class="list-group-item">
	                        Dirección de la Sucursal:<br/>
	                        <input type="text" class="form-control" pLaceHolder="Dirección" v-model="newSucursal.address">
	                    </li>
	                </ul>
	                <div>
	                    <button class="btn btn-success btn-block" type="submit">Crear</button>
                    	<button class="btn btn-secondary btn-block" v-on:click="cancel()">Cancelar</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
	export default{
		data(){
			return {
				newSucursal: {
					name: '',
					address: '',
				},
			}
		},
		created: function(){

		},
		methods: {
			cancel: function(){
				this.$emit('cancel');
			},
			create: function(newSucursal){
				this.$emit('create',newSucursal);
			}
		}
	}
</script>