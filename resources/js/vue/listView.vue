<template>
    <div>
        <h1>List Donations</h1>
        <div v-for="(donation, index) in donations" :key="index">
            <list-donation
                :donation="donation"
                class="item"/>
        </div>
    </div>
</template>

<script>
import ListDonation from "./listDonation"
import listDonation from "./listDonation.vue";

export default {
    props: ['donations'],
    components: {
        ListDonation,
        listDonation
    }
}
</script>
<style scoped>
.item {
    backdrop-filter: #000000;
    padding: 5px;
    margin-top: 5px;
}
</style>
