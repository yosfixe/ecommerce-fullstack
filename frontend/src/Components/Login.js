import { useState } from 'react';
import axios from 'axios';
function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            const response = await
            axios.post('http://localhost:81/ecommerce/public/api/login', { email: email, password: password});

            // Save token
            const token = response.data.token;
            localStorage.setItem('auth_token', token);

            // Set default header for all future requests
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            console.log('Login successful!', response.data.user);
            alert('Login successful!');
            window.location.href = '/products';
        } catch (error) {
        console.error('Login failed:', error.response?.data);
        alert('Login failed!');
        }
    }
    return ( 
        <div>
            <h2>Login</h2>
            <form onSubmit={handleLogin}>
                <input type="email"
                    placeholder="Email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    required />
                <br/>    

                <input type="password"
                    placeholder="Password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    required />
                <br/>    
                    
                <button type="submit">Login</button>
            </form>
        </div>
    );
}

export default Login;