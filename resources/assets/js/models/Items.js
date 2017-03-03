export default class Items {
    constructor() {
        this.items = []
    }

    get() {
        axios.get('/api/all').then(response => {
            for(let i = 0; i < response.data.length; i++) {
                for(let j = 0; j < response.data[i].length; j++) {
                    this.items.push(response.data[i][j]);
                }
            }
        });
    }

    sortBy(sort) {
        if(this.count()) {
            return this.items.slice().sort((a, b) => a[sort] > b[sort]);
        }

        return this.items;
    }

    count() {
        return this.items.length;
    }
}