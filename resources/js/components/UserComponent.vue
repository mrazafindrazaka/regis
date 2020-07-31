<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                Page des régisseurs
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <button class="btn btn-success" v-on:click="redirect_path('/user/create')">Création</button>
            </div>
            <div class="col-12 mt-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Prénom NOM du régisseur</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type du régisseur</th>
                        <th scope="col">Crée le</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in list" :key="item.id">
                        <td v-if="item.id !== user.id">{{item.name}}</td>
                        <td v-if="item.id !== user.id">{{item.email}}</td>
                        <td v-if="item.id !== user.id && item.is_admin">Régisseur principal</td>
                        <td v-if="item.id !== user.id && !item.is_admin">Régisseur suppléant</td>
                        <td v-if="item.id !== user.id">{{item.created_at | moment("DD/MM/YYYY à HH:mm")}}</td>
                        <td v-if="item.id !== user.id">
                            <button class="btn btn-danger" v-on:click="delete_user(item.id)">Supprimer</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['user'],
        data: function () {
            return {
                list: []
            };
        },
        methods: {
            delete_user: function (id) {
                let conf = confirm('Souhaitez-vous vraiment supprimer ce régisseur?');

                if (conf === true) {
                    axios.delete('/users/' + id).then(res => {
                        axios.get('/users').then(res => {
                            this.list = res.data;
                        });
                    });
                }
            }
        },
        created() {
            axios.get('/users').then(res => {
               this.list = res.data;
            });
        }
    }
</script>

<style scoped lang="scss">

</style>
