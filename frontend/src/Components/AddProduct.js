import { useNavigate, Link } from "react-router-dom";
import { useForm } from "react-hook-form";
import axios from "axios";
import back from "../images/back.png";

function AddProduct() {
  const navigate = useNavigate();
  const { register, handleSubmit, reset } = useForm();

  const saveProduct = async (data) => {
    const product = {
      name: data.name,
      description: data.description,
      production_date: data.production_date,
      type: data.type,
      picture: "Empty",
      cat_id: Number(data.cat_id),
      created_at: new Date(),
      updated_at: new Date(),
    };

    await axios.post("http://localhost:81/ecommerce/public/api/apiProducts", product );

    navigate("/products");
  };

  return (
    <div>
      <form onSubmit={handleSubmit(saveProduct)}>
        <table border="1" align="center">
          <tbody>
            <tr>
              <th colSpan="2">New Product</th>
            </tr>

            <tr>
              <td>Name</td>
              <td>
                <input type="text" {...register("name", { required: true })} />
              </td>
            </tr>

            <tr>
              <td>Description</td>
              <td>
                <textarea {...register("description", { required: true })} />
              </td>
            </tr>

            <tr>
              <td>Production Date</td>
              <td>
                <input
                  type="date"
                  {...register("production_date", { required: true })}
                />
              </td>
            </tr>

            <tr>
              <td>Type</td>
              <td>
                <select {...register("type", { required: true })}>
                  <option value="Electronics">Electronics</option>
                  <option value="Clothing">Clothing</option>
                  <option value="Food">Food</option>
                </select>
              </td>
            </tr>

            <tr>
              <td>Picture</td>
              <td>
                <input type="text" {...register("picture")} />
              </td>
            </tr>

            <tr>
              <td>Category ID</td>
              <td>
                <input
                  type="number"
                  min="0"
                  max="3"
                  {...register("cat_id", { required: true })}
                />
              </td>
            </tr>

            <tr align="center">
              <td>
                <input type="submit" value="Submit" />
              </td>
              <td>
                <button type="button" onClick={() => reset()}>
                  Cancel
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>

      <Link to="/products">
        <img src={back} width="30" height="30" alt="Back" />
      </Link>
    </div>
  );
}

export default AddProduct;
