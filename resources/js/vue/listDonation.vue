<template>
    <div class="one-donation">
        <p> Price : R$ {{ donation.price/100 }}</p>
        <p> Type : {{ donation.type }}</p>
        <p> Org : {{ donation.organization.name }} </p>
    </div>
</template>

<script>
export default {
    props: ['donation']
}
</script>
<style scoped>
.one-donation{
    justify-content: center;
    align-items: center;
}
</style>
