<template>
<div align="center">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="card-img-top" style="width:150px; height:150px;" v-bind:src="'/' + company.logo" alt=" ">
                </div>

                <h3 class="profile-username text-center">{{company.name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>{{ company.description }}</b>
                    <li class="list-group-item">
                        <b>{{ company.owner_id }}</b>
                    </li>
                </ul>
                <a :href="route('home')" class="btn btn-success btn-block"><b>Editar campos</b></a>
            </div>
        </div>
    </div>
</div>
</template>
<script>

    export default {
        props: {
            company: {
                id: Number,
                name: String,
                owner_id: Number,
                description: String,
                logo: String
            },
        },
        data() {
            return {

            }
        },
        methods: {
            companyEditUrl() {
                return route('company')
            },
        }

    }
</script>