<template>
    <div class="todoListContainer">

        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form @update-list="updatedItemList"/>
        </div>

        <div class="itemList">
            <div v-for="(item, index) in items" :key="index"> <!--we are looping the "items" here and we will pass it individually in the list-item-->
                <div class="item">
                    <input type="checkbox" @change="updateCheck()" v-model="item.completed" />
                        <span :class="[item.completed ? 'completed' : '', 'itemText']"> {{ item.name }} </span>
                        <button @click="removeItem(item.id)" class="trashcan" >
                            <font-awesome-icon icon="trash" />
                        </button>
                </div>            
            </div>
        </div>
    </div>
</template>

<script>
    import addItemForm from "./addItemForm"
    export default {
        components: {
            addItemForm
        },
        data: function () {
            return {
                items: []
            }
        },
        mounted() {
            this.getList();
        },
        methods: {
            getList: function() {
                axios.get('api/items').then(response => {
                    this.items = response.data;
                });
            },
            removeItem(id) {
                axios.delete(`api/item/${id}`).then( response => {
                    this.items = response.data;
                });
            },
            updatedItemList: function(e) {
                this.getList();
            },

            //comment
            /*
                add v model in every data you change
                add parameters if needed example here and on the removeItem function
                make it simple dont over engineer
            */
            // updateCheck(id, data) {
            //     axios.put(`api/item/${id}`).then( response => {
            //         this.items = response.data;
            //     });
            // },

        }
            
        }

</script>