<template>
<div>
    <div class="col-sm-6">
        <h1>Company</h1>
    </div>
    <div align="center">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        
                    </div>
                    Nombre de la compañia:<br/>
                    <h3 class="profile-username text-center">{{company.name}}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            Descripcion de la compañia:<br/>
                            <p style="font-size:160%;"><b>{{company.description}}</b></p>
                        <li class="list-group-item">
                            Dueño de la compañia:<br/>
                            <b>{{company.owner_id}}</b>
                        </li>
                    </ul>
                    <a href=" " class="btn btn-success btn-block"><b>Editar campos</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

    export default {
        data(){
            return {
                company:[],
            }
        },
        created: function(){
            this.getCompany();
        },
        methods: {
            getCompany: function(){
                var urlCompany = 'myCompany';
                axios.get(urlCompany).then(response =>{
                    this.company = response.data
                })

            }
        }
        
    }

</script>
