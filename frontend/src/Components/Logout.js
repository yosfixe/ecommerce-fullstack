function Logout() {
    const logout = () => {

        // Remove token
        localStorage.removeItem('auth_token');

        // Go to login page
        window.location.href = '/login';
    };
    return <button onClick={logout}>Logout</button>;
}

export default Logout;