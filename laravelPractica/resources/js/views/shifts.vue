<template>
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Prefijo</th>
                    <th>Turno</th>
                    <th>ID_Turnera</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="shift in shifts">
                        <td>{{shift.name}}</td>
                        <td>{{shift.prefix}}</td>
                        <td>{{shift.turn}}</td>
                        <td>{{shift.id}}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary" name="edit">Edit
                                </button>
                                <button class="btn btn-danger" name="delete">Eliminar
                                 </button>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
        <div align="center">
            <form @submit.prevent="addShift(shift)">
                <div class="col-sm-6 card card-success card-outline">
                    <div class="text-center"> 
                            Nombre de la Turnera:<br/>
                            <input type="text" class="form-control" pLaceHolder="Nombre" v-model="shift.name">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    Prefijo:<br/>
                                    <input type="text" class="form-control" pLaceHolder="Prefijo" v-model="shift.prefix">
                                    Numero<br/>
                                    <input type="text" class="form-control" pLaceHolder="Numero" v-model="shift.turn">
                                    <div class="select" >
                                         Selecione Sucursal
                                        <select v-model="shift.subsidiary_id" :required="type == 2">
                                            <option v-for="subsidiary in subsidiaries" v-bind:value="subsidiary.id">{{ subsidiary.name }}</option>
                                        </select>
                                    </div>

                                </li>
                            </ul>
                            <div>
                                <button class="btn btn-success btn-block">Agregar</button>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                shifts: [],
                subsidiaries: [],
                shift: {
                    id: '',
                    name:'',
                    prefix: '',
                    turn: '',
                    subsidiary_id: '',
                    creator_id: '',
                },
                subsidiaryID: 0,
            }
        },
        created: function(){
            this.getShifts();
            this.getSubsidiaries();
        
        },
        methods: {
            getShifts: function(){
                var urlShifts = '/shifts';
                axios.get(urlShifts).then(response =>{
                    this.shifts = response.data
                })

            },
            getSubsidiaries: function(){
                var urlSubsidiaries = '/subsidiaries';
                axios.get(urlSubsidiaries).then(response =>{
                    this.subsidiaries = response.data
                })
            },
            addShift: function(shift){
                var urlShifts = 'shifts';
                axios.post('/shifts',shift).then(response =>{
                    this.shifts.push(response.data);
                    this.getTasks();
                });
                alert('se agrego');
            }
        }
    }
</script>