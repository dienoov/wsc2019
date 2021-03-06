const ajax = {
    request(url, method, data = {}, json = false) {
        const obj = {method};

        if (method !== 'GET') {
            if (json) {
                obj.headers = {
                    'Content-Type': 'application/json',
                };
                obj.body = JSON.stringify(data);
            } else {
                const formData = new FormData;
                obj.method = 'POST';
                data._method = method;
                Object.keys(data).forEach(key => {
                    formData.append(key, data[key]);
                });
                obj.body = formData;
            }
        }
        // obj.headers['Access-Control-Allow-Origin'] = '*';
        // obj.headers['Access-Control-Allow-Headers'] = '*';
        // obj.mode = 'no-cors';

        return fetch(`http://localhost:8000/api/v1/${url}`, obj)
            .then(res => res.json().then(data => ({status: res.status, data})));
    },
    get(url) {
        return this.request(url, 'GET');
    },
    post(url, data = {}, json = false) {
        return this.request(url, 'POST', data, json);
    },
    put(url, data = {}, json = false) {
        return this.request(url, 'PUT', data, json);
    },
    delete(url, data = {}, json = false) {
        return this.request(url, 'DELETE', data, json);
    },
};