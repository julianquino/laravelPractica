<template>
	<div>
  		<li>
	  		<div class="small-box bg-light">
                <div class="inner">
	                <h3>{{ shift.prefix }}{{ shift.turn }}</h3>

	                <p>Turno: {{ shift.name }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="wrapper">
                    <form @submit.prevent="increaseShift(shift)">
                        <button class="fas fa-arrow-alt-circle-up">
                        Aumentar Turno 
                        </button>
                    </form>
                </div>
	        </div>
        </li>
	</div>
</template>
<script>
	export default {
        props: ['shift'],
        data(){
            return {
                shift: [],
            }
        },
        methods: {
            increaseShift: function(shift){
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
<style>
    .wrapper {
        text-align: center;
    }
</style>