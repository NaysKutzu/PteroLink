import axios from 'axios';

const http = axios.create({
  withCredentials: true,
  timeout: 20000,
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
});

export default async ({ username, password }) => {
  try {
    // Get CSRF token for Sanctum authentication
    await http.get('/sanctum/csrf-cookie');

    // Perform login request
    const response = await http.post('/login', {
      user: username,
      password,
    });

    return {
      complete: response.data.data.complete,
      intended: response.data.data.intended || undefined,
      confirmationToken: response.data.data.confirmation_token || undefined,
    };
  } catch (error) {
    throw new Error('An error occurred while processing the login request.');
  }
};