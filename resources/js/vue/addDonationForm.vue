<template>
    <div class="addItem">
        <div class="row">
            <div class="col-12 d-flex form-group">
                <select class="form-control col-2" name="recurrence" v-on:change="changeDonationType($event)">
                    <option value="" selected>Escolha</option>
                    <option value="recurrence">Recurrence</option>
                    <option value="unique">Unique</option>
                </select>
                <input class="col-8" v-model.lazy="price" v-money="money"/>
                <button
                @click="addItem()"
                :class="[ price && type_donation ? 'active' : 'inactive', 'btn btn-primary col-2']">
                Doar
            </button>
            </div>
        </div>
        <div class="error-minimum" id="error-msg">
            <div class="alert alert-danger msg-erroor" role="alert">
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
            }
        }
    },
    directives: {money: VMoney},
    methods: {
        addItem() {
            $('.msg-erroor').html('');
            let priceFormat = parseInt(this.price.split(" ")[1].replace(/[.,]/g, '')) / 100;
            let minimumFormat = 500 / 100;
            let error = document.getElementById("error-msg");
            let erros = false;
            if (priceFormat < minimumFormat) {
                erros = true;
                $('.msg-erroor').append('<p>Minimium R$ 5,00</p>');
            }
            if (!this.type_donation) {
                erros = true;
                $('.msg-erroor').append('<p>You need select type donation</p>');
            }

            if(erros == true){
                error.style.display = "block";
            }else {
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
                            error.style.display = "none";
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })

            }
        },
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

.error-minimum {
    display: none;
    text-align: center;
}

.active {
    color: #00CE25
}

.inactive {
    color: #999999
}
</style>
