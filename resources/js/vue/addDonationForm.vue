<template>
    <div class="addItem">
        <div class="row">
            <div class="col-12 d-flex">
                <select name="recurrence" v-on:change="changeDonationType($event)">
                    <option value="" selected>Escolha</option>
                    <option value="recurrence">Recurrence</option>
                    <option value="unique">Unique</option>
                </select>
                <input v-model.lazy="price" v-money="money" />
                <button
                    @click="addItem()"
                    :class="[ price && type_donation && organization_id_select ? 'active' : 'inactive', 'btn btn-primary']">Doar
                </button>
            </div>
        </div>

        <div class="row justify-content-center mt-2">
            <div class="col-md-3 col-sm-12 col-12 mt-3" v-for="(organization, index) in organizations" :key="index">
                <div class="col-12">
                    <list-organization
                        :organization="organization"
                        :donor_id="donor_id"
                        v-on:get-id-organization="setIdOrganization($event)"
                        v-on:reloadlistorganization="$emit('reloadlistorganization')"
                        class=""/>
                </div>
            </div>
        </div>

        <!--  CAN USE SELECT      -->
        <!--        <select name="organization" v-on:change="changeOrganization($event)">-->
        <!--            <option value="" selected>Escolha</option>-->
        <!--            <option v-for="organization in organizations" :key="organization.id" :value="organization.id">-->
        <!--                {{ organization.name }}-->
        <!--            </option>-->
        <!--        </select>-->
    </div>
</template>

<script>
import ListOrganization from './listOrganization.vue'
import {VMoney} from 'v-money'

export default {
    components: {
        ListOrganization
    },
    props: ['donor_id', 'organizations'],
    data: () => {
        return {
            organization_id_select: "",
            type_donation: "",
            price: "0",
            money: {
                decimal: ',',
                thousands: '.',
                prefix: 'R$ ',
                precision: 2,
                masked: false /* doesn't work with directive */
            }
        }
    },
    directives: {money: VMoney},
    methods: {
        addItem() {
            let priceFormat = parseInt(this.price.split(" ")[1].replace(/[.,]/g, ''))/100;
            let minimumFormat = 500/100;
            if (priceFormat < minimumFormat ||
                !this.type_donation ||
                !this.organization_id_select) {
                return;
            }
            axios.post('api/donations/store', {
                donor_id: this.donor_id,
                organization_id: this.organization_id_select,
                type: this.type_donation,
                price: parseInt(this.price.split(" ")[1].replace(/[.,]/g, '')),
            })
                .then(response => {
                    if (response.status === 201) {
                        this.price = '';
                        this.$emit('reloadlist');
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
        // changeOrganization: function changeOrganization(event) {
        //     this.organization_id_select = event.target.value;
        // },
        changeDonationType: function changeDonationType(event) {
            this.type_donation = event.target.value;
        },
        setIdOrganization: function setIdOrganization(event) {
            this.organization_id_select = event;
        }
    }
}
</script>
<style scoped>
.addItem {

}

input {
    background: #f7f7ff;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.active {
    color: #00CE25
}

.inactive {
    color: #999999
}
</style>
