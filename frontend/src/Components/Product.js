import { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';
import axios from 'axios';
import back from '../images/back.png';
function Product() {
const [product, setProduct] = useState(null);
const {id} = useParams();
useEffect (() => { 
    axios.get('http://localhost:81/ecommerce/public/api/apiProducts/'+id)
    .then((response) => {  console.log('API response:', response.data);
        setProduct(response.data.product); 
    })
}, []);

if (!product) return <h1>Loading ...</h1>
return (
  <table className="table table-striped table-bordered" border="1">
    <thead className="thead-dark">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>description</th>
        <th>production date</th>
        <th>type</th>
        <th>Picture</th>
        <th>Cat_Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>action</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>{product.id}</td>
        <td>{product.name}</td>
        <td>{product.description}</td>
        <td>{product.production_date}</td>
        <td>{product.type}</td>
        <td>{product.picture}</td>
        <td>{product.cat_id}</td>
        <td>{product.created_at}</td>
        <td>{product.updated_at}</td>
        <td>
          <Link to="/products/">
            <img src={back} width="20" height="20" alt="back" />
          </Link>
        </td>
      </tr>
    </tbody>
  </table>
);

}
export default Product;