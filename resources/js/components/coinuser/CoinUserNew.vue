<template>
    <div class="coin-user-new">
        <h2>Редактировать</h2>
        <coin-desc v-if="data.coin" :key="desc" v-bind:data=data.coin></coin-desc>
        <coin-user-inputs v-if="data.coin" :key="inputs" v-bind:data=data></coin-user-inputs v-if="data.coin">
        <input @click="editCoin()" type="button" value="Сохранить">
        <a v-bind:href="'/coin/'+ id">Основная монета</a>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CoinUserNew",
    props:{
        id:null
    },
    data() {
        return {
            data: {
                coin:{
                    id:null
                }
            },
            desc:null,
            inputs:null,
        }
    },
    methods: {
        editCoin() {
            axios.post('/api/coinuser', {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/coinuser/' + res.data.id;
                    }
                });
        }
    },
    mounted() {
        axios.get('/api/coin/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data.coin = res.data;
                    this.desc = res.data.id + 'desc';
                    this.inputs =  res.data.id + 'inputs';
                }
            });
    }
}
</script>

<style scoped>

</style>
