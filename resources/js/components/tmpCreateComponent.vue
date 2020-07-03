<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header text-center">Créer un reçu</div>

                    <div class="card-body">
                        <div class="row mb-3 f-between">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 f-end">Cimetière</div>
                                    <div class="col-8">
                                        <select v-model="info['cimetiere']" class="form-control">
                                            <option>de Préville</option>
                                            <option>du Sud</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 f-end">Concession</div>
                                    <div class="col-8">
                                        <input type="text" v-model="info['concession']" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Reçu de M/MME :</div>
                            <div class="col-9">
                                <input type="text" v-model="info['recu']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">La somme de :</div>
                            <div class="col-9">
                                <input type="text" v-model="info['somme']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 f-end">Détailler ci-après:</div>
                            <div class="offset-7 col-2 text-center">Montant</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Concession de sépulture pour une durée de :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['concessionsep']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['concessionsep_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Columbarium 1 case 2 urnes pour :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['colombarium1']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['columbarium1_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Columbarium 1 case 4 urnes pour :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['columbarium2']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['columbarium2_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Concession cinéraire pour une durée de :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['concessioncine']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['concessioncine_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Enregistrement :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['enregistrement']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['enregistrement_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Taxe inhumation :</div>
                            <div class="col-5">
                                <input type="text" v-model="info['inhumation']" class="form-control">
                            </div>
                            <div class="col-1">
                                <input type="number" v-model="info['inhumation_count']" class="form-control">
                            </div>
                            <div class="col-1 text-handler f-end">x 108.00€</div>
                            <div class="col-2">
                                <input type="number" v-model="info['inhumation_montant']" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Vacation de police :</div>
                            <div class="col-5">
                                <input type="text" v-model="info['vacation']" class="form-control">
                            </div>
                            <div class="col-1">
                                <input type="number" v-model="info['vacation_count']" class="form-control">
                            </div>
                            <div class="col-1 text-handler f-end">x 20.00€</div>
                            <div class="col-2">
                                <input type="number" v-model="info['vacation_montant']" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Caveau désaffecté de :</div>
                            <div class="col-2">
                                <input type="number" v-model="info['caveau_count']" class="form-control">
                            </div>
                            <div class="col-1 text-handler f-end">cases</div>
                            <div class="col-4">
                                <input type="text" v-model="info['caveau']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['caveau_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Vente de monument désaffecté :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['monument']" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['monument_montant']" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-10 text-handler f-end">
                                Total
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="info['total_montant']" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Le régisseur :</div>
                            <div class="col-7">
                                <input type="text" v-model="info['regisseur']" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Mode de paiement
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" v-model="checked"
                                                   id="espece"
                                                   value="espece">
                                            <label class="form-check-label" for="espece">Espèces</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" v-model="checked"
                                                   id="virement"
                                                   value="virement">
                                            <label class="form-check-label" for="virement">Virement</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" v-model="checked"
                                                   id="cheque"
                                                   value="cheque">
                                            <label class="form-check-label" for="cheque">Chèque</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" v-model="checked" id="cb"
                                                   value="cb">
                                            <label class="form-check-label" for="cb">Cb</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>Numéro</div>
                                        <input type="text" v-model="info['numero']" class="form-control mb-3">
                                    </div>
                                    <div class="col-12">
                                        <div>Banque</div>
                                        <input type="text" v-model="info['banque']" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-danger mr-3" v-on:click="create_regis">Créer le reçu</button>
                                <button class="btn btn-dark" v-on:click="redirect_path('/')">Retour au menu</button>
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
        props: ['user'],
        data: function () {
            return {
                stock: {},
                info: [],
                checked: []
            };
        },
        methods: {
            create_regis: function () {
                Object.assign(this.stock, {'cimetiere': this.info['cimetiere']});
                Object.assign(this.stock, {'concession': this.info['concession']});
                Object.assign(this.stock, {'recu': this.info['recu']});
                Object.assign(this.stock, {'somme': this.info['somme']});
                Object.assign(this.stock, {'concessionsep': this.info['concessionsep']});
                Object.assign(this.stock, {'concessionsep_montant': this.info['concessionsep_montant']});
                Object.assign(this.stock, {'columbarium1': this.info['columbarium1']});
                Object.assign(this.stock, {'columbarium1_montant': this.info['columbarium1_montant']});
                Object.assign(this.stock, {'columbarium2': this.info['columbarium2']});
                Object.assign(this.stock, {'columbarium2_montant': this.info['columbarium2_montant']});
                Object.assign(this.stock, {'concessioncine': this.info['concessioncine']});
                Object.assign(this.stock, {'concessioncine_montant': this.info['concessioncine_montant']});
                Object.assign(this.stock, {'enregistrement': this.info['enregistrement']});
                Object.assign(this.stock, {'enregistrement_montant': this.info['enregistrement_montant']});
                Object.assign(this.stock, {'inhumation': this.info['inhumation']});
                Object.assign(this.stock, {'inhumation_count': this.info['inhumation_count']});
                Object.assign(this.stock, {'inhumation_montant': this.info['inhumation_montant']});
                Object.assign(this.stock, {'vacation': this.info['vacation']});
                Object.assign(this.stock, {'vacation_count': this.info['vacation_count']});
                Object.assign(this.stock, {'vacation_montant': this.info['vacation_montant']});
                Object.assign(this.stock, {'caveau_count': this.info['caveau_count']});
                Object.assign(this.stock, {'caveau': this.info['caveau']});
                Object.assign(this.stock, {'caveau_montant': this.info['caveau_montant']});
                Object.assign(this.stock, {'monument': this.info['monument']});
                Object.assign(this.stock, {'monument_montant': this.info['monument_montant']});
                Object.assign(this.stock, {'total_montant': this.info['total_montant']});
                Object.assign(this.stock, {'regisseur': this.info['regisseur']});
                Object.assign(this.stock, {'paiement': this.checked});
                Object.assign(this.stock, {'numero': this.info['numero']});
                Object.assign(this.stock, {'banque': this.info['banque']});
                axios.post('/infos', this.stock).then(res => {
                    alert('Reçu créer !')
                });
            }
        },
        created() {
            this.info['regisseur'] = this.user.name;
            this.info['cimetiere'] = '';
            this.info['concession'] = '';
            this.info['recu'] = '';
            this.info['somme'] = '';
            this.info['concessionsep'] = '';
            this.info['concessionsep_montant'] = '';
            this.info['columbarium1'] = '';
            this.info['columbarium1_montant'] = '';
            this.info['columbarium2'] = '';
            this.info['columbarium2_montant'] = '';
            this.info['concessioncine'] = '';
            this.info['concessioncine_montant'] = '';
            this.info['enregistrement'] = '';
            this.info['enregistrement_montant'] = '';
            this.info['inhumation'] = '';
            this.info['inhumation_count'] = '';
            this.info['inhumation_montant'] = '';
            this.info['vacation'] = '';
            this.info['vacation_count'] = '';
            this.info['vacation_montant'] = '';
            this.info['caveau_count'] = '';
            this.info['caveau'] = '';
            this.info['caveau_montant'] = '';
            this.info['monument'] = '';
            this.info['monument_montant'] = '';
            this.info['total_montant'] = '';
            this.info['numero'] = '';
            this.info['banque'] = '';
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
