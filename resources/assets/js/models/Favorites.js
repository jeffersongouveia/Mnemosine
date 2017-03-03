export default class Favorites {
    constructor() {
        this.favorites = [];
    }

    get() {
        axios.get('/api/favorites').then(response => {
            for(let i = 0; i < response.data.length; i++) {
                for(let j = 0; j < response.data[i].length; j++) {
                    this.favorites.push(response.data[i][j]);
                }
            }
        });
    }

    getFavorites() {
        return this.favorites;
    }

    sortBy(sort) {
        if(this.count()) {
            return this.favorites.slice().sort((a, b) => a[sort] > b[sort]);
        }

        return this.favorites;
    }

    count() {
        return this.favorites.length;
    }

    remove(favorite) {
        for(let i = 0; i < this.favorites.length; i++) {
            if(this.favorites[i].id == favorite.id) {
                delete this.favorites[i];
                break;
            }
        }
    }
}