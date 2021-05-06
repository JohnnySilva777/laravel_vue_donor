<template xmlns="http://www.w3.org/1999/html">
    <div class="card">
        <div class="card-body d-flex align-items-end flex-column">
            <div>
                <h5 class="card-title">Name : {{ organization.name }}</h5>
                <p class="card-text">{{ organization.description }}</p>
            </div>
            <div class="d-flex mt-auto">
                <button href="#" @click="selectFavorite"
                        :data-id="organization.id"
                        :class="[ this.$user.favorite_organization_id == organization.id ?
                        'btn btn-danger mr-1' :
                        'btn btn-primary mr-1']">Fav
                </button>
                <button href="#" v-on:click="isHidden = !isHidden" class="select-organization btn btn-primary"
                        @click="getIdOrganization"
                        :data-id="organization.id">Select Organization
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['organization', 'donor_id'],
    data: () => {
        return {
            isHidden: false,
        }
    },
    methods: {
        getIdOrganization: function (event) {
            if (this.$selectOrg.id > 0) {
                $(`.select-organization[data-id=${this.$selectOrg.id}]`)
                    .text('Select Organization')
                    .removeClass("btn-success")
                    .addClass("btn-primary")

                $(`.select-organization[data-id=${event.target.dataset.id}]`)
                    .text('Select Organization')
                    .removeClass("btn-primary")
                    .addClass("btn-success")

                event.target.textContent = 'Selected';
                this.$selectOrg.id = event.target.dataset.id;
            } else {
                $(`.select-organization[data-id=${event.target.dataset.id}]`)
                    .text('Select Organization')
                    .removeClass("btn-primary")
                    .addClass("btn-success")
                event.target.textContent = 'Selected';
                this.$selectOrg.id = event.target.dataset.id;
            }

            this.$emit('get-id-organization', event.target.dataset.id);
        },
        selectFavorite(event) {
            axios.post(`api/donors/favorite`, {
                donor_id: this.donor_id,
                organization_id: event.target.dataset.id,
            })
                .then(response => {
                    if (response.status === 200) {
                        this.$user.favorite_organization_id = response.data.favorite_organization_id;
                        this.$emit('reloadlistorganization');
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
    },
}
</script>
<style scoped>
.card {
    width: 100%;
    padding: 2%;
    min-height: 350px;
}

.card-title {
    margin-bottom: 10px;
}

.card-text {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 7; /* number of lines to show */
    -webkit-box-orient: vertical;
}

.select-organization {
    bottom: 19px;
}
</style>
