<template>
    <div>
        <coin-block
            v-for="coin in coins"
            v-bind:data="coin"
            v-bind:key="coin.id"
        ></coin-block>
    </div>
</template>

<script>
import axios from "axios";
import CoinBlock from "./CoinBlock";

export default {
    data () {
        return {
            coins: [],
        }
    },
    mounted() {
        this.loadCoin();
    },
    methods: {
        loadCoin() {
            axios.get('/api/coin')
                .then(res => {
                    console.log(res.data);
                    this.coins = res.data;
                });
        }
    },
    comments:{
        CoinBlock
    }
}
</script>

<style scoped>

</style>
