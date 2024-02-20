import React, { useState } from 'react';

// Import your backend login function directly
import logout from '@/api/logout'; // Adjust your import path if needed

const LogoutForm = () => {
  const [error, setError] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await logout();

      // Handle successful login
      console.log('Login successful:', response);
      // Replace with your desired actions, e.g., redirect to protected route, store token

    } catch (error) {
      setError(error.message || 'An error occurred.');
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      {error && <div className="error">{error}</div>}
      <button type="submit">Logout</button>
    </form>
  );
};

export default LogoutForm;