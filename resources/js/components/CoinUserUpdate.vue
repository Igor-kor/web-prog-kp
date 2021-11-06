<template>
    <div class="coin-user-update">
        <h2>Редактировать</h2>
        <p>id: {{ data.id }}</p>
        <coin-inputs v-bind:data=data.coin></coin-inputs>
        <input @click="editCoin()" type="button" value="Сохранить">
        <input @click="deleteCoin()" type="button" value="Удалить">
    </div>
</template>

<script>
import axios from "axios";

export default {
name: "CoinUserUpdate",
    data: function() {
        return {
            data:{},
        }
    },
    props:{
        id:null,
    },
    mounted() {
        axios.get('/api/coinuser/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                }
            });
    },
    methods:{
        editCoin() {
            axios.put('/api/coinuser/' + this.data.id, {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/coinuser/' + res.data;
                    }
                });
        },
        deleteCoin() {
            axios.delete('/api/coinuser/' + this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/coins";
                    }
                });
        },

    }

}
</script>

<style scoped>

</style>
