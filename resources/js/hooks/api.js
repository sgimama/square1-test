import axios from "axios";
import { Localit } from "localit";

const store = new Localit();

const getData = async (url, params = null) => {
    const response = await axios.get(url, { params });
    return response.data;
};

const getDataWithToken = async (url, params = null) => {
    const response = await axios.get(url, { params }, {
        headers: {
            'Authorization' : store.get('token'),
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest',
        }
    });
    return response.data;
};

const postData = async (url, params) => {
    const response = await axios.post(url, params, {
        headers: {
            'Authorization' : store.get('token'),
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest',
        }
    })
    return response.data;
};

const getToken = async () => {
    const response = await axios.get('/token');
    return response;
};

export { getData, postData, getDataWithToken };