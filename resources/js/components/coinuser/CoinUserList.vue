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
            if(window.user_id != null){
                axios.get('/api/coinuser?user_id='+ window.user_id )
                    .then(res => {
                        this.coins = res.data;
                    });
            }else{
                axios.get('/api/coinuser')
                    .then(res => {
                        this.coins = res.data;
                    });
            }

        }
    }
}

</script>

<style scoped>

</style>
