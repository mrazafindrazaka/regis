<template>
    <div class="container-fluid center">
        <div class="row">
            <div class="col-12">
                Bienvenue {{user.name}} !
            </div>
            <div class="col-6">
                <button class="btn btn-lg btn-dark" v-on:click="redirect_path('/quittance')">Liste des quittances</button>
            </div>
            <div class="col-6">
                <button class="btn btn-lg btn-dark" v-on:click="redirect_path('/facture')">Liste des factures</button>
            </div>
            <div v-if="user.is_admin" class="col-6 mt-5">
                <button class="btn btn-lg btn-dark" v-on:click="redirect_path('/user')">Liste des régisseurs</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user']
    }
</script>

<style scoped lang="scss">
    .center {
        text-align: center;
    }
</style>
