<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mb-2">
                <label for="name">Prénom NOM</label>
                <input type="text" id="name" class="form-control" v-model="name">
            </div>
            <div class="col-sm-12 mb-2">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" v-model="email">
            </div>
            <div class="col-sm-12 mb-2">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" v-model="password">
            </div>
            <div class="col-sm-12 mb-2">
                <label for="rpassword">Répéter le mot de passe</label>
                <input type="password" id="rpassword" class="form-control" v-model="repeat_password">
            </div>
            <div class="col-sm-12 mb-4">
                <label for="role">Rôle</label>
                <select id="role" class="form-control" v-model="is_admin">
                    <option value="0">Régisseur suppléant</option>
                    <option value="1">Régisseur principal</option>
                </select>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-success mr-3" v-on:click="create_user">Créer le régisseur</button>
                <button class="btn btn-dark" v-on:click="redirect_path('/user')">Retour au menu</button>
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
                name: '',
                email: '',
                password: '',
                repeat_password: '',
                is_admin: 0,
                stock: {}
            };
        },
        methods: {
            create_user: function () {
                if (this.name && this.email && this.password && this.password === this.repeat_password) {
                    Object.assign(this.stock, {'name': this.name});
                    Object.assign(this.stock, {'email': this.email});
                    Object.assign(this.stock, {'password': this.password});
                    Object.assign(this.stock, {'is_admin': this.is_admin});
                    axios.post('/users', this.stock).then(res => {
                        window.location.href = '/user';
                    }).catch(err => {
                        alert("L'email est déjà utilisé.");
                    });
                } else {
                    alert('Veuillez renseigner tout les champs et vérifiez que les mots de passe sont identique.');
                }
            }
        },
        created() {
        },
        mounted() {
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
