<template>
    <div class="addItem">
        <select name="organization" v-on:change="changeOrganization($event)">
            <option value="" selected>Escolha</option>
            <option v-for="organization in organizations" :key="organization.id" :value="organization.id">
                {{ organization.name }}
            </option>
        </select>
        <select name="recurrence" v-on:change="changeDonationType($event)">
            <option value="" selected>Escolha</option>
            <option value="recurrence">Recurrence</option>
            <option value="unique">Unique</option>
        </select>
        <input type="text" v-model="price"/>
        <button
            @click="addItem()"
            :class="[ price && type_donation && organization_id_select ? 'active' : 'inactive' ]">Doar
        </button>
    </div>
</template>

<script>
export default {
    props: ['donor_id', 'organizations'],
    data: () => {
        return {
            organization_id_select: "",
            type_donation: "",
            price: "",
        }
    },
    methods: {
        addItem() {
            if ((this.price < 5) ||
                !this.type_donation ||
                !this.organization_id_select) {
                return;
            }
            axios.post('api/donations/store', {
                donor_id: this.donor_id,
                organization_id: this.organization_id_select,
                type: this.type_donation,
                price: this.price,
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
        changeOrganization: function changeOrganization(event) {
            this.organization_id_select = event.target.value;
        },
        changeDonationType: function changeDonationType(event) {
            this.type_donation = event.target.value;
        }
    }
}
</script>
<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
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
