<template>
    <div class="mark-user-inputs">
        <p>id: {{ data.id }}</p>
        <image-upload v-bind:data=data.mark></image-upload>
        <p>Сохранность:
            <multiselect v-model="data.safety" :options="safetyoption"></multiselect>
        </p>
        <p>Описание: <input v-model="data.description" placeholder="отредактируй меня"></p>
    </div>
</template>

<script>
export default {
name: "MarkUserInputs",
    data() {
        return {
            safetyoption:[
                'MNH OG','MNH','MLH','MVLH','MH','POG','UH','Mounted','NG','Sans gomme','O.G.','CTO','Used','G/VG','Fine','VF','XF'
            ],
        }
    },
    props: {
        data: { },
    },
}
</script>

<style scoped>

</style>
