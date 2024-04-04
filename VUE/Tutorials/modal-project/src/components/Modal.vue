<template>
    <div class="backdrop">
        <div class="modal" :class="{sale: theme === 'sale'}">
            <h1>{{ header }}</h1>
            <p>modal content</p>
        </div>
    </div>
</template>
<script>
export default{
    props: ['header','theme']
}
</script>
<style scoped>
.modal{
    width: 400px;
    padding: 20px;
    margin: 100px auto;
    background: white;
    border-radius: 10px;
}
.backdrop{
    top: 0;
    position: fixed;
    background: rgba(0, 0, 0, 0.5);
    width: 100%;
    height: 100%;
}
.modal h1{
    color: rgb(113, 210, 255);
}
.modal.sale{
    background: rgb(255, 70, 70);
    color: white;
}
.modal.dark{
    background: grey;
    color: white;
}
</style>