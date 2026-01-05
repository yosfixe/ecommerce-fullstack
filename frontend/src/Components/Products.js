import { useEffect, useState } from 'react';
import React from 'react';
import { Link } from 'react-router-dom';
import Logout from './Logout';
import axios from 'axios';
import show from '../images/show.png';
import add from '../images/add.png';
import edit from '../images/edit.jpg';
import del from '../images/del.png';
function Products({ onLogout }) {
    const [products, setProducts] = useState([]);
    useEffect(() => {
    fetchProducts();
    }, []);
    const fetchProducts = async () => {
        try {
            const token = localStorage.getItem('auth_token');
            const response = await
            axios.get('http://localhost:81/ecommerce/public/api/apiProducts', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });
            console.log(token);
            setProducts(response.data.products || []);
        } catch (error) {
            console.error('API ERROR:', error.response);
            alert(`Error ${error.response?.status}`);
            window.location.href = '/login';
        }
    }

    return (
        <div>
            <table className="table table-striped table-bordered" border="1">
                <thead className="thead-dark">
                <Logout />
                <tr> <th>id</th> <th>name</th> <th>action</th><Link to={'/product/add'}><img src={add} width="20" height="20" alt="show"/></Link> </tr> </thead>
                { products.map(
                    ({ id, name }) =>
                        (
                        <tr> <td>{id}</td> <td>{name}</td>
                        <td><Link to={`/product/show/${id}`}>
                        <img src={show} width="20" height="20" alt="show"/>
                        </Link> </td>
                        <td><Link to={`/product/edit/${id}`}><img src={edit} width="20" height="20" alt="edit"/></Link></td>
                        <td><Link to={`/product/del/${id}`}><img src={del} width="20" height="20" alt="del"/></Link></td>
                        </tr>
                        )
                    )
                }
            </table>
        </div>

    )
} 
 export default Products;