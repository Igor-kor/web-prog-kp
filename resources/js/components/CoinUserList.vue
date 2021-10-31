<template>
    <div>
        <coin-user-block
            v-for="coin in coins"
            v-bind:data="coin"
            v-bind:key="coin.id"
        ></coin-user-block>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CoinUserList",
    data() {
        return {
            coins: [],
        }
    },
    mounted() {
        this.loadCoin();
    },
    methods: {
        loadCoin() {
            axios.get('/api/coinuser')
                .then(res => {
                    console.log(res.data);
                    this.coins = res.data;
                });
        }
    }
}

</script>

<style scoped>

</style>
