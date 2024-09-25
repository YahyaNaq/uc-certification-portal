import axios from 'axios';

const API_URL = '/api/'; // Adjust based on your Laravel API routes

// Function to handle login
export const login = async (credentials) => {
    try {
        const response = await axios.post(`${API_URL}login`, credentials);
        // Store the token or user data in local storage or Vuex
        localStorage.setItem('token', response.data.token); // Example
        return response.data; // Return the response for further use
    } catch (error) {
        throw error; // Handle error as needed
    }
};

// Function to handle logout
export const logout = async () => {
    try {
        await axios.post(`${API_URL}logout`);
        localStorage.removeItem('token'); // Remove token on logout
    } catch (error) {
        throw error; // Handle error as needed
    }
};