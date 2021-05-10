<template>
    <div class="listDonations">
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
    padding: 5px;
    margin-top: 5px;
    background: #343a40;
    border-bottom: 1px solid #ffffff;
}
.listDonations {
    background: #343a40;
    margin-top: 2%;
    padding: 5%;
}
</style>
