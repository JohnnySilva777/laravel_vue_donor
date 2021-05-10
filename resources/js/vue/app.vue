<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Make Donation</h2>
            <add-donation-form
                v-on:reloadlist="getList()"
                v-on:reloadlistorganization="getListOrganizations()"
                :donor_id="donor_id"
                :organizations="organizations"
            />
        </div>
        <list-view
            :donations="donations"
        />
    </div>
</template>

<script>
import AddDonationForm from './addDonationForm.vue'
import ListView from './listView.vue'

export default {
    components: {
        AddDonationForm,
        ListView,
    },
    data: () => {
        return {
            donor_id: '',
            donations: [],
            organizations: [],
            organizationsDonor: [],
        }
    },
    methods: {
        getListOrganizations() {
            axios.get('api/organizations')
                .then(response => {
                    this.organizations = response.data
                    console.log(this.$user.favorite_organization_id);
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getList() {
            axios.get('api/donors/' + this.$userId + '/donations')
                .then(response => {
                    this.donations = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getList()
    },
    mounted() {
        this.getListOrganizations(),
        this.donor_id = this.$userId
    }
}
</script>
<style scoped>
.todoListContainer {
    width: 100%;
    margin: auto;
}

.heading {
    background-color: #343a40;
    margin-top: 2%;
    padding: 2%;
}

#title {
    text-align: center;
}
.itemCard {
    display: flex;
}
</style>
