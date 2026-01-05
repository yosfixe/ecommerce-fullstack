import { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import axios from "axios";
import back from "../images/back.png";
import { Link } from "react-router-dom";

function EditProduct() 
{
    const navigate = useNavigate();
    const { id } = useParams();
    const [product, setProduct] = useState(null);
    useEffect (() => {
        axios.get('http://localhost:81/ecommerce/public/api/apiProducts/'+id)
        .then((response) => {
        setProduct(response.data.product);
    })
    }, [id]);
    const updateProduct = async (e) => {
        const data = {
            name:e.name,
            description:e.description,
            production_date:e.production_date,
            type:e.type,
            picture:"Empty",
            cat_id:e.cat_id,
            created_at:new Date(),
            updated_at:new Date()
        }
        console.log(data);
        await axios.put('http://localhost:81/ecommerce/public/api/apiProducts/'+id, data);

        navigate('/products');
    }
    const handleChange = (e) => {
        setProduct({
            ...product,
            [e.target.name]: e.target.value
        });
        };
    if (!product) return <h1>Loading ...</h1>;
    return (
        <div>
            <form onSubmit={updateProduct} >
            <table border="1" align="center">
                <tbody>
                    <tr>
                    <th colSpan="2">Edit Product</th>
                    </tr>

                    <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value={product.name} onChange={handleChange} />
                    </td>
                    </tr>

                    <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" value={product.description} onChange={handleChange} />
                    </td>
                    </tr>

                    <tr>
                    <td>Production Date</td>
                    <td>
                        <input
                        type="date"
                        name="production_date"
                        value={product.production_date}
                        onChange={handleChange}
                        />
                    </td>
                    </tr>

                    <tr>
                    <td>Type</td>
                    <td>  
                        <select name="type" value={product.type} onChange={handleChange}>
                        <option value="Electronics">Electronics</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Food">Food</option>
                        </select>
                    </td>
                    </tr> 

                    <tr>
                    <td>Picture</td>
                    <td>
                        <input type="text" name="picture" value={product.picture} onChange={handleChange} />
                    </td>
                    </tr>

                    <tr>
                    <td>Category ID</td>
                    <td>
                        <input
                        type="number"
                        name="cat_id"
                        min="0"
                        max="3"
                        value={product.cat_id}
                        onChange={handleChange}
                        />
                    </td>
                    </tr>

                    <tr align="center">
                    <td>
                        <input type="submit" value="Update" />
                    </td>
                    <td>
                        <input type="reset" value="Cancel" />
                    </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <Link to="/products">
            <img src={back} width="30" height="30" alt="Back" />
        </Link>
        </div>
    )
}

export default EditProduct;