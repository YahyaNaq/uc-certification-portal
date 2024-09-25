import axios from 'axios';

// Create an Axios instance with a base URL
const api = axios.create({
    baseURL: '/api',
});

// Add a request interceptor to include the token
api.interceptors.request.use(config => {
    const token = localStorage.getItem('token'); // Retrieve the token from localStorage
    if (token) {
        config.headers.Authorization = `Bearer ${token}`; // Set the Authorization header
    }
    return config; // Return the modified config
});

export default api; // Export the Axios instance for use in other files
