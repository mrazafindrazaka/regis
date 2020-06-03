<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Créer un reçu</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-2 text-handler">Cimetière</div>
                            <div class="col-4">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2 text-handler">Concession</div>
                            <div class="col-4">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Reçu de M/MME :</div>
                            <div class="col-9">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">La somme de :</div>
                            <div class="col-9">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">Détailler ci-après:</div>
                            <div class="offset-7 col-2 text-center">Montant</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Concession de sépulture pour une durée de :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['concessionsep']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['concessionsep_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Columbarium 1 case 2 urnes pour :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Columbarium 1 case 4 urnes pour :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Concession cinéraire pour une durée de :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Enregistrement :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Taxe inhumation :</div>
                            <div class="col-5">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-1">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-1 text-handler">x 108.00€</div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Vacation de police :</div>
                            <div class="col-5">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-1">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-1 text-handler">x 20.00€</div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Caveau désaffecté de :</div>
                            <div class="col-2">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-1 text-handler">cases</div>
                            <div class="col-4">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Vente de monument désaffecté :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="offset-10 col-2">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler">Le régisseur :</div>
                            <div class="col-7">
                                <input type="number" v-model="info['']" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" v-on:click="create_regis">Créer le reçu</button>
                    </div>
                </div>
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
                test: {},
                info: []
            };
        },
        methods: {
            create_regis: function () {
                Object.assign(this.test, {'concession': this.info['concession']});
                Object.assign(this.test, {'concession_price': this.info['concession_montant']});
                axios.post('/test', this.test).then(res => {
                    console.log(res.data);
                });
            }
        },
        mounted() {
            /*let test = {"hello": "world"};
            console.log('Component mounted.');
            axios.post('/test', test).then(res => {
               console.log(res.data);
            });
            axios.get('/test').then(res => {
                res.data.forEach(el => {
                    el.info = JSON.parse(el.info);
                });
                this.test = res.data;
            }); */
        }
    }
</script>
<style scoped lang="scss">
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .text-handler {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        font-size: 0.7rem;
    }
</style>
