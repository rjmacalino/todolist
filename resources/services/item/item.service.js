import axios from "axios";
var promise;

export default class ItemService {

    list() {
        promise = axios.get(`api/items`);
        return promise;
    }

    store(data) {
        promise = axios.post(`api/items`, data);
        return promise;
    }

    update(id, data) {
        promise = axios.put(`api/items/${id}`, data);
        return promise;
    }

    show(id) {
        promise = axios.get(`api/items/${id}`);
        return promise;
    }

    delete(id) {
        promise = axios.delete(`api/items/${id}`);
        return promise;
    }
}
