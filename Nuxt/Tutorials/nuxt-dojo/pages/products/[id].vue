<template>
    <div>
        <p>Product details for {{ id }}</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam laudantium vero consequatur doloremque, quo assumenda, veritatis voluptatum sit corrupti amet natus distinctio hic delectus, quia sequi molestiae? Minima, incidunt facere.</p>
    </div>
</template>

<script setup>
const { id } = useRoute().params

definePageMeta({
    layout:'products'
})
</script>

<style scoped>

</style>