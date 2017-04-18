export default class Model {
    constructor(url) {
        this.data = [];

        this.url = url;
    }

    get(receiveAnArray = false) {
        if(receiveAnArray) {
            return axios.get(this.url).then(response => {
                for(let i = 0; i < response.data.length; i++) {
                    for(let j = 0; j < response.data[i].length; j++) {
                        this.data.push(response.data[i][j]);
                    }
                }
            });
        } else {
            return axios.get(this.url).then(response => this.data = response.data);
        }
    }

    getData() {
        return this.data;
    }

    sortBy(sort) {
        if(this.count()) {
            //se o tipo de ordenação começa com 'sort' apenas retorna o array em modo reverso
            if(/^sort/.test(sort)) {
                return this.data.reverse();
            }

            return this.data.sort(function(a, b) {
                switch(sort) {
                    case 'username':
                        return a.username.toLowerCase() > b.username.toLowerCase();
                        break;
                    case 'name':
                        return a.name.toLowerCase() > b.name.toLowerCase();
                        break;
                    case 'ip':
                        return a.ip > b.ip;
                        break;
                    case 'date_mod':
                        return a.updated_at < b.updated_at;
                        break;
                    case 'date_new':
                        return a.created_at < b.created_at;
                        break;
                    case 'strength':
                        return a.strength > b.strength;
                        break;
                }
            });
        }

        return this.data;
    }

    count() {
        return this.data.length;
    }

    countFavorites() {
        let favorites = this.data.filter((elem, i) => elem.favorite);

        return favorites.length;
    }

    remove(item) {
        for(let i = 0; i < this.data.length; i++) {
            if(this.data[i].id == item.id) {
                this.data.splice(i, 1);

                break;
            }
        }
    }
}