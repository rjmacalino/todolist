import ItemService from "../../../services/item/item.service";
const itemService = new ItemService();

export default {
    data: function () {
        return {
            items: [],
            item: {
                "name" : "",
                "completed" : 0,
                "completed_at" : null
            },
        }
    },
    mounted() {
        this.list();
    },
    methods: {
        list: function() {
            itemService.list().then(response => this.items = response.data );
        },
        remove: function(id) {
            itemService.delete(id).then(() => this.list());
        },
        store: function() {
            itemService.store(this.item)
                .then(() => this.list())
                .then(() => this.item = {});
        }

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