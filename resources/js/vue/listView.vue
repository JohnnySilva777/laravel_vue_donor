<template>
    <div class="card text-center m-3">
        <h3 class="card-header">List Donation</h3>
        <div class="card-body">
            <div v-for="(donation, index) in pageOfItems" :key="index">
                <list-donation
                    :donation="donation"
                    class="item"/>
            </div>
        </div>
        <div class="card-footer pb-0 pt-3">
            <jw-pagination :items="donations" :pageSize=4 @changePage="onChangePage"></jw-pagination>
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
    },
    data() {
        return {
            pageOfItems: []
        };
    },
    methods: {
        onChangePage(pageOfItems) {
            // update page of items
            this.pageOfItems = pageOfItems;
        }
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
