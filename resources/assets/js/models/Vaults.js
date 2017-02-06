export default class Vaults {
    constructor() {
        this.vaults = {};
    }

    get(then) {
        return axios.get('/api/vaults')
            .then(response => this.vaults = response.data);
    }

    getVaults() {
        return this.vaults;
    }
}
