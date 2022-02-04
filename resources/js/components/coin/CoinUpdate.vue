<template>
    <div class="coin-update">
        <h2>Редактировать</h2>
        <p>id: {{ data.id }}</p>
        <coin-inputs v-bind:data=data></coin-inputs>
        <input @click="editCoin()" type="button" value="Сохранить">
        <input @click="deleteCoin()" type="button" value="Удалить">
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "CoinUpdate",
    data: function() {
        return {
            data:{},
        }
    },
    props:{
        id:null,
    },
    mounted() {
        axios.get('/api/coin/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                }
            });
    },
    methods: {
        editCoin() {
            axios.put('/api/coin/'+ this.data.id, {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/coin/' + res.data;
                    }
                });
        },
        deleteCoin() {
            axios.delete('/api/coin/'+this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/coins";
                    }
                });
        }
    }
}
</script>

<style src="../../../../node_modules/vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

</style>
