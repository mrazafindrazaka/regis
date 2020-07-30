<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-sm-12 mb-3">
                <div class="row text-center mb-3">
                    <div class="col-2">Date</div>
                    <div class="col-4">Nom et prénom du défunt</div>
                    <div class="col-4">Désignation des frais</div>
                    <div class="col-2">Montant</div>
                </div>
                <div class="row" v-for="(line, index) in info" :key="index">
                    <div class="col-2 form-group">
                        <label class="hide-label" :for="'date' + index"></label>
                        <input type="date" :id="'date' + index" class="form-control" v-model="line.date">
                    </div>
                    <div class="col-4 form-group">
                        <label class="hide-label" :for="'name' + index"></label>
                        <input type="text" :id="'name' + index" class="form-control" v-model="line.name">
                    </div>
                    <div class="col-4 form-group">
                        <label class="hide-label" :for="'designation' + index"></label>
                        <input type="text" :id="'designation' + index" class="form-control" v-model="line.designation">
                    </div>
                    <div class="col-2 form-group">
                        <label class="hide-label" :for="'montant' + index"></label>
                        <input type="number" :id="'montant' + index" class="form-control" v-model="line.montant"
                               @input="calc">
                    </div>
                </div>
                <div class="row">
                    <div class="offset-10 col-2 form-group">
                        <label class="hide-label" for="total"></label>
                        <input type="number" id="total" class="form-control" v-model="total" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <label for="nfact">FACTURE N°</label>
                                <input type="text" id="nfact" class="form-control" v-model="number_facture" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <label class="hide-label" for="description"></label>
                                <textarea class="form-control" id="description" v-model="description"
                                          rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <label for="regisseur">Le Régisseur : </label>
                                <input type="text" id="regisseur" class="form-control" v-model="regisseur" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button v-if="user.name === regisseur" class="btn btn-danger mr-3" v-on:click="update_facture">
                                    Modifier la facture
                                </button>
                                <button class="btn btn-dark" v-on:click="redirect_path('/facture')">
                                    Retour au menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['user', 'id'],
        data: function () {
            return {
                number_facture: '',
                description: '',
                total: '',
                regisseur: '',
                info: [],
                stock: {}
            };
        },
        methods: {
            update_facture: function () {
                Object.assign(this.stock, {'info': this.info});
                Object.assign(this.stock, {'number_facture': this.number_facture});
                Object.assign(this.stock, {'description': this.description});
                Object.assign(this.stock, {'regisseur': this.regisseur});
                axios.put('/factures/' + this.id, this.stock).then(res => {
                    window.location.href = '/facture';
                });
            },
            calc: function () {
                let total = 0;

                for (let count = 0; count < 12; count++) {
                    if (this.info[count].montant !== '')
                        total += parseFloat(this.info[count].montant);
                }
                this.total = total;
            },
            init_all: function () {
                axios.get('/factures/' + this.id).then(res => {
                    let tmp = res.data;

                    this.description = tmp.description;
                    this.info = JSON.parse(tmp.info);
                    this.regisseur = tmp.regisseur;
                    this.number_facture = tmp.number_facture;
                    this.calc();
                }).catch(error => {
                    console.error(error);
                });
            }
        },
        created() {
            this.init_all();
        }
    }
</script>

<style scoped lang="scss">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    textarea {
        text-transform: uppercase;
    }

    .hide-label {
        display: none;
    }

    .text-handler {
        font-size: 0.7rem;
    }

    .f-between {
        display: flex;
        justify-content: space-between;
    }

    .f-end {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
</style>
