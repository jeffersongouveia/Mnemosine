import Model from './Model';

export default class Radius extends Model {
    constructor(url) {
        super(url);
        this.log = 'Fill me';
    }

    getLog() {
        axios.get('/api/radius/log').then(response => this.log = response.data);
    }
}