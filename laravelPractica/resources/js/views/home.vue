<template>
	<div>
  		<shift-component v-for="shift in shifts" :key="shift.id" :shift="shift"></shift-component>
	</div>
</template>
<script>
	export default {
        data(){
            return {
                shifts:[],
            }
        },
        created: function(){
            this.getShifts();
        },
        methods: {
            getShifts: function(){
                var urlShifts = 'shifts';
                axios.get(urlShifts).then(response =>{
                    this.shifts = response.data
                })

            },
        }
        
    }
</script>