<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <div class="addItem">
                <input type="text" v-model="item.name" />
                <font-awesome-icon
                    icon="plus-square"
                    @click="store();"
                    :class="[ item.name ? 'active' : 'inactive', 'plus']"
                />
            </div>
        </div>
        <div class="itemList">
            <div v-for="(item, index) in items" :key="index">
                <div class="item">
                    <input type="checkbox" @change="updateCheck()" v-model="item.completed" />
                        <span :class="[item.completed ? 'completed' : '', 'itemText']"> {{ item.name }} </span>
                        <button @click="remove(item.id)" class="trashcan" >
                            <font-awesome-icon icon="trash" />
                        </button>
                </div>            
            </div>
        </div>
    </div>
</template>

<script src="./item.js"></script>