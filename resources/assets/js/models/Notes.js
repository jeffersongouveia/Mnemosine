export default class Notes {
    constructor() {
        this.notes = {};
    }

    get(then) {
        return axios.get('/api/notes')
            .then(response => this.notes = response.data);
    }

    getNotes() {
        return this.notes;
    }

    sortBy(sort) {
        if(this.count()) {
            return this.notes.slice().sort((a, b) => a[sort] > b[sort]);
        }

        return this.notes;
    }

    count() {
        return this.notes.length;
    }
}
