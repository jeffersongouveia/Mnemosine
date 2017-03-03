export default class Logins {
    constructor() {
        this.logins = [];
    }

    get() {
        return axios.get('/api/logins')
            .then(response => this.logins = response.data);
    }

    post(login) {
        return axios.post('/api/logins', login)
            .then(response => console.log('Saved!'));
    }

    favorites() {
        return axios.get('/api/favorites')
            .then(response => this.logins = response.data);
    }

    getLogins() {
        return this.logins;
    }

    sortBy(sort) {
        if(this.count()) {
            //se o tipo de ordenação começa com 'sort' apenas retorna o array em modo reverso
            if(/^sort/.test(sort)) {
                return this.logins.reverse();
            }

            return this.logins.sort(function(a, b) {
                switch(sort) {
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

        //caso o array esteja vazio apenas o retona
        return this.logins;
    }

    count() {
        return this.logins.length;
    }

    countFavorites() {
        let favorites = this.logins.filter((elem, i) => elem.favorite);

        return favorites.length;
    }

    remove(login) {
        for(let i = 0; i < this.logins.length; i++) {
            if(this.logins[i].id == login.id) {
                delete this.logins[i];
                break;
            }
        }
    }
}
