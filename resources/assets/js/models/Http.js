export default class Http {
    static get(url) {
        return axios.get(url)
            .then(response => response.data);
    }
}
