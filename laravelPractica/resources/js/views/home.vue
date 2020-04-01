<template>
	<div v-if="loadingUser">
        <div v-if="userHasCompany()">
            <h1>Turneras</h1>
            <!--<shift-component v-for="shift in shifts" :key="shift.id" :shift="shift" @update="updateShifts(...arguments)"></shift-component>-->
        </div>
        <div align="center" v-else>
            <h1>No Tiene una compañia</h1>
            <router-link tag="a" to="/companies" class="btn btn-success">
                <h1>Crear Compañia</h1>
            </router-link>
        </div>
	</div>
</template>
<script>
	export default {
        data(){
            return {
                shifts:[],
                user: Object,
                loadingUser: false,
            }
        },
        created: function(){
            //this.getShifts();
            this.getUser();
        },
        methods: {
            getShifts: function(){
                var urlShifts = '/shifts';
                axios.get(urlShifts).then(response =>{
                    this.shifts = response.data
                })

            },
            userHasCompany: function(){
                if(this.user.company_id)
                    return true;
                else
                    false;
            },
            getUser: function(){
                var urlAuth = '/authUser';
                axios.get(urlAuth).then(response =>{
                    this.loadingUser = true
                    this.user = response.data
                });
            },
            updateShifts: function(shift){
                var urlupdate='shifts/' + shift.id;
                if ( shift.turn == 99)
                   shift.turn = 1;
                else
                   shift.turn = shift.turn +1;
                const params = {turn: shift.turn};
                axios.put(urlupdate,params).then(response =>{
                    this.shift = response.data;
                    this.getTasks();
                })
            },
        }
        
    }
</script>