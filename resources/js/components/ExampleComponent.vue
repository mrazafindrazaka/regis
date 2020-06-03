<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Concession de sépulture pour une durée de :</span>
                            </div>
                            <input type="text" v-model="t1" class="form-control">
                            <input type="number" v-model="t2" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" v-on:click="create_regis">Send</button>
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
                t1: '',
                t2: ''
            };
        },
        methods: {
            create_regis: function() {
                Object.assign(this.test, {'concession': this.t1});
                Object.assign(this.test, {'concession_price': this.t2});
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
