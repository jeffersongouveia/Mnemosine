export default class Logins {
    constructor() {
        this.logins = {};
    }

    get() {
        return axios.get('/api/logins')
            .then(response => this.logins = response.data);
    }

    getLogins() {
        return this.logins;
    }

    sortBy(sort) {
        if(this.count()) {
           return this.logins.slice().sort((a, b) => a[sort] > b[sort]);
        }

        return this.logins;
    }

    count() {
        return this.logins.length;
    }

    countFavorites() {
        let favorites = this.logins.filter((elem, i) => elem.favorite);

        return favorites.length;
    }
}
