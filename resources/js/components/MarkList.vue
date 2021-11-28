<template>
    <div>
        <mark-block
            v-for="coin in coins"
            v-bind:data="coin"
            v-bind:key="coin.id"
        ></mark-block>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "MarkList",
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
            axios.get('/api/mark')
                .then(res => {
                    this.coins = res.data;
                });
        }
    }
}

</script>

<style scoped>

</style>
