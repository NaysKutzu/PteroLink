import React from 'react';
import ReactDOM from 'react-dom';

import LoginForm from './components/LoginForm'; 
import LogoutForm from './components/LogoutForm'; 

ReactDOM.render(
  <React.StrictMode>
    <LoginForm />
    <LogoutForm />
  </React.StrictMode>,
  document.getElementById('root')
);
