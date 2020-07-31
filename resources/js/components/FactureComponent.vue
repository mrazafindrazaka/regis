<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                Page des factures
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <button class="btn btn-success" v-on:click="redirect_path('/facture/create')">Création</button>
            </div>
            <div class="col-12 mt-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Référence</th>
                        <th scope="col">Crée le</th>
                        <th scope="col">Modifié le</th>
                        <th scope="col">Régisseur</th>
                        <th scope="col">État</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in list" :key="item.id">
                        <td scope="row">{{item.number_facture}}</td>
                        <td>{{item.created_at | moment("DD/MM/YYYY à HH:mm")}}</td>
                        <td>{{item.updated_at | moment("DD/MM/YYYY à HH:mm")}}</td>
                        <td>{{item.regisseur}}</td>
                        <td v-if="item.active === 1">Actif</td>
                        <td v-if="item.active === 0">Annulé</td>
                        <td>
                            <button class="btn btn-dark" v-on:click="redirect_path('/facture/details/' + item.id)">Détail</button>
                            <button class="btn btn-danger" v-if="item.regisseur === user.name && item.active === 1" v-on:click="desactivate(item.id, item)">Annuler</button>
                            <button class="btn btn-primary" v-on:click="generate_pdf(item, 'facture')">Imprimer</button>
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
            desactivate: function (id, item) {
                let conf = confirm('Souhaitez-vous vraiment annuler cette facture?');

                if (conf === true) {
                    axios.delete('/factures/' + id).then(res => {
                        axios.get('/factures').then(res => {
                            this.list = res.data;
                            this.list.forEach(el => {
                                el.info = JSON.parse(el.info);
                            });
                            item.active = 0;
                            this.generate_pdf(item, 'facture');
                        });
                    });
                }
            }
        },
        created() {
            axios.get('/factures').then(res => {
               this.list = res.data;
               this.list.forEach(el => {
                  el.info = JSON.parse(el.info);
               });
            });
        }
    }
</script>
<style scoped lang="scss">

</style>
