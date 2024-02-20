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

export default async () => {
  try {
    // Get CSRF token for Sanctum authentication
    // Perform login request
    const response = await http.post('/logout', {

    });

    return {
      complete: response.data.data.complete,
      intended: response.data.data.intended || undefined,
      confirmationToken: response.data.data.confirmation_token || undefined,
    };
  } catch (error) {
    throw new Error(response.message || 'An error occurred while processing the login request.');
  }
};