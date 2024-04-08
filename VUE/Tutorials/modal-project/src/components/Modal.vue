<template>
    <div class="backdrop" @click.self="closeModal">
        <div class="modal" :class="{sale: theme === 'sale'}">
            <slot>default content</slot>
            <div class="action">
                <slot name="links"></slot>
            </div>
            <!-- <h1>{{ header }}</h1>
            <p>{{ text }}</p> -->
        </div>
    </div>
</template>
<script>
export default{
    props: ['header','text','theme'],
    methods:{
        closeModal(){
            this.$emit('close')
        }
    }
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
    color: rgb(113, 255, 255);
    border: none;
    padding: 0;
}
.modal .actions {
    text-align: center;
    margin: 30px 0 10px 0;
}
.modal .actions a{
    color: #333;
    padding: 8xp;
    border: 1px solid #eee;
    border-radius: 4px;
    text-decoration: none;
    margin: 10px;

}
.modal.sale{
    background: rgb(255, 70, 70);
    color: white;
}
.modal.dark{
    background: grey;
    color: white;
}
.modal.sale .actions{
    color: white;
}
.modal.sale .actions a{
    color: white;
}
</style>