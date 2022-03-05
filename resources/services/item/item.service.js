import axios from "axios";

export default class ItemService {

    list() {
        return axios.get(`api/items`);
    }

    store(data) {
        return axios.post(`api/items`, data);
    }

    update(id, data) {
        return axios.put(`api/items/${id}`, data);
    }

    show(id) {
        return axios.get(`api/items/${id}`);
    }

    delete(id) {
        return axios.delete(`api/items/${id}`);
    }
}
