<template>
    <div class="item">
        <p> Price : {{ donation.price/100 }}</p>
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
.item{
    justify-content: center;
    align-items: center;
    background: #000000;
}
</style>
