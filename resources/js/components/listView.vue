<template>

    <div>
        <div v-for="(item, index) in items" :key="index"> <!--we are looping the "items" here and we will pass it individually in the list-item-->
            <list-item
                :item="item" 
                class="item"
                />
        </div>
    </div>
</template>

<script>
    import listItem from "./listItem"
    export default {
        props: ['items'], // we are receiving this "items"
        components: {
            listItem
        }

    }
</script>


<style scoped>

.item {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;

}


</style>