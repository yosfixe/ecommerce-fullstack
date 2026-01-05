import { useParams, useNavigate } from "react-router-dom";
import { useEffect } from 'react';
import axios from 'axios';
function DelProduct() {
    const navigate = useNavigate();
    const { id } = useParams();
    useEffect(() => {
        axios.delete(`http://localhost:81/ecommerce/public/api/apiProducts/${id}`)
        .then(() => navigate('/products'))
        .catch(() => navigate('/products'));
        }, [id, navigate]);
    return null;
}
export default DelProduct;