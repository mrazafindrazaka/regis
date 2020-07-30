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
                                    <div class="col-4 f-end">N° de facture</div>
                                    <div class="col-8">
                                        <input type="text" v-model="num_facture" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 f-end">Cimetière</div>
                                    <div class="col-8">
                                        <select v-model="cimetiere" class="form-control">
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
                                        <input type="text" v-model="concession" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Reçu de M/MME :</div>
                            <div class="col-9">
                                <input type="text" v-model="recu" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">La somme de :</div>
                            <div class="col-9">
                                <input type="text" v-model="somme" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 f-end">Détailler ci-après:</div>
                            <div class="offset-7 col-2 text-center">Montant</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Concession de sépulture pour une durée de :</div>
                            <div class="col-7">
                                <input type="text" v-model="concessionsep" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" pattern="[0-9]*" v-model="concessionsep_montant" @input="calc" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Columbarium 1 case 2 urnes pour :</div>
                            <div class="col-7">
                                <input type="text" v-model="columbarium1" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="columbarium1_montant" @input="calc" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Columbarium 1 case 4 urnes pour :</div>
                            <div class="col-7">
                                <input type="text" v-model="columbarium2" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="columbarium2_montant" @input="calc" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Concession cinéraire pour une durée de :</div>
                            <div class="col-7">
                                <input type="text" v-model="concessioncine" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="concessioncine_montant" @input="calc"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Enregistrement :</div>
                            <div class="col-7">
                                <input type="text" v-model="enregistrement" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="enregistrement_montant" @input="calc"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Taxe inhumation :</div>
                            <div class="col-5">
                                <input type="text" v-model="inhumation" class="form-control">
                            </div>
                            <div class="col-1">
                                <input type="number" v-model="inhumation_count" @input="calc" class="form-control">
                            </div>
                            <div class="col-1 text-handler f-end">x 108.00€</div>
                            <div class="col-2">
                                <input type="number" v-model="inhumation_montant" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Vacation de police :</div>
                            <div class="col-5">
                                <input type="text" v-model="vacation" class="form-control">
                            </div>
                            <div class="col-1">
                                <input type="number" v-model="vacation_count" @input="calc" class="form-control">
                            </div>
                            <div class="col-1 text-handler f-end">x 20.00€</div>
                            <div class="col-2">
                                <input type="number" v-model="vacation_montant" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Caveau désaffecté de :</div>
                            <div class="col-2">
                                <input type="number" v-model="caveau_count" class="form-control">
                            </div>
                            <div class="col-1 text-handler f-end">cases</div>
                            <div class="col-4">
                                <input type="text" v-model="caveau" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="caveau_montant" @input="calc" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Vente de monument désaffecté :</div>
                            <div class="col-7">
                                <input type="text" v-model="monument" class="form-control">
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="monument_montant" @input="calc" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-10 text-handler f-end">
                                Total
                            </div>
                            <div class="col-2">
                                <input type="number" v-model="total_montant" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-handler f-end">Le régisseur :</div>
                            <div class="col-7">
                                <input type="text" v-model="regisseur" class="form-control" disabled>
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
                                    <div class="col-12 mb-3">
                                        <div>Banque</div>
                                        <input type="text" v-model="banque" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <div>Numéro</div>
                                        <input type="number" v-model="numero" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-danger mr-3" v-on:click="create_regis">Créer le reçu</button>
                                <button class="btn btn-dark" v-on:click="redirect_path('/quittance')">Retour au menu</button>
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
                regisseur: this.user.name,
                cimetiere: '',
                concession: '',
                recu: '',
                somme: '',
                concessionsep: '',
                concessionsep_montant: '',
                columbarium1: '',
                columbarium1_montant: '',
                columbarium2: '',
                columbarium2_montant: '',
                concessioncine: '',
                concessioncine_montant: '',
                enregistrement: '',
                enregistrement_montant: '',
                inhumation: '',
                inhumation_count: '',
                inhumation_montant: '',
                vacation: '',
                vacation_count: '',
                vacation_montant: '',
                caveau_count: '',
                caveau: '',
                caveau_montant: '',
                monument: '',
                monument_montant: '',
                total_montant: '',
                numero: '',
                banque: '',
                num_facture: '',
                checked: []
            };
        },
        methods: {
            create_regis: function () {
                Object.assign(this.stock, {'cimetiere': this.cimetiere});
                Object.assign(this.stock, {'concession': this.concession});
                Object.assign(this.stock, {'recu': this.recu});
                Object.assign(this.stock, {'somme': this.somme});
                Object.assign(this.stock, {'concessionsep': this.concessionsep});
                Object.assign(this.stock, {'concessionsep_montant': this.concessionsep_montant});
                Object.assign(this.stock, {'columbarium1': this.columbarium1});
                Object.assign(this.stock, {'columbarium1_montant': this.columbarium1_montant});
                Object.assign(this.stock, {'columbarium2': this.columbarium2});
                Object.assign(this.stock, {'columbarium2_montant': this.columbarium2_montant});
                Object.assign(this.stock, {'concessioncine': this.concessioncine});
                Object.assign(this.stock, {'concessioncine_montant': this.concessioncine_montant});
                Object.assign(this.stock, {'enregistrement': this.enregistrement});
                Object.assign(this.stock, {'enregistrement_montant': this.enregistrement_montant});
                Object.assign(this.stock, {'inhumation': this.inhumation});
                Object.assign(this.stock, {'inhumation_count': this.inhumation_count});
                Object.assign(this.stock, {'inhumation_montant': this.inhumation_montant});
                Object.assign(this.stock, {'vacation': this.vacation});
                Object.assign(this.stock, {'vacation_count': this.vacation_count});
                Object.assign(this.stock, {'vacation_montant': this.vacation_montant});
                Object.assign(this.stock, {'caveau_count': this.caveau_count});
                Object.assign(this.stock, {'caveau': this.caveau});
                Object.assign(this.stock, {'caveau_montant': this.caveau_montant});
                Object.assign(this.stock, {'monument': this.monument});
                Object.assign(this.stock, {'monument_montant': this.monument_montant});
                Object.assign(this.stock, {'total_montant': this.total_montant});
                Object.assign(this.stock, {'regisseur': this.regisseur});
                Object.assign(this.stock, {'paiement': this.checked});
                Object.assign(this.stock, {'numero': this.numero});
                Object.assign(this.stock, {'banque': this.banque});
                Object.assign(this.stock, {'num_facture': this.num_facture});
                axios.post('/quittances', this.stock).then(res => {
                    window.location.href = '/quittance';
                });
            },
            calc: function () {
                let total = 0;

                if (this.inhumation_count !== '')
                    this.inhumation_montant = this.inhumation_count * 108;
                else
                    this.inhumation_montant = '';
                if (this.vacation_count !== '')
                    this.vacation_montant = this.vacation_count * 20;
                else
                    this.vacation_montant = '';
                if (this.concessionsep_montant !== '')
                    total += parseFloat(this.concessionsep_montant);
                if (this.columbarium1_montant !== '')
                    total += parseFloat(this.columbarium1_montant);
                if (this.columbarium2_montant !== '')
                    total += parseFloat(this.columbarium2_montant);
                if (this.concessioncine_montant !== '')
                    total += parseFloat(this.concessioncine_montant);
                if (this.enregistrement_montant !== '')
                    total += parseFloat(this.enregistrement_montant);
                if (this.inhumation_montant !== '')
                    total += parseFloat(this.inhumation_montant);
                if (this.vacation_montant !== '')
                    total += parseFloat(this.vacation_montant);
                if (this.caveau_montant !== '')
                    total += parseFloat(this.caveau_montant);
                if (this.monument_montant !== '')
                    total += parseFloat(this.monument_montant);
                this.total_montant = total;
            }
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
