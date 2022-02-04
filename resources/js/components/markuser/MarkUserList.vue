<template>
    <div>
        <mark-user-block
            v-for="mark in marks"
            v-bind:data="mark"
            v-bind:key="mark.id"
        ></mark-user-block>
    </div>
</template>

<script>
import axios from "axios";
export default {
name: "MarkUserList",
    data() {
        return {
            marks: [],
        }
    },
    mounted() {
        this.loadCoin();
    },
    methods: {
        loadCoin() {
            axios.get('/api/markuser')
                .then(res => {
                    this.marks = res.data;
                });
        }
    }
}
</script>

<style scoped>

</style>
